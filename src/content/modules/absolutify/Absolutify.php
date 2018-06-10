<?php

function absolutify($html, $baseUrl = null)
{
    if (! $baseUrl) {
        $baseUrl = ModuleHelper::getBaseUrl();
    }
    $baseUrl = rtrim($baseUrl, '/');
    
    $html = trim($html);
    
    // Create a new DOM document
    $dom = new DOMDocument();
    
    // Parse the HTML. The @ is used to suppress any parsing errors
    // that will be thrown if the $html string isn't valid XHTML.
    @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
    $links = $dom->getElementsByTagName('a');
    
    foreach ($links as $link) {
        // prend $baseUrl before all site relative urls
        $href = $link->getAttribute('href');
        if (! is_url($href)) {
            $href = $baseUrl . "/" . ltrim($href, "/");
            $link->setAttribute("href", $href);
        }
    }
    $images = $dom->getElementsByTagName('img');
    
    // prepend $baseUrl before all site relative image srcs
    foreach ($images as $image) {
        $src = $image->getAttribute('src');
        if (! is_url($src)) {
            $src = $baseUrl . "/" . ltrim($src, "/");
            $image->setAttribute("src", $src);
        }
    }
    return trim($dom->saveHTML());
}
