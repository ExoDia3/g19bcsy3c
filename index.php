<?php
  include './include/header.inc.php';
  include './include/navbar.inc.php';
  
  $available_pages = ['login', 'register'];
  
  if(isset($_GET['page'])){
    $page = $_GET['page'];
    if(in_array($page, $available_pages)){
      include './pages/'.$page.'.php';
    }
    else{
      echo "<h2>404 Page Not Found</h2>";
    }
  }
  else{
    echo "<h2>404 Page Not Found</h2>";
  }
  include './include/footer.inc.php';

?>
  