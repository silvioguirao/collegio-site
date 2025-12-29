<?php

namespace App\Services;

use App\Models\NewsPost;
use App\Models\Teacher;
use App\Models\Facility;
use App\Models\Event;
use Illuminate\Support\Carbon;

class SitemapGenerator
{
    public function generate(): string
    {
        $urls = [];
        $add = function ($loc, $lastmod = null, $changefreq = 'weekly', $priority = '0.5') use (&$urls) {
            $lastmodStr = null;
            if ($lastmod) {
                if ($lastmod instanceof Carbon) {
                    $lastmodStr = $lastmod->toAtomString();
                } else {
                    $lastmodStr = Carbon::parse($lastmod)->toAtomString();
                }
            }

            $urls[] = [
                'loc' => $loc,
                'lastmod' => $lastmodStr,
                'changefreq' => $changefreq,
                'priority' => $priority,
            ];
        };

        // Statics and named routes
        $add(route('home'), now(), 'daily', '1.0');
        $add(route('about'), now(), 'monthly', '0.6');
        $add(route('pedagogy'), now(), 'monthly', '0.6');
        $add(route('calendar'), now(), 'weekly', '0.7');
        $add(route('news.index'), now(), 'daily', '0.7');
        $add(route('teachers.index'), now(), 'monthly', '0.6');
        $add(route('facilities.index'), now(), 'monthly', '0.6');
        $add(route('events.index'), now(), 'weekly', '0.6');
        $add(route('admissions.index'), now(), 'monthly', '0.5');
        $add(route('contact.show'), now(), 'monthly', '0.4');
        $add(route('faq.index'), now(), 'monthly', '0.4');
        $add(route('policy.privacy'), now(), 'yearly', '0.2');

        // Course stages
        try {
            $add(route('stages.fundamental-1'), now(), 'yearly', '0.5');
            $add(route('stages.fundamental-2'), now(), 'yearly', '0.5');
            $add(route('stages.ensino-medio'), now(), 'yearly', '0.5');
            $add(route('stages.pre-vestibular'), now(), 'yearly', '0.5');
        } catch (\Exception $e) {
            // ignore missing routes
        }

        // Dynamic
        foreach (NewsPost::where('is_published', true)->get() as $news) {
            $add(route('news.show', $news->slug), $news->published_at ?? $news->updated_at, 'weekly', '0.8');
        }

        foreach (Teacher::all() as $t) {
            $add(route('teachers.show', $t->id), $t->updated_at ?? null, 'yearly', '0.5');
        }

        foreach (Facility::all() as $f) {
            $add(route('facilities.show', $f->id), $f->updated_at ?? null, 'yearly', '0.5');
        }

        foreach (Event::where('date', '<=', now()->addYear())->get() as $e) {
            $add(route('events.show', $e->id), $e->date ?? $e->updated_at, 'monthly', '0.6');
        }

        return view('sitemap.index', compact('urls'))->render();
    }
}
