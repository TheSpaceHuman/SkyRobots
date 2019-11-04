<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterForm extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->user_email = $data['email'];
      $this->user_name = $data['name'];
      $this->user_phone = $data['phone'];
      $this->user_region = $data['region'];
      $this->user_password = $data['password'];
      $this->user_partner = $data['partner'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from(config('mail.from.address'))
          ->markdown('email.registerForm')
          ->subject('Форма регистрации')
          ->with([
              'user_email' => $this->user_email,
              'user_name' => $this->user_name,
              'user_phone' => $this->user_phone,
              'user_region' => $this->user_region,
              'user_password' => $this->user_password,
              'user_partner' => $this->user_partner,
          ]);
    }
}
