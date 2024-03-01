<!--prikaz pojedinacne slike iz galerije-->
<?php if (!empty($gallery_image)): ?>
    <page-gallery-image>
        <gallery-image-container>
            <?php if (empty($_error)): ?>
            <gallery-image-title>
                <?= $gallery_image['gallery_title'] ?>
            </gallery-image-title>
            <gallery-image-date>
                <?= $gallery_image['gallery_date'] ?>
            </gallery-image-date>
            <gallery-image>
                <img src="<?= DIR_PUBLIC_GALLERY ?><?= $gallery_image['gallery_id'] ?>.jpg">
            </gallery-image>
            <gallery-image-description>
                <?= $gallery_image['gallery_description'] ?>
            </gallery-image-description>
            <?php endif; ?>
        </gallery-image-container>
    </page-gallery-image>
<?php endif; ?>
