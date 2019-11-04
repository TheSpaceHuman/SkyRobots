<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class IndexForm extends Mailable
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
      $this->user_name = $data['name'];
      $this->user_email = $data['email'];
      $this->user_telegram = $data['telegram'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from(config('mail.from.address'))
          ->markdown('email.indexForm')
          ->subject('Форма на главной')
          ->with([
              'user_name' => $this->user_name,
              'user_email' => $this->user_email,
              'user_telegram' => $this->user_telegram,
          ]);
    }
}
