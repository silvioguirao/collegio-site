<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function sitemap_route_returns_xml()
    {
        // seed a published news post to ensure dynamic content appears
        \App\Models\NewsPost::factory()->create(['is_published' => true]);

        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
        $response->assertSee('<urlset', false);
        $response->assertSee(route('home'), false);
    }
}
