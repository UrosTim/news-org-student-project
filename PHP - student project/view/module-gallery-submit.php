<!--prikaz za dodavanje ili editovanje slike-->
<page-gallery>
    <?php if (!empty($_message)): ?>
        <?php if (in_array($_action, ['submit', 'edit'])): ?>
            <a href="<?= FILE_GALLERY ?>">Go back to Gallery</a>
        <?php endif; ?>
    <?php else: ?>
        <form id="gallery-submit-form" method="post" enctype="multipart/form-data">
            <label>Image title</label>
            <input id="gallery-image-title" type="text" name="title" value="<?= $gallery_title ?? '' ?>">
            <label>Image description</label>
            <input type="text" name="description" value="<?= $gallery_description ?? '' ?>">
            <?php if ($_action == 'submit'): ?>
            <label>Image</label>
            <label class="file">
                <input name="image" type="file" id="file" aria-label="File browser example">
                <span class="file-custom"></span>
            </label>
            <?php endif; ?>
<!--            <label>Image thumbnail</label>-->
<!--            <label class="file">-->
<!--                <input name="image-th" type="file" id="file" aria-label="File browser example">-->
<!--                <span class="file-custom"></span>-->
<!--            </label>-->
            <button class="add-article-btn">Submit</button>
        </form>
    <?php endif; ?>
</page-gallery>
