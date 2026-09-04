<?php
/** Local presentation helpers; the existing contact endpoint is independent. */
function gohAsset($path)
{
    $file = dirname(__DIR__, 2) . '/' . $path;
    return htmlspecialchars($path . '?v=' . filemtime($file), ENT_QUOTES, 'UTF-8');
}

function gohWhatsapp($message)
{
    return 'https://wa.me/543385405049?text=' . rawurlencode($message);
}

function gohIcon($name, $class = '')
{
    $paths = [
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
