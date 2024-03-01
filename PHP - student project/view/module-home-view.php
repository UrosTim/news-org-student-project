<!--prikaz najnovijih vesti i slika na pocetnoj strani-->
<page-home>
    <home-news>
        <?php foreach ($data_news AS $i => $d): ?>
            <home-news-list>
                <h2>
                    <a class="news-title-anchor" href="<?= FILE_INDEX ?>?module=news&action=view&id=<?= $d['news_id'] ?>"><?= $d['news_title'] ?></a>
                </h2>
                <div class="news_date"><?= $d['news_date'] ?></div>
                <div class="news_short"><?= $d['news_short'] ?></div>
            </home-news-list>
        <?php endforeach; ?>
    </home-news>
    <home-gallery>
        <?php foreach ($data_images AS $i => $d): ?>
            <home-image-list>
                <h2>
                    <a class="gallery-image-title-anchor" href="<?= FILE_GALLERY ?>&action=view&id=<?= $d['gallery_id'] ?>"><?= $d['gallery_title'] ?></a>
                </h2>
                <gallery-image-thumb>
                    <img src="<?= DIR_PUBLIC_GALLERY ?><?= $d['gallery_id'] ?>t.jpg">
                </gallery-image-thumb>
                <div class="gallery-image-date"><?= $d['gallery_date'] ?></div>
            </home-image-list>
        <?php endforeach; ?>
    </home-gallery>
</page-home>
