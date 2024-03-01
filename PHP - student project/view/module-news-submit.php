<!--pregled, forma za dodavanje ili editovanje vesti-->
<page-news>
    <?php if (!empty($_message)): ?>
        <?php if (in_array($_action, ['submit', 'edit'])): ?>
            <a href="<?= FILE_NEWS ?>">Go back to News</a>
    <?php endif; ?>
    <?php else: ?>
    <form id="article-form" method="post">
        <label>Article title</label>
        <input id="article-title" type="text" name="title" value="<?= $article_title ?? '' ?>">
        <label>Short description</label>
        <input type="text" name="short" value="<?= $article_short ?? '' ?>">
        <label>Article text</label>
        <textarea id="article-text" name="description" cols="30" rows="10"><?= $article_description ?? '' ?></textarea>
        <button class="add-article-btn">Submit</button>
    </form>
    <?php endif; ?>
</page-news>
