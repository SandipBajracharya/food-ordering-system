<?php

namespace App\Helpers;

use App\Jobs\SendEmailJob;
use App\Jobs\SendEmailJobVendor;
use Carbon\Carbon;

class EmailHelper
{
    public static function sendEmail($data)
    {
        $emailJob = new SendEmailJob($data);
        dispatch($emailJob);
    }

    public static function sendEmailToVendor($email, $content, $subject)
    {
        $emailJob = new SendEmailJobVendor($email, $content, $subject);
        dispatch($emailJob);
    }
}
