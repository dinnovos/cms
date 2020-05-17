<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\Block;
use Illuminate\Support\Facades\Auth;

function setting($key, $default = -1){

    $hasTable = false;

    try {
        $hasTable = Schema::hasTable('settings');
    } catch (Exception $e) {
        return null;
    }

    if ($hasTable) 
    {
        $setting = cache()->get('setting');

        if(! $setting){
            cache()->rememberForever('setting', function () {
                return \DB::table('settings')->first();
            });

            $setting = cache()->get('setting');
        }

        if($setting && isset($setting->$key) && $setting->$key){
            return $setting->$key;
        }

        if($default !== -1){
            return $default;
        }
    }

    return null;
}