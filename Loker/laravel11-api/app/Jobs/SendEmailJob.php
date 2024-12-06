<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mendapatkan payload dan mendeserialisasi menjadi array
        $data = json_decode($this->payload, true);

        // Mengakses data dalam payload
        $task = $data['task'];
        $to = $data['to'];
        $subject = $data['subject'];
        $body = $data['body'];

        // Menggunakan data untuk mengirim email
        Mail::to($to)->send(new WelcomeMail($subject, $body));
    }
}
