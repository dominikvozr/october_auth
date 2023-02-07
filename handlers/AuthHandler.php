<?php namespace Dondo\Auth\Handlers;

use Backend\Models\AccessLog;
use Illuminate\Routing\Controller;
use RainLab\User\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

//use October\Rain\Auth\Manager\Auth;

class AuthHandler extends Controller
{
	public function login(Request $request)
	{
		if (Auth::check() ) return response()->json(['authenticated' => true, 'user' => Auth::getUser()]);

		// Authenticate user by credentials
		$user = Auth::authenticate([
			'login' => $request->login,
			'password' => $request->password
		]);

		AccessLog::add($user);

		return response()->json(['authenticated' => true, 'user' => $user->load('groups')]);
	}

	public function checkAuthorization(Request $request)
	{
		return response()->json([
			'authenticated' => Auth::check()
		]);
	}

	public function logout()
	{
		Auth::logout();
		return response('success');
	}

	public function register(Request $request)
	{
		if (Auth::check()) return response()->json('you are authenticated');

		$user = Auth::register([
			'name' => $request->name,
			/* 'login' => $request->login, */
			'username' => $request->username,
			'surname' => $request->surname,
			'permissions' => $request->permissions,
			'email' => $request->email,
			'password' => $request->password,
			'password_confirmation' => $request->password_confirmation,
			'created_ip_address' => $request->ip(),
			'last_ip_address' => $request->ip(),
		], true);

		return $user->toJson();
	}

	private function onCheckEmail()
	{
		return ['isTaken' => Auth::findUserByLogin(post('email')) ? 1 : 0];
	}
}
