<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\UserSocialAccount;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(string $social_network_name)
    {
        return Socialite::driver($social_network_name)->redirect();
    }

    public function handleProviderCallback(string $social_network_name){
        if(!request()->has('code') || request()->has('denied')){
            session()->flash('message', ['danger'], __('Inicio de sesión cancelado'));
            return redirect('login');
        }
        $socialUser = Socialite::driver($social_network_name)->user();
    	$user = null;
    	$success = true;
    	$email = $socialUser->email;
    	$check = User::whereEmail($email)->first();
    	if($check) {
    		$user = $check;
	    } else {
    		\DB::beginTransaction();
    		try {
    			$user = User::create([
    				"name" => $socialUser->name,
				    "email" => $email
			    ]);
    			UserSocialAccount::create([
    				"user_id" => $user->id,
				    "provider" => $social_network_name,
				    "provider_uid" => $socialUser->id
			    ]);
		    } catch (\Exception $exception) {
                dd($socialUser);
				$success = $exception->getMessage();
				\DB::rollBack();
		    }
	    }

	    if($success === true) {
    		\DB::commit();
    		auth()->loginUsingId($user->id);
    		return redirect(route('home'));
	    }
	    session()->flash('message', ['danger', $success]);
    	return redirect('login');
    }
}
