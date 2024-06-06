<?php

namespace App\Services;

class Session
{
    public static function success($message = 'success'): void
    {
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', 'success');
    }

    public static function failed($message = 'failed'): void
    {
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', 'danger');
    }
}
