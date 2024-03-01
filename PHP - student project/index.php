<?php
//inicijalizacija promenljivih
$_error = [];
$_message = [];
$_page_output = [];
$_action = $_GET['action'] ?? '';
$_id = (int)($_GET['id'] ?? '');
$_module_name = $_GET['module'] ?? '';
//definisanje konstanti
const DIR_ROOT = './';
const DIR_PUBLIC = DIR_ROOT . 'public/';
const DIR_PUBLIC_JS = DIR_PUBLIC . 'js/';
const DIR_PUBLIC_CSS = DIR_PUBLIC . 'css/';
const DIR_PUBLIC_IMAGES = DIR_PUBLIC . 'images/';
const DIR_PUBLIC_GALLERY = DIR_PUBLIC_IMAGES . 'gallery/';
const DIR_MODULE = DIR_ROOT . 'module/';
const DIR_VIEW = DIR_ROOT . 'view/';
const FILE_CONFIG = DIR_ROOT . 'config.php';
const FILE_INDEX = DIR_ROOT . 'index.php';
const FILE_ERROR404 = FILE_INDEX . '?module=error404';
const FILE_PROFILE = FILE_INDEX . '?module=profile';
const FILE_LOGIN = FILE_INDEX . '?module=login';
const FILE_SIGNUP = FILE_INDEX . '?module=signup';
const FILE_USERS = FILE_INDEX . '?module=users';
const FILE_UPDATE = FILE_INDEX . '?module=update';
const FILE_NEWS = FILE_INDEX . '?module=news';
const FILE_GALLERY = FILE_INDEX . '?module=gallery';
const USER_ADMIN = 1;
//inkludovanje zajednickih funkcija
include_once (DIR_MODULE . 'functions.php');
//konekcija sa bazom
include(FILE_CONFIG);
$_db = connect_db();
//pokretanje sesije
session_start();
//ocitavanje url parametra module
$module = $_GET['module'] ?? '';
//formiranje imena pre ucitavanja
    $module_name = ($module == '') ? 'home' : $module;
    $module_filename = DIR_MODULE . "module-$module_name.php";
    $module_filename_func = DIR_MODULE . "module-$module_name-func.php";
//proverei da li modul postoji i redirekcija na error404
    if (!file_exists($module_filename)){
        redirect(FILE_ERROR404);
    }
//ucitavanje
    if (file_exists($module_filename_func))
        include_once ($module_filename_func);
    include_once($module_filename);
//formiranje veb stranice
    include_once(DIR_VIEW . "page-header.php");
    include_once(DIR_VIEW . "page-body.php");
    include_once(DIR_VIEW . "page-footer.php");
//zatvaranje konekcije sa bazom
    close_db($_db);
    exit;
?>