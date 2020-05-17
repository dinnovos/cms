<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\Controller;
use App\Traits\CrudI18nTrait;

class PagesController extends Controller
{
    use CrudI18nTrait;

    protected $appLayout = "admin";
    protected $appName = "admin";

    protected $module = "Pages";
    protected $pageTitle = "P&aacute;ginas";
    protected $model = "Page";

    protected $textCreateBtn = "Crear p&aacute;gina";

    protected $fields = [
        'es' => [
            'title' => 'P&aacute;gina',
        ],
        'status' => 'Estado',
    ];
}