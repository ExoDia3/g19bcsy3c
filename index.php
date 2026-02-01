<?php
require_once('./init/init.php');
include './include/header.inc.php';
include './include/navbar.inc.php';

$user = loggedInUser();
$available_pages = ['login', 'register', 'logout'];
$logged_in_pages = ['dashboard'];
$non_logged_in_pages = ['login', 'register'];
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
if (in_array($page, $logged_in_pages) && empty($user)) {
  header('Location: ./pages/?page=login');
}
if (in_array($page, $non_logged_in_pages) && !empty($user)) {
  header('Location: ./?page=dashboard');
}
if (in_array($page, $available_pages)) {
  include './pages/' . $page . '.php';
} else {
  header('Location: ./?page=login');
}
include './include/footer.inc.php';
