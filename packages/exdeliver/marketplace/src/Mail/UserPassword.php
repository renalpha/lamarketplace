<?php

namespace Exdeliver\Marketplace\Mail;

use Exdeliver\Marketplace\Mail\FromConfiguration;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\User;
use Illuminate\Queue\SerializesModels;

class UserPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $settings;
    public $password;

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
        $password = str_random(10);

        $user = \App\User::findOrFail($user->id);
        $user->password = \Hash::make($password);
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->settings->config)
            ->view('marketplace::emails.user.user_password');
    }
}