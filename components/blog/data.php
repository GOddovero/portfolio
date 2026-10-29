<?php
require_once dirname(__DIR__) . '/landing/helpers.php';

function gohArticles()
{
    static $articles;
    if ($articles !== null) return $articles;
    $articles = [];
    foreach (glob(dirname(__DIR__, 2) . '/content/blog/*.php') as $file) {
        $post = require $file;
        if (($post['status'] ?? 'published') !== 'published' || $post['published'] > date('Y-m-d')) continue;
        $plain = $post['answer'];
        foreach ($post['sections'] as $section) $plain .= ' ' . $section['title'] . ' ' . strip_tags($section['html']);
        foreach ($post['faqs'] as $faq) $plain .= ' ' . implode(' ', $faq);
        $post['words'] = preg_match_all('/[\p{L}\p{N}]+/u', $plain);
        $post['minutes'] = max(1, (int) ceil($post['words'] / 200));
        $articles[$post['slug']] = $post;
    }
    uasort($articles, function ($a, $b) {
        return strcmp($b['published'], $a['published']) ?: strcmp($a['title'], $b['title']);
    });
    return $articles;
}

function gohArticleUrl($slug) { return gohUrl('blog/' . $slug . '/'); }

function gohProductUrl($post)
{
    return strpos($post['productLink'], 'https://') === 0 ? $post['productLink'] : gohUrl($post['productLink']);
}

function gohBlogCategories()
{
    return ['comercios' => 'Comercios', 'gimnasios' => 'Gimnasios', 'salud' => 'Salud', 'gastronomia' => 'Gastronomía', 'estudios-contables' => 'Estudios contables', 'desarrollo' => 'Desarrollo a medida'];
}

function gohBlogDate($date)
{
    $months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
    [$year, $month, $day] = explode('-', $date);
    return (int) $day . ' de ' . $months[(int) $month - 1] . ' de ' . $year;
}

function gohSearchText($text)
{
    $text = function_exists('mb_strtolower') ? mb_strtolower($text, 'UTF-8') : strtolower($text);
    return strtr($text, ['á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u','ü'=>'u','ñ'=>'n','Á'=>'a','É'=>'e','Í'=>'i','Ó'=>'o','Ú'=>'u','Ñ'=>'n']);
}
