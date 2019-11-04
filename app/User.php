<?php

namespace App;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
/*    protected $fillable = [
        'name', 'email', 'password',
    ];*/
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


  public function updatePassword($newPassword)
  {
    if(Hash::check($newPassword, $this->password)) {
      $this->password = Hash::make($newPassword);
      $this->save();
    }
  }

  public function updateUserName($newUserName)
  {
    if($this->name !== $newUserName) {
      $this->name = $newUserName;
      $this->save();
    }
  }

  public function updateEmail($email)
  {
    if($email !== auth()->user()->email) {
      $this->email = $email;
      $this->save();
    }
  }

  public function setParentId($code)
  {

    $parentUser = User::where('registration_referral_link', $code)->first();

    if(!empty($parentUser)) {
      $this->parent_id_linear = $parentUser->id;
      $this->parent_id_binary = $parentUser->id;
      $this->save();


      // Bonus accrual logic



    }

  }

  public function getBinaryReferralTreeAll()
  {
    $dependentUsers = [];
    $users = User::all();
    $activeUsersId = [$this->id];

    if($this->parent_id_linear) {
      array_push($dependentUsers, [User::find($this->parent_id_linear)->toArray()]);
    }

    array_push($dependentUsers, [User::find($this->id)->toArray()]);

    while(!empty($activeUsersId)) {
      $newUsersId = [];
      foreach ($users as $user) {
        if(in_array($user->parent_id_linear, $activeUsersId)) {
          array_push($newUsersId, $user->id);
        }
      }
      if(!empty($newUsersId)) {
        $newUsers = User::find($newUsersId)->toArray();
        array_push($dependentUsers, $newUsers);
      }

      $activeUsersId = $newUsersId;
    }

    return $dependentUsers;

  }

  public function getBinaryReferralTree()
  {
    $users = User::all();

    $newUsersId = [];
    foreach ($users as $user) {
      if($user->parent_id_binary == $this->id) {
        array_push($newUsersId, $user->id);
      }
    }

    return User::find($newUsersId);

  }

  public function getLinearReferralTree()
  {
    $users = User::all();

    $newUsersId = [];
    foreach ($users as $user) {
      if($user->parent_id_linear == $this->id) {
        array_push($newUsersId, $user->id);
      }
    }

    return User::find($newUsersId);

  }

  public function howMuchToEndTariff()
  {
    if(Carbon::now()->setTimestamp(strtotime($this->activated_to)) > Carbon::now()) {
      $finish = now()->setTimestamp(strtotime($this->activated_to));
      return now()->diffForHumans($finish);
    }
    return false;

  }

  public function getAvatar()
  {
    return Storage::url($this->avatar, 'public');
  }

  public function setAvatar($inputName)
  {

      if(request()->hasFile($inputName)) {
        if($this->avatar !== 'users/noavatar.png') {
          Storage::disk('public')->delete($this->avatar);
        }

        $path = request()->file($inputName)->store('users/'.$this->id, 'public');
        $this->avatar = $path;
        $this->save();
      }

  }

  public function package()
  {
    return $this->belongsTo('App\Package');
  }

  public function buyingTariff($days, Package $package)
  {
    $oldDurationTariff = now()->setTimestamp(strtotime($this->activated_to));
    $oldDurationTariff->addDays($days);
    $this->activated_to = $oldDurationTariff;
    if($days == 30) {
      $this->money = $this->money - $package->price_month;
    } else if($days == 365) {
      $this->money = $this->money - $package->price_year;
    }
    $this->package_id = $package->id;
    $this->save();
  }

}
