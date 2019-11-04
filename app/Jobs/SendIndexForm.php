<?php

namespace App\Jobs;

use App\Mail\IndexForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendIndexForm implements ShouldQueue
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

      $data['name'] = request('name');
      $data['email'] = request('email');
      $data['telegram'] = request('telegram');

      Mail::to($to)->bcc($reply_to)->send(new IndexForm($data));
    }
}
