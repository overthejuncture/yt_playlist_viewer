<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\YouTube;

class YoutubeController extends Controller
{
    public function index(Youtube $service)
    {
        $data = $service->playlists->listPlaylists('snippet', ['mine' => true, 'maxResults' => 10])->toSimpleObject()->items;
        return view('youtube.index');
    }

    public function watchLater()
    {
        return view('youtube.watch-later');
    }

    public function exportAllPlaylists(Youtube $service)
    {
        $data = $service->playlists->listPlaylists('snippet', ['mine' => true, 'maxResults' => 10])->toSimpleObject()->items;
        return view('youtube.export-playlists', ['playlists' => $data]);
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
