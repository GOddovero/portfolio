<article class="blog-card tone-<?= gohEscape($post['tone']) ?>">
    <a class="blog-card-visual" href="<?= gohArticleUrl($post['slug']) ?>" aria-label="<?= gohEscape($post['title']) ?>">
        <img src="<?= gohAsset($post['logo']) ?>" alt="" width="200" height="160" loading="lazy" decoding="async">
        <span aria-hidden="true"><?= gohIcon('arrow') ?></span>
    </a>
    <div class="blog-card-body">
        <p class="blog-meta"><span><?= gohEscape($post['categoryLabel']) ?></span><span><?= $post['minutes'] ?> min de lectura</span></p>
        <h3><a href="<?= gohArticleUrl($post['slug']) ?>"><?= gohEscape($post['title']) ?></a></h3>
        <p class="blog-card-description"><?= gohEscape($post['description']) ?></p>
        <div class="blog-card-foot"><time datetime="<?= $post['published'] ?>"><?= gohBlogDate($post['published']) ?></time><span><?= gohEscape($post['product']) ?></span></div>
    </div>
</article>
