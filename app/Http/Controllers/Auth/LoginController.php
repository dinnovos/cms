<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Rules\NotAdminRule;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $post = request()->all();
        $remember = false;

        $validator = $this->validateLogin($post);

        if ($validator) {
            return redirect(route('auth.user.login.show'))->withErrors($validator)->withInput();
        }

        if(array_key_exists('remember', $post) && $post['remember'] === 'on'){
            $remember = true;
        }

        if (Auth::attempt(['email' => $post['email'], 'password' => $post['password'], 'status' => 1], $remember)) {
            $profile = Auth::user();

            $cart = session("cart", []);  

            if($profile){
                request()->session()->flash('alert_success', "Bienvenido {$profile->full_name}!");
            }

            Auth::guard()->login($profile);
        
            if(is_array($cart) && count($cart)){
                return redirect(route('frontoffice.shopping.cart.index'));
            }

            return redirect(route('backoffice.account.dashboard'));
        }

        return redirect(route('auth.user.login.show'))->with('alert_error', 'Usuario o Contrase&ntilde;a no v&aacute;lida');
    }

    public function logout()
    {
        $user = Auth::user();

        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            session()->flush();

            request()->session()->flash('alert_success', "Hasta pronto!");
            return response()->redirectTo(route('auth.a.login.show'));
        }else{
            Auth::logout();
        }

        session()->flush();

        request()->session()->flash('alert_success', "Hasta pronto!");

        return response()->redirectTo(route('auth.user.login.show'));
    }

    protected function validateLogin($post)
    {
        $validator = Validator::make($post, [
            'email'    => ['required','email', new NotAdminRule()],
            'password' => 'required',
            'remember' => 'in:on',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        return null;
    }
}