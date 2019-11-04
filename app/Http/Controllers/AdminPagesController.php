<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
  public function dashboard()
  {
    return view('admin.pages.dashboard');
  }

  public function clients()
  {
    $users = User::all();
    return view('admin.pages.clients', compact('users'));
  }

  public function payments()
  {
    return view('admin.pages.payments');
  }


  public function purchases()
  {
    return view('admin.pages.purchases');
  }

  public function rates()
  {
    return view('admin.pages.rates');
  }

  public function news()
  {
    $news = News::all();

    return view('admin.pages.news', compact('news'));
  }


}
