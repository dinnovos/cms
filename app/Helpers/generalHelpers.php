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
        if($default !== -1){
            return $default;
        }
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
    }

    
    if($default !== -1){
        return $default;
    }

    return null;
}

function convertToArray($items, $key, $value){
    $data = [];

    foreach($items as $item){
        $data[$item->$key] = $item->$value;
    }

    return $data;
}

function priceFormat($price){
    return number_format($price, 2, ',', '.');
}

function datetimeToken(){
    return preg_replace('/[^0-9]+/', '', Carbon::now()->format('Y-m-d H:i:s'));
}

if (! function_exists('datetimeFormat')) {
    function datetimeFormat($value = null, $format = 'Y-m-d H:i:s')
    {
        if ($value) {
            $d = Carbon::instance(new \DateTime($value, new \DateTimeZone(config('app.timezone'))))->format($format);
        } else {
            $d = Carbon::now(config('app.timezone'))->format($format);
        }

        return $d;
    }
}

if (! function_exists('generateCode')) {
    function generateCode($length){
        $code = "";

        $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $max = strlen($string) - 1;

        for($i=0;$i < $length;$i++){
            $code .= $string[rand(0,$max)];
        }

        return $code;
    }
}

if (! function_exists('getBlock')) {

    function getBlock($label, $default = -1){
        $item = Block::where(['label' => $label])->first();

        if($item){
            return $item->content . ((Auth::guard('admin')->check()) ? '<a href="'.route('admin.blocks.edit', ["id" => $item->id]).'">Editar</a>' : '');
        }

        if($default !== -1){
            return $default;
        }

        return null;
    }
}

if (! function_exists('clearString')) {
    /**
     * Escape HTML special characters in a string.
     * @return string
     */
    function clearString($string)
    {
        $string = strip_tags($string);

        $string = str_replace(
            array("\\", "¨", "º", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", "¡",
                "¿", "[", "^", "`", "]",
                "+", "}", "{", "¨", "´",
                ">", "<", ";", ":", "*"),
            '',
            $string
        );

        $string = html_entity_decode($string, ENT_COMPAT, 'UTF-8');
        $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
        $string = trim($string);

        return $string;
    }
}

if (! function_exists('clearHtml')) {
    /**
     * Escape HTML special characters in a string.
     * @return string
     */
    function clearHtml($string)
    {
        $string = strip_tags($string);
        $string = html_entity_decode($string, ENT_COMPAT, 'UTF-8');
        $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
        $string = trim($string);

        return $string;
    }
}

if (! function_exists('repository')) {

    function repository($model){    
        return app("App\Repositories\\{$model}Repository");
    }
}

if (! function_exists('createToken')) {

    function createToken($string = '')
    {
        return sha1($string.config('app.name'));
    }
}