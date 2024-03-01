<!--prikaz gornjeg dela stranice sa navigacijom-->
<!DOCTYPE>
<html>
<head>
    <meta charset="utf8">
    <title><?= $_page_output['page_title'] ?> | News org.</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?= DIR_PUBLIC_JS ?>app.js"></script>
    <link rel="stylesheet" href="<?= DIR_PUBLIC_CSS ?>style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <header-logo>
        <img src="<?= DIR_PUBLIC_IMAGES ?>logo-news.png" alt="Logo">
    </header-logo>
    <header-login>
        <a href="<?= FILE_PROFILE?>"
        <?php if ($_module_name == 'profile'): ?>
            style="color: rgb(157, 215, 207)"
        <?php endif; ?>
        >Profile</a>
    </header-login>
</header>
<nav>
    <nav-elements>
        <a href="<?= FILE_INDEX ?>"
        <?php if ($_module_name == 'home'): ?>
            style="color: #dcb5ff"
        <?php endif; ?>
        >Home</a>
        <a href="<?= FILE_INDEX ?>?module=news"
        <?php if ($_module_name == 'news'): ?>
            style="color: #dcb5ff"
        <?php endif; ?>
        >News</a>
        <a href="<?= FILE_INDEX ?>?module=gallery"
        <?php if ($_module_name == 'gallery'): ?>
            style="color: #dcb5ff"
        <?php endif; ?>
        >Gallery</a>
        <a href="<?= FILE_INDEX ?>?module=contact"
        <?php if ($_module_name == 'contact'): ?>
            style="color: #dcb5ff"
        <?php endif; ?>
        >Contact</a>
    </nav-elements>
</nav>