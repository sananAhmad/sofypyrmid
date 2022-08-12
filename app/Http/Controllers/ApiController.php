<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\traits\PoolTrait;

class ApiController extends Controller
{
    use PoolTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = "https://api.kanye.rest";
        $responses = PoolTrait::poolrequest($url);
        $emptyArray = [];
        foreach ($responses as $response) {
            $emptyArray[] = json_decode($response)->quote;
        }
        return success('successfully return data', $emptyArray);
    }
}
