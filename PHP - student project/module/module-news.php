<?php
//sprecavanje pristupa ako nije admin
if (!is_admin() && !in_array($_action, ['', 'view']))
	redirect(FILE_ERROR404);
//ruter vesti
switch ($_action) {
	case 'submit':
		//dodavanje nove vesti
		$page_title = "Add article";
		$module_view_filename = 'module-news-submit.php';
		if ($_POST) {
			$news_date = date('Y-m-d H:i:s');
			//unos podataka u bazu
			$sql = "INSERT INTO `news` 
    				(`news_title`, `news_short`, `news_description`, `news_date`)
					VALUES 
					('{$_POST['title']}', '{$_POST['short']}', '{$_POST['description']}', '$news_date') ";
			$result = mysqli_query($_db, $sql);
			$article_title = $_POST['title'];
			$article_short = $_POST['short'];
			$article_description = $_POST['description'];
			if ($result === false)
				$_error[] = 'Failed to add the article';
			else
				$_message [] = 'New article added successfully';
		}
		break;
	case 'edit' :
		//editovanje vesti
		if ($_POST) {
			$news_date = date('Y-m-d H:i:s');
			//odabir trazene vesti iz baze
			$sql = "UPDATE `news` SET 
                  	`news_title` = '{$_POST['title']}',
                 	`news_short` = '{$_POST['short']}',
                 	`news_description` = '{$_POST['description']}' 
                 	WHERE `news_id` = {$_id} LIMIT 1";
			$result = mysqli_query($_db, $sql);
			$article_title = $_POST['title'];
			$article_short = $_POST['short'];
			$article_description = $_POST['description'];
			if ($result === false)
				$_error[] = 'Failed to edit the article';
			else
				$_message [] = 'Article edited successfully';
		}
		$page_title = "Edit article";
		$module_view_filename = 'module-news-submit.php';
		//dodavanje editovanih podataka u bazu
		$article = [];
		$sql = "SELECT * FROM `news` WHERE `news_id` = $_id LIMIT 1";
		$result = mysqli_query($_db, $sql);
		$article = mysqli_fetch_assoc($result);
		if (empty($article)) {
			$_error[] = 'Article that you are trying to edit does not exist';
			break;
		}
		$article_title = $article['news_title'];
		$article_short = $article['news_short'];
		$article_description = $article['news_description'];
		break;
	case 'delete' :
		//brisanje vesti
		$sql = "DELETE FROM `news` WHERE `news_id` = $_id LIMIT 1";
		mysqli_query($_db, $sql);
		redirect(FILE_NEWS);
		break;
	case 'view':
		//pregled pojedinacne vesti
		$page_title = "News article";
		$module_view_filename = 'module-news-article.php';
		if(!$_id) {
			redirect(FILE_ERROR404);
			break;
		}
		//odabir trazene vesti iz baze
		$sql = "SELECT * FROM `news` WHERE `news_id` = {$_id} LIMIT 1 ";
		$result = mysqli_query($_db, $sql);
		$news_article = mysqli_fetch_assoc($result);
		if ($result === false || empty($news_article) || mysqli_num_rows($result) == 0) {
			$_error[] = 'Article does not exist';
			break;
		}
		$page_title = $news_article['news_title'];
		$news_article['news_description'] = preg_replace("#[\r\n]+#", '<br>', $news_article['news_description']);
		break;
	case '':
		//pregled svih vesti
		$page_title = "News";
		$module_view_filename = 'module-news-view.php';
		$data = [];
		$sql = "SELECT * FROM `news` ORDER BY `news_date` DESC ";
		$result = mysqli_query($_db,$sql);
		while ($row = mysqli_fetch_assoc($result))
			$data[] = $row;
		if (empty($data))
			$_message[] = 'No articles at this time';
		break;
	default:
		redirect(FILE_ERROR404);
		break;
}
$_page_output = [
	'page_title' => $page_title != '' ? $page_title : 'News',
	'view' => $module_view_filename != '' ? $module_view_filename : 'module-news.php'
];
?>
