<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Kobiyim\Models\ActivityLog;

if (function_exists('getLatestLaravelFramework')) {
    return Http::post('https://api.kobiyim.com/get-latest-laravel-framework', [
        'username' => env('KOBIYIM_USERNAME'),
        'app_secret' => env('KOBIYIM_APPSECRET'),
        'app_key' => env('KOBIYIM_APPKEY'),
    ]);
}

if (function_exists('getLatestKobiyim')) {
    return Http::post('https://api.kobiyim.com/get-latest-kobiyim-framework', [
        'username' => env('KOBIYIM_USERNAME'),
        'app_secret' => env('KOBIYIM_APPSECRET'),
        'app_key' => env('KOBIYIM_APPKEY'),
    ]);
}

if (function_exists('checkConnection')) {
    return Http::post('https://api.kobiyim.com/check-connection', [
        'username' => env('KOBIYIM_USERNAME'),
        'app_secret' => env('KOBIYIM_APPSECRET'),
        'app_key' => env('KOBIYIM_APPKEY'),
    ]);
}

if (function_exists('saveActivity')) {
    function saveActivity($type)
    {
        return Http::post('https://api.kobiyim.com/save-activity', [
            'username' => env('KOBIYIM_USERNAME'),
            'app_secret' => env('KOBIYIM_APPSECRET'),
            'app_key' => env('KOBIYIM_APPKEY'),
            'type' => $type,
        ]);
    }
}

if (function_exists('saveBackupStatus')) {
}

if (function_exists('saveLog')) {
}

if (function_exists('getKobiyimUpdates')) {
}

if (function_exists('sendSMS')) {
}

// $router->post('get-latest-laravel-framework', 'GetLatestLaravelFramework@work');
// $router->post('get-latest-kobiyim-framework', 'GetLatestKobiyimFramework@work');
// $router->post('check-connection', 'CheckConnection@work');
// $router->post('save-activity', 'SaveActivity@work');
// $router->post('save-backup-status', 'SaveBackupStatus@work');
// $router->post('save-log', 'SaveLog@work');
// $router->post('updates', 'Updates@work');
// $router->post('send-sms', 'SendSMS@work');

if (!function_exists('ar')) {
    function ar($values, $log_name = 'default')
    {
        // 'log_name', 'causer_id', 'subject_type', 'subject_id', 'description', 'properties'
        $values = Arr::add($values, 'log_name', $log_name);
        $values = Arr::add($values, 'causer_id', (Auth::check()) ? Auth::id() : (isset($values['causer_id']) ? $values['causer_id'] : null));

        return ActivityLog::create($values);
    }
}
