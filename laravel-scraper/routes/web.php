<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

Route::get('/{file}', function ($file) {
    $html = Storage::get($file.'.html');
    $crawler = new Crawler($html);

    return $crawler->filter('[data-text=true]')->each(function ($node) {
        return $node->text();
    });
    return response($html, headers: ['Content-Type' => 'text/plain']);
    return $html;
});
