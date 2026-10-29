<?php
/** Local presentation helpers; the existing contact endpoint is independent. */
function gohEscape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function gohUrl($path = '')
{
    static $base;
    if ($base === null) {
        $siteRoot = str_replace('\\', '/', dirname(__DIR__, 2));
        $documentRoot = rtrim(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: ''), '/');
        $base = $documentRoot !== '' && strncasecmp($siteRoot . '/', $documentRoot . '/', strlen($documentRoot) + 1) === 0
            ? substr($siteRoot, strlen($documentRoot)) : '';
    }
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

function gohCanonical($path = '')
{
    return 'https://goh.com.ar/' . ltrim($path, '/');
}

function gohAsset($path)
{
    $file = dirname(__DIR__, 2) . '/' . $path;
    return gohEscape(gohUrl($path) . '?v=' . filemtime($file));
}

require_once __DIR__ . '/seo.php';

function gohWhatsapp($message)
{
    return 'https://wa.me/543385405049?text=' . rawurlencode($message);
}

function gohIcon($name, $class = '')
{
    $paths = [
        'search' => '<circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/>',
        'boxes' => '<path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Zm-8 4.5 8 5 8-5M12 21v-8.5M8 5.2l8 4.6"/>',
        'people' => '<circle cx="9" cy="8" r="3"/><path d="M3 21v-3a6 6 0 0 1 12 0v3M16 5a3 3 0 0 1 0 6m2 3a5 5 0 0 1 3 4v3"/>',
        'document' => '<path d="M14 3H5v18h14V8l-5-5Zm0 0v5h5M8 12h8M8 16h6"/>',
        'table' => '<rect x="5" y="6" width="14" height="12" rx="2"/><path d="M8 3h8M8 21h8M2 9v6m20-6v6"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4m10-4v4M3 11h18m-13 4h2m4 0h2"/>',
        'chart' => '<path d="M4 3v18h17M8 16v-4m5 4V8m5 8V5"/>',
        'calculator' => '<rect x="5" y="2" width="14" height="20" rx="2"/><path d="M8 6h8M8 11h1m6 0h1m-8 4h1m6 0h1m-8 4h1m6 0h1"/>',
        'arrow' => '<path d="M5 12h14m-6-6 6 6-6 6"/>',
        'check' => '<path d="m5 12 4 4L19 6"/>',
        'gym' => '<path d="M6 5v14M3 8v8m15-11v14m3-11v8M6 12h12"/>',
        'shop' => '<path d="m3 4 2 4 2 10h12l2-10H5m4 13h.01M18 21h.01"/>',
        'code' => '<path d="m7 6-6 6 6 6m10-12 6 6-6 6M14 3l-4 18"/>',
        'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c5 5 5 13 0 18-5-5-5-13 0-18Z"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'chat' => '<path d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5Z"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 6 9 7 9-7"/>',
    ];
    return '<svg class="icon ' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($paths[$name] ?? $paths['arrow']) . '</svg>';
}
