<?php

namespace App\Jobs;

use App\Mail\RegisterForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegisterForm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $to = env('MAIL_TO_ADDRESS');
      $reply_to = env('MAIL_REPLY_TO_ADDRESS');

      $data['email'] = request('email');;
      $data['name'] = request('name');
      $data['phone'] = request('phone');
      $data['region'] = request('region');
      $data['password'] = request('password');
      $data['partner'] = request('partner');

      Mail::to($to)->bcc($reply_to)->send(new RegisterForm($data));
    }
}
