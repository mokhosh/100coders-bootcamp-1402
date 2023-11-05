<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

Route::get('/{file}', function ($file) {
    $html = Storage::get($file.'.html');
    $crawler = new Crawler($html);

    return response($html, headers: ['Content-Type' => 'text/plain']);
    return collect($crawler->filter('[data-start]')->each(function ($node) {
        return $node->text();
    }))->reduce(fn ($next, $carry) => $next . ' ' . $carry);
    return $html;
});
