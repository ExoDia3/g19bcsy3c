<?php
require_once './init/init.php';
include './include/header.inc.php';
$user = loggedInUser();
// print_r('hi' . $user);
include './include/navbar.inc.php';
$available_pages = ['login', 'register', 'logout', 'dashboard'];
$logged_in_pages = ['dashboard'];
$non_logged_in_pages = ['login', 'register'];
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page']; // logout
}
if (in_array($page, $logged_in_pages) && empty($user)) {
 header('Location: ./?page=login');
}
if (in_array($page, $non_logged_in_pages) && !empty($user)) {
    header('Location: ./?page=dashboard');
}
if (in_array($page, $available_pages)) {
    include './pages/' . $page . '.php';
} else {
    // header('Location: ./?page=dashboard');
    header('Location: ./?page=login');
}
include './include/footer.inc.php';