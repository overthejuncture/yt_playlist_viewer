<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO videos (title,real_id,author_id,author_title,user_id,thumbnail,is_watch_later) VALUES
             ('Bocchi the Rock! All Anime References (Evangelion, FLCL, K-ON, and more)','eOuvfC9PhIU','/@MelziBeenTrappin','Melzi Trap','1','https://i.ytimg.com/vi/eOuvfC9PhIU/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&amp;rs=AOn4CLDbxASb3zptfbS4yYKwDxnWQJFrMA',1),
             ('Psychiatrist Debunks Dopamine Fasting | Dr. K Explains','wK-s2qBU40A','/@HealthyGamerGG','HealthyGamerGG','1','https://i.ytimg.com/vi/wK-s2qBU40A/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&amp;rs=AOn4CLD7XqpSRcQvUh99JsM-xYaHSzqBmQ',1),
             ('Dame Dash: The Man That DISCOVERED &amp; Built Jay-z &amp; Kanye West!  | E192','NpmAsMs_m2g','/@TheDiaryOfACEO','The Diary Of A CEO','1','https://i.ytimg.com/vi/NpmAsMs_m2g/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&amp;rs=AOn4CLDNxUFzgeFgir9UWtgwANjm-3MDsA',1),
             ('just chatting about goals ASMR','H0UgqnquClk','/@rubynetherwood','ruby','1','https://i.ytimg.com/vi/H0UgqnquClk/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&amp;rs=AOn4CLB1ZEMEueUfdbyc6kR4tYa7hB7IHw',1),
             ('Sharp play in the Wing Gambit | Standard Chess #294','KCEDlTA-oGg','/@JohnBartholomewChess','John Bartholomew','1','https://i.ytimg.com/vi/KCEDlTA-oGg/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&amp;rs=AOn4CLDIF16H8rUS3kkXOML9DAeqt3Ozzg',1),
             ('Совет для построения крепких отношений | Джордан Питерсон','Dr55JElcpAo','/@jordan_peterson_ru','Джордан Питерсон','1','https://i.ytimg.com/vi/Dr55JElcpAo/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&amp;rs=AOn4CLAmDsmWAUHwWgodgr-TviDDfYs1uQ',1);
        ");
    }
}
