<!--prikaz svih slika u galeriji-->
<page-gallery>
    <?php if (is_admin()): ?>
        <button class="add-article-btn">
            <a href="<?= FILE_GALLERY ?>&action=submit">Add image</a>
        </button>
    <?php endif; ?>
    <?php foreach ($data AS $i => $d): ?>
        <gallery-image-list>
            <h2>
                <a class="gallery-image-title-anchor" href="<?= FILE_GALLERY ?>&action=view&id=<?= $d['gallery_id'] ?>"><?= $d['gallery_title'] ?></a>
                <?php if (is_admin()): ?>
                    <admin>
                        <a href="<?= FILE_GALLERY ?>&action=edit&id=<?= $d['gallery_id'] ?>">
                            <i class="fa fa-pencil-square-o" id="edit" aria-hidden="true"></i>
                        </a>
                        <a href="<?= FILE_GALLERY ?>&action=delete&id=<?= $d['gallery_id'] ?>">
                            <i class="fa fa-trash" id="delete" aria-hidden="true"></i>
                        </a>
                    </admin>
                <?php endif; ?>
            </h2>
            <gallery-image-thumb>
                <img src="<?= DIR_PUBLIC_GALLERY ?><?= $d['gallery_id'] ?>t.jpg">
            </gallery-image-thumb>
            <div class="gallery-image-date"><?= $d['gallery_date'] ?></div>
        </gallery-image-list>
    <?php endforeach; ?>
</page-gallery>
