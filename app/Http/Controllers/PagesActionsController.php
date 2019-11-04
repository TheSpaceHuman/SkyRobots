<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PagesActionsController extends Controller
{
  public function userUpdate(Request $request, $id)
  {
      $request->validate([
          'name' => ['string', 'max:255'],
          'email' => ['email', 'max:255', Rule::unique('users')->ignore($id)],
          'region' => 'string|max:255',
          'phone' => 'max:255',
          'brokerage_referral_link' => 'max:1024',
          'provider_referral_link' => 'max:1024',
      ]);

      $user = User::find($id);
      $user->update($request->only('name', 'region', 'phone', 'brokerage_referral_link', 'provider_referral_link'));

      $user->updatePassword($request->input('password-new'));
      $user->updateEmail($request->input('email'));
      $user->setAvatar('avatar');

      $request->session()->flash('message-info', 'Вы успешно изменили свои данные');

      return back();
  }
}
