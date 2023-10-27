<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    $response = Http::get('http://p30download.ir');
//    return $response;
//    $response = Http::get('https://api.qrserver.com/v1/create-qr-code/?data=mokhosh&size=100x100');
//    return response($response)->header('Content-Type', 'image/png');
//    $response = Http::get('https://picsum.photos/600/300');
//    return response($response)->header('content-type', 'image/jpeg');
//    $response = Http::get('https://emojihub.yurace.pro/api/random');
//    $response = Http::get('https://qrtag.net/api/qr_12.svg?url=https://mokhosh');
//    $response = Http::get('https://api.dictionaryapi.dev/api/v2/entries/en/hello');
//    $response = Http::get('https://api.fisenko.net/v1/quotes/en/random');
//    $response = Http::get('https://cdn.jsdelivr.net/gh/fawazahmed0/quran-api@1/editions/ara-quranuthmanihaf/5/10.json'); // https://github.com/fawazahmed0/quran-api
//    $response = Http::get('http://api.alquran.cloud/v1/edition'); // https://alquran.cloud/api
//    $response = Http::get('https://api.quran.com/api/v4/chapters'); // https://quran.api-docs.io/v4/getting-started/introduction

//    return response()->json(json_decode($response));

    return view('welcome');
});
