<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @method void authorize(string $ability, mixed $arguments = [])
 * @method \Illuminate\Auth\Access\Response authorizeForUser(\Illuminate\Contracts\Auth\Authenticatable $user, string $ability, mixed $arguments = [])
 * @method \Illuminate\Auth\Access\Response|bool can(string $ability, mixed $arguments = [])
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
