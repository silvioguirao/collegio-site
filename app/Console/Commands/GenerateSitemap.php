<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml into public folder';

    public function handle(SitemapGenerator $generator)
    {
        $xml = $generator->generate();
        $path = public_path('sitemap.xml');
        file_put_contents($path, $xml);
        $this->info("Sitemap escrito em: {$path}");
        return 0;
    }
}
