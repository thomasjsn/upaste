<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class UrlDeleteCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "url:del {hash : Hash key to delete}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Delete URL";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $hash = $this->argument('hash');
        $url = Redis::hget('urls', $hash);

        Redis::hdel('urls', $hash);
        Redis::zrem('urls:visits', $hash);
        Redis::hdel('urls:chksum', md5($url));
    }
}
