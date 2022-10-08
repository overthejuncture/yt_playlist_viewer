<?php

namespace App\Providers;

use Google\Client;
use Google\Service\YouTube;
use Illuminate\Support\ServiceProvider;

class YoutubeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Setup config for Google Api Client
        // TODO create config for everything
        $this->app->singleton(Client::class, function ($app) {
            $client = new Client();
            $client->setAuthConfig(base_path('client_secret.json'));
            $client->addScope(YouTube::YOUTUBE_READONLY);
            $client->setRedirectUri(url(config('youtube.redirect_uri')));
            $client->setAccessType('offline');
            $client->setPrompt('consent');
            return $client;
        });

        $this->app->bind(Youtube::class, function ($app) {
            $client = $app->make(Client::class);
            return new Youtube($client);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
