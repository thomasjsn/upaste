<?php

namespace App\Console\Commands;

use App\ShortUrl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class UrlListCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "url:list
                            {hash?* : Hash keys to list}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "List all URLs";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(count($this->argument('hash')) > 0) {
            $hgetall = array_flip($this->argument('hash'));
        } else {
            $hgetall = Redis::hgetall('sys:shorturl');
        }
        $shortUrls = [];

        foreach ($hgetall as $hash => $url)
        {
            $shortUrl = ShortUrl::Find($hash);

            if (is_null($shortUrl)) {
                continue;
            }

            $shortUrls[] = [
                'hash' => $shortUrl->hash,
                'url' => $shortUrl->content,
                'hits' => $shortUrl->hits
            ];
        }

        $headers = ['Hash', 'URL', 'Hits'];
        $this->table($headers, $shortUrls);
    }
}
