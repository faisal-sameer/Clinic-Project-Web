<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\SendNoificationFCM;
use App\Models\User;

class SendFCG implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::get();
        foreach ($users as $user) {
            if ($user->token != null) {

                $test = new SendNoificationFCM();
                $test->sendGCM("Hello", "AF here day 2", "cZ5OzPeISdKBzcSicPDrzc:APA91bHTU37xE-tVGiVREXPdGhmNjd7GIV0tMJzRH7_fEXm0XFEPgu1Qi5h2aIuWRrk9W-HNzmqsar11hy6CchY7oYWcfwz5byfk9Kwxd_arngyAGbkIkcJhrQRraLFNCCkSM02TLaoL", "1", "w");
                sleep(2);
            }
        }
    }
}
