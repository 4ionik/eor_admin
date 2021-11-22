<?php

use Illuminate\Database\Seeder;
use anlutro\LaravelSettings\Facade as Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::set('company_name', 'ZOHO Admin');
        Setting::set('company_email', 'zoho@email.com');
        Setting::set('company_phone', '+50323456782');
        Setting::set('company_address', 'San Salvador');
        Setting::set('company_city', 'San Salvador');
        Setting::set('company_currency_symbol', '$');
        Setting::set('record_per_page', 15);
        Setting::set('default_role', 2);
        Setting::set('max_login_attempts', 3);
        Setting::set('lockout_delay', 2);
        Setting::save();
    }
}
