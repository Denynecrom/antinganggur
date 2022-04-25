<?php

namespace App\Mail;

use App\Models\Vacancy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicantNotAccepted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $advertisement = $this->vacancy->advertisement;
        return $this->from($advertisement->company->email)->view('mail/applicant_reply_notaccepted')
            ->with([
            'advertisement' => $advertisement,
            'company' => $advertisement->company
            ])
            ->subject('Lamaran anda belum diterima');
    }
}
