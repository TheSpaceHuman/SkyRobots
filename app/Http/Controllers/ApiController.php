<?php

namespace App\Http\Controllers;

use App\Package;
use App\User;
use Illuminate\Http\Request;
class ApiController extends Controller
{
  public function checkEmail(Request $request)
  {

    $user = User::where('email', $request->input('email'))->get()->toArray();

    if(empty($user)) {
      return response()->json([
          'message' => [
              'type' => 'success',
              'body' => 'Почта свободна'
          ]
      ]);
    } else {
      return response()->json([
          'message' => [
              'type' => 'error',
              'body' => 'Данный пользователь уже существует'
          ]
      ]);
    }

  }

  public function referralsBinary($id)
  {
    $currentUser = User::findOrFail($id);

    return response()->json(
        [
            'users' => $currentUser->getBinaryReferralTree()
        ]
    );
  }

  public function referralsBinaryAll($id)
  {
    $currentUser = User::findOrFail($id);

    return response()->json(
        [
            'users' => $currentUser->getBinaryReferralTreeAll()
        ]
    );
  }

  public function referralsLinear($id)
  {
    $currentUser = User::findOrFail($id);

    return response()->json(
        [
            'children' => $currentUser->getLinearReferralTree()
        ]
    );
  }


  public function test(Request $request)
  {
    $user = User::find(1);
    return $user->getReferralLinearTree();
  }

  public function updatePackage(Request $request)
  {
    // Logic update Tariff Plan
    $newPackage = Package::find($request->packageId);
    $user = User::find($request->userId);
    if($request->days == 30) {
      if($user->money > $newPackage->price_month) {
        $user->buyingTariff($request->days,  $newPackage);
      } else {
        return response()->json([
            'message' =>  [
                'type' => 'warning',
                'body' => 'У вас недостаточно средств'
            ]
        ]);
      }
    } else if($request->days == 365) {
      if($user->money > $newPackage->price_year) {
        $user->buyingTariff($request->days,  $newPackage);
      } else {
        return response()->json([
            'message' =>  [
                'type' => 'warning',
                'body' => 'У вас недостаточно средств'
            ]
        ]);
      }
    }

    return response()->json([
       'message' =>  [
           'type' => 'success',
           'body' => 'Вы успешно изменили тариф'
       ]
    ]);

  }
}
