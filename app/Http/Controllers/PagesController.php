<?php

namespace App\Http\Controllers;

use App\News;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
  public function index()
  {
    return view('pages.index');
  }

  public function dashboard()
  {
    $news = News::paginate(6);

   return view('pages.dashboard', compact('news'));
  }

  public function profile()
  {
    return view('pages.profile');
  }

  public function licenses()
  {
    $packages = Package::orderBy('price_year', 'asc')->get();

    return view('pages.licenses', compact('packages'));
  }

  public function partners()
  {
    $user = auth()->user()->toJson();
    if(auth()->user()->parent_id_binary) {
      $binaryParent = json_encode(User::find(auth()->user()->parent_id_binary)->toArray());
    } else {
      $binaryParent = '';
    }
    if(auth()->user()->parent_id_linear) {
      $linearParent = json_encode(User::find(auth()->user()->parent_id_linear)->toArray());
    } else {
      $linearParent = '';
    }
    return view('pages.partners', compact('user', 'binaryParent', 'linearParent'));

  }

  public function opportunities()
  {
    return view('pages.opportunities');
  }

  public function income()
  {
    $packages = Package::orderBy('price_year', 'asc')->get();

    return view('pages.income', compact('packages'));
  }

  public function webinars()
  {
    return view('pages.webinars');
  }

  public function materials()
  {
    return view('pages.materials');
  }

  public function instructions()
  {
    return view('pages.instructions');
}

  public function referralsRegistrations($code)
  {
    $parent = User::where('registration_referral_link', $code)->firstOrFail();

    return view('auth.referralsRegistrations', compact('parent'));
  }
}
