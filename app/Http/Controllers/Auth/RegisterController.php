<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

use App\Repositories\UserRepository;

use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $userRepository = null;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $loginAfterCreate = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->middleware('guest');

        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        if($this->loginAfterCreate){
            $this->guard()->login($user);
        }

        try {
            Mail::to($user->email)->send(new Welcome($user));
        } catch (\Exception $e) {}

        return $this->registered($request, $user) ?: redirect($this->redirectPath())->with('alert_success', 'Por favor, verifique su cuenta de correo');
    }

    public function emailConfirmation($token){

        $user = $this->userRepository->findWhere(["status"=>2, "email_token" => $token])->first();
        
        $result = [
            'status'    => "ok",
            'message'   => "Su cuenta de corre ha sido confirmada con &eacute;xito",
        ];

        if($user){

            $dt = Carbon::now(config('app.timezone'));
            $at = Carbon::instance(new \DateTime($user->email_token_created, new \DateTimeZone(config('app.timezone'))));

            // Si es mayor a 12 horas
            if($dt->diffInHours($at) > 12){

                $result = [
                    'status'    => "failed",
                    'message'   => "Su enlace ha expirado",
                ];

                return view('auth.email_confirmation', compact("result"));
            }
            
            try {
                $user->status = 1;
                $user->email_token = null;
                $user->email_confirmed = 1;
                $user->email_token_created = null;
                $user->save();
            } catch (\Exception $e) {
                $result = [
                    'status'    => "failed",
                    'message'   => "Ocurrio un error, por favor intente m&aacute;s tarde",
                ];
            }
        }else{
            $result = [
                'status'    => "failed",
                'message'   => "El token no es v&aacute;lido, por favor intente nuevamente",
            ];
        }

        return view('auth.email_confirmation', compact("result"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'terms'     => 'required|in:1',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'full_name'         => $data['full_name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'status'            => 2,
            'type'              => 1,
            'email_token'           => sha1(datetimeToken()),
            'email_token_created'   => datetimeFormat(null),
        ]);
    }
}
