<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Google\Client;
use Illuminate\Support\Facades\App;

class GoogleClientTokenValid
{
    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->user();
        /** @var Client $client */
        $client = App::make(Client::class);
        if (!isset($user->refresh_token)) {
            return redirect('/youtube/createAuthUrl');
        }
        if ($client->isAccessTokenExpired()) {
            $client->setAccessToken($client->refreshToken($user->refresh_token));
        }
        return $next($request);
    }
}
