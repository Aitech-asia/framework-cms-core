<?php

namespace Core\User\Traits;

use Illuminate\Auth\Passwords\CanResetPassword as IlluminateCanResetPassword;
use Core\User\Notifications\ResetPassword as ResetPasswordNotification;

trait CanResetPassword
{
    use IlluminateCanResetPassword;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
} 