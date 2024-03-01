<!--prikaz pojedinacne vesti-->
<?php if (!empty($news_article)): ?>
<page-news>
    <article-container>
        <article-title>
            <?= $news_article['news_title'] ?>
        </article-title>
        <article-date>
            <?= $news_article['news_date'] ?>
        </article-date>
        <article-description>
            <?= $news_article['news_description'] ?>
        </article-description>
    </article-container>
</page-news>
<?php endif; ?>