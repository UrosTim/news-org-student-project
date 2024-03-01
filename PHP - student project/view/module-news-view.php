<!--prikaz svih vesti-->
<page-news>
    <?php if (is_admin()): ?>
    <button class="add-article-btn">
        <a href="<?= FILE_NEWS ?>&action=submit">Add article</a>
    </button>
    <?php endif; ?>
    <?php foreach ($data AS $i => $d): ?>
    <news-list>
        <h2>
            <a class="news-title-anchor" href="<?= FILE_INDEX ?>?module=news&action=view&id=<?= $d['news_id'] ?>"><?= $d['news_title'] ?></a>
            <?php if (is_admin()): ?>
                <admin>
                    <a href="<?= FILE_NEWS ?>&action=edit&id=<?= $d['news_id'] ?>">
                        <i class="fa fa-pencil-square-o" id="edit" aria-hidden="true"></i>
                    </a>
                    <a href="<?= FILE_NEWS ?>&action=delete&id=<?= $d['news_id'] ?>">
                        <i class="fa fa-trash" id="delete" aria-hidden="true"></i>
                    </a>
                </admin>
            <?php endif; ?>
        </h2>
        <div class="news_date"><?= $d['news_date'] ?></div>
        <div class="news_short"><?= $d['news_short'] ?></div>
    </news-list>
    <?php endforeach; ?>
</page-news>