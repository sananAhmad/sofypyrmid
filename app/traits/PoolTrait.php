<?php

namespace App\traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;



trait PoolTrait
{

    /**
     * @param $url
     * @return mixed
     */
    public static function poolrequest($url)
    {
        if ($url) {
            $responses = Http::pool(fn (Pool $pool) => [
                $pool->get($url),
                $pool->get($url),
                $pool->get($url),
                $pool->get($url),
                $pool->get($url),
            ]);
            return $responses;
        }
    }
}
