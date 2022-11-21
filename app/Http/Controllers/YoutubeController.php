<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\YouTube;

class YoutubeController extends Controller
{
    public function index()
    {
        return view('vue');
    }

    public function createAuthUrl(Client $client)
    {
        return redirect($client->createAuthUrl());
    }

    public function checkKey(Client $client, Request $request)
    {
        $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));
        $client->setAccessToken($token);

        if (isset($token['refresh_token'])) {
            /** @var User $user */
            $user = auth()->user();
            $user->refresh_token = $token['refresh_token'];
            $user->save();
        }

        // redirect back to the example
        return redirect(url('/youtube'));
    }
}
