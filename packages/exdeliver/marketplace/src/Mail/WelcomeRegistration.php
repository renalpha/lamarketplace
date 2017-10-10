<?php

namespace Exdeliver\Marketplace\Mail;

use App\User;
use Exdeliver\Marketplace\Mail\FromConfiguration;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $requestPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = new FromConfiguration();

        return $this->from($mail->config)
            ->view('forum::emails.user.welcome_registration');
    }
}