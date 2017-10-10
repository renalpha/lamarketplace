<?php

namespace Exdeliver\Marketplace\Mail;

use Exdeliver\Marketplace\Mail\FromConfiguration;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\User;
use Illuminate\Queue\SerializesModels;

class RequestPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $settings;

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
        $this->settings = new FromConfiguration();

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->settings->config)
            ->view('forum::emails.user.request_password');
    }
}