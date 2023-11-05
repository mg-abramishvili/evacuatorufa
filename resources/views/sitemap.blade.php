<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
    <loc>{{ url('/') }}/</loc>
    <lastmod>{{ $latestUpdatedPage->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1</priority>
</url>
@foreach ($pages as $page)
    <url>
        <loc>{{ url('/') }}/p/{{ $page->slug }}/</loc>
        <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
</urlset>