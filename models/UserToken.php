<?php namespace Dondo\Auth\Models;

use Laravel\Sanctum\HasApiTokens;
use RainLab\User\Models\User;

class UserToken
{
	use HasApiTokens;
	protected $table = 'user_tokens';

	public $belongsTo = [
		'user' => [User::class, 'table' => 'users']
	];

	protected $fillable = [
		'user_id',
		'token',
		'device_name'
	];

	protected $guarded = ['*'];

}
