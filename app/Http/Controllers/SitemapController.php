<?php

namespace App\Http\Controllers;

use App\Services\SitemapGenerator;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index(SitemapGenerator $generator)
    {
        $xml = Cache::remember('sitemap.xml', 60, function () use ($generator) {
            return $generator->generate();
        });

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=utf-8']);
    }
}
