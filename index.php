<?php
  include './init/db.init.php';
  include './include/header.inc.php';
  include './include/navbar.inc.php';
  
  $available_pages = ['login', 'register'];
  
  if(isset($_GET['page'])){
    $page = $_GET['page'];
    if(in_array($page, $available_pages)){
      include './pages/'.$page.'.php';
    }
    else{
      include './pages/error404.php';
    }
  }
  else{
    include './pages/dashboard.php';
  }
  include './include/footer.inc.php';

?>
  