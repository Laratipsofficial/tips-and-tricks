<?php

namespace App\Mail;

use App\Models\Role;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendWelcomeMessageMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->afterCommit();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome-message');
    }
}
