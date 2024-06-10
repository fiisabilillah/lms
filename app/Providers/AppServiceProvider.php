<?php

namespace App\Providers;

use App\Models\SmtpSetting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (\Illuminate\Support\Facades\Schema::hasTable('smtp_settings')) {
            $smtpsetting = SmtpSetting::first();
 
            if ($smtpsetting) {
            $data = [
             'driver' => $smtpsetting->mailer, 
             'host' => $smtpsetting->host,
             'port' => $smtpsetting->port,
             'username' => $smtpsetting->username,
             'password' => $smtpsetting->password,
             'encryption' => $smtpsetting->encryption,
             'from' => [
                 'address' => $smtpsetting->from_address,
                 'name' => 'Easycourselms'
             ]
 
             ];
             Config::set('mail',$data);
            }
        } // end if

        Carbon::setLocale('id');
 
    }
}
