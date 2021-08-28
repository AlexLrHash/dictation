<?php 

namespace App\Repositories;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Service\SocialService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Repositories\ProfileRepositories;

class SocialRepositories 
{
	public function index()
	{
		return Socialite::driver('vkontakte')->redirect();
	}

	public function callback()
	{
		$user = Socialite::driver("vkontakte")->user();
    	$obSocial = new SocialService();
    	if($user=$obSocial->saveSocialData($user)) {
    		Auth::login($user, true);
    		return redirect('/');
    	}
    	return back();
	}

}
