<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Jobs\SendIndexForm;
use App\Jobs\SendRegisterForm;
use Illuminate\Http\Request;

class MailController extends Controller
{
  public function indexForm(IndexFormRequest $request)
  {
    $this->dispatch(new SendIndexForm());

    return response()->json(['message' => [
        'type' => 'success',
        'body' => 'Спасибо '.$request->name.', ваше сообщение успешно отправлено'
    ]]);

  }

  public function registerForm(RegisterFormRequest $request)
  {
    $this->dispatch(new SendRegisterForm());

    return response()->json(['message' => [
        'type' => 'success',
        'body' => 'Спасибо '.$request->name.' , вы успешно зарегистрировались'
    ]]);

  }
}
