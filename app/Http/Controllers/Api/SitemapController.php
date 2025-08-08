<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlObservers\CrawlObserver;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class SitemapController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');
        $urls = [];

        $observer = new class extends CrawlObserver {
            public $urls = [];

            public function crawled(
                UriInterface $url,
                ResponseInterface $response,
                ?UriInterface $foundOnUrl = null,
                ?string $linkText = null,
            ): void {
                $this->urls[] = (string)$url;
            }

            public function crawlFailed(
                UriInterface $url,
                RequestException $requestException,
                ?UriInterface $foundOnUrl = null,
                ?string $linkText = null,
            ): void {
                Log::error("Crawl failed for url: {$url}. Reason: {$requestException->getMessage()}");
            }
        };

        Crawler::create()
            ->setCrawlObserver($observer)
            ->startCrawling($url);

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($observer->urls as $crawledUrl) {
            $sitemap .= '  <url>' . PHP_EOL;
            $sitemap .= '    <loc>' . htmlspecialchars($crawledUrl) . '</loc>' . PHP_EOL;
            $sitemap .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
            $sitemap .= '    <changefreq>daily</changefreq>' . PHP_EOL;
            $sitemap .= '    <priority>0.8</priority>' . PHP_EOL;
            $sitemap .= '  </url>' . PHP_EOL;
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
