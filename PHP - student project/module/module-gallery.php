<?php
//sprecavanje pristupa ako nije admin
if (!is_admin() && !in_array($_action, ['', 'view']))
    redirect(FILE_ERROR404);
//ruter galerije
switch ($_action) {
    case 'submit':
        //dodavanje nove slike
        $page_title = "Add image";
        $module_view_filename = 'module-gallery-submit.php';
        //kontrola gresaka
        if ($_POST) {
            switch ($_FILES['image']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $_error[] = 'Image size greater than maximum file size';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $_error[] = 'Image not selected';
                    break;
                case UPLOAD_ERR_PARTIAL:
                case UPLOAD_ERR_NO_TMP_DIR:
                case UPLOAD_ERR_CANT_WRITE:
                case UPLOAD_ERR_EXTENSION:
                    $_error[] = 'Failed to upload image';
                    break;
            }
            $gallery_title = $_POST['title'];
            $gallery_description = $_POST['description'];
            if ($gallery_title == '')
                $_error[] = 'Enter image title';
            if ($gallery_description == '')
                $_error[] = 'Enter image description';
            if (!empty($_error))
                break;
            //dodavanje podataka u bazu
            $gallery_date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `gallery` 
    				(`gallery_title`, `gallery_description`, `gallery_date`)
					VALUES 
					('{$gallery_title}', '{$gallery_description}', '{$gallery_date}') ";
            $result = mysqli_query($_db, $sql);
            if ($result === false)
                $_error[] = 'Failed to add the image';
            else {
                $_message [] = 'New image added successfully';
                $gallery_new_id = mysqli_insert_id($_db);
                $gallery_filename = DIR_PUBLIC_GALLERY . $gallery_new_id;
                move_uploaded_file($_FILES['image']['tmp_name'], "{$gallery_filename}.jpg");
                copy("{$gallery_filename}.jpg", "{$gallery_filename}t.jpg");
            }
        }
        break;
    case 'edit' :
        if ($_POST) {
            //editovanje slike
            $gallery_title = $_POST['title'];
            $gallery_description = $_POST['description'];
            $gallery_date = date('Y-m-d H:i:s');
            //pronalazak trazene slike u bazi
            $sql = "UPDATE `gallery` SET 
                  	`gallery_title` = '{$gallery_title}',
                 	`gallery_description` = '{$gallery_description}' 
                 	WHERE `gallery_id` = {$_id} LIMIT 1";
            $result = mysqli_query($_db, $sql);
            if ($result === false)
                $_error[] = 'Failed to edit the image';
            else
                $_message [] = 'Image edited successfully';
        }
        $page_title = "Edit image";
        $module_view_filename = 'module-gallery-submit.php';
        //dodavanje izmenjenih podataka u bazu
        $gallery_image = [];
        $sql = "SELECT * FROM `gallery` WHERE `gallery_id` = $_id LIMIT 1";
        $result = mysqli_query($_db, $sql);
        $gallery_image = mysqli_fetch_assoc($result);
        if (empty($gallery_image)) {
            $_error[] = 'Image that you are trying to edit does not exist';
            break;
        }
        $gallery_title = $gallery_image['gallery_title'];
        $gallery_description = $gallery_image['gallery_description'];
        break;
    case 'delete' :
        //brisanje slike iz baze
        $sql = "DELETE FROM `gallery` WHERE `gallery_id` = $_id LIMIT 1";
        mysqli_query($_db, $sql);
        $gallery_filename = DIR_PUBLIC_GALLERY . $_id;
        //brisanje slika iz DIR
        @unlink("{$gallery_filename}.jpg");
        @unlink("{$gallery_filename}t.jpg");
        redirect(FILE_GALLERY);
        break;
    case 'view':
        //pregled pojedinacne slike
        $page_title = "Gallery image";
        $module_view_filename = 'module-gallery-image.php';
        if(!$_id) {
            redirect(FILE_ERROR404);
            break;
        }
        //pronalazak slike u bazi
        $sql = "SELECT * FROM `gallery` WHERE `gallery_id` = {$_id} LIMIT 1 ";
        $result = mysqli_query($_db, $sql);
        $gallery_image = mysqli_fetch_assoc($result);
        if ($result === false || empty($gallery_image) || mysqli_num_rows($result) == 0) {
            $_error[] = 'Image does not exist';
            break;
        }
        //formiranje imena za pretragu
        $gallery_image['image_filename'] = DIR_PUBLIC_GALLERY . $gallery_image['gallery_id'] . '.jpg';
        if (!file_exists($gallery_image['image_filename']))
            $_error[] = 'Image does not exist';
        $page_title = $gallery_image['gallery_title'];
        break;
    case '':
        //pregled galerije
        $page_title = "Gallery";
        $module_view_filename = 'module-gallery-view.php';
        $data = [];
        //izvlacenje podataka iz paze i prikaz
        $sql = "SELECT * FROM `gallery` ORDER BY `gallery_date` DESC ";
        $result = mysqli_query($_db,$sql);
        while ($row = mysqli_fetch_assoc($result))
            if (file_exists(DIR_PUBLIC_GALLERY . $row['gallery_id'] . 't.jpg')) {
                $data[] = $row;
            }
        if (empty($data))
            $_message[] = 'No images at this time';
        break;
    default:
        redirect(FILE_ERROR404);
        break;
}
$_page_output = [
    'page_title' => $page_title != '' ? $page_title : 'Gallery',
    'view' => $module_view_filename != '' ? $module_view_filename : 'module-gallery.php'
];
?>