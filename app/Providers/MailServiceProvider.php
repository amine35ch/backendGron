<?php

namespace App\Providers;

use App\Models\PSmtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // if (Auth::check()) {
        //     $mail =DB::table('p_smtps')->where('d_company_id', Auth::user()->userable_id)->first();
        // } else {
        //     $mail = null; // Set $mail to null if user is not authenticated
        // }
        // dd($mail);
        // $config = [
        //     'driver' => 'smtp',
        //     'host' => $mail ? $mail?->mail_host:env('MAIL_HOST'),
        //     'port' => $mail ? $mail?->mail_port:env('MAIL_PORT'),
        //     'from' => ['address' =>$mail ? $mail?->mail_from_address:env('MAIL_FROM_ADDRESS'), 'name' => $mail ? $mail?->mail_from_name :env('MAIL_FROM_NAME')],
        //     'encryption' =>$mail ? $mail?->mail_encryption:env('MAIL_ENCRYPTION'),
        //     'username' =>$mail ? $mail?->mail_username:env('MAIL_USERNAME'),
        //     'password' =>$mail ? $mail?->mail_password:env('MAIL_PASSWORD'),
        //     'markdown' => [
        //         'theme' => 'default',
        //         'paths' => [
        //             resource_path('views/vendor/mail'),
        //         ],
        //     ],
        // ];
        // \Config::set('mail', $config);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
