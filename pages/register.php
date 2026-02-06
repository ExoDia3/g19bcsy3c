<?php
$name = '';
$username = '';
$passwd ='';
$nameErr = '';
$usernameErr = '';
$passwdErr = '';
if (isset($_POST['name'], $_POST['username'], $_POST['passwd'], $_POST['confirmPasswd'])) {
  $name = trim($_POST['name']);
  $username = trim($_POST['username']);
  $passwd = trim($_POST['passwd']);
  $confirmPasswd = trim($_POST['confirmPasswd']);
  if (empty($name)) {
    $nameErr = 'Please input name ';
  }
  if (empty($username)) {
    $usernameErr = 'Please input username ';
  }
  if (empty($passwd)) {
    $passwdErr = 'Please input password ';
  }
  if ($passwd !== $confirmPasswd) {
    $passwdErr = 'Password and Confirm Password do not match ';
  }

  if (usernameExists($username)) {
    $usernameErr = 'Username already exists ';
  }
  if (empty($nameErr) && empty($usernameErr) && empty($passwdErr)) {
    if (registerUser($name, $username, $passwd)){
      $name = $username = $passwd = '';
      echo '<div class="alert alert-success" role="alert">
       Registered. Go to <a href="./?page=login">Login</a>
       </div>';
    }
    else{
      echo '<div class="alert alert-danger" role="alert">
       Username exists or Service busy!
      </div>';
    }
  }

}
?>

<form method="post" action="./?page=register" class="col-md-6 col-lg-8 mx-auto">
  <h1>Register</h1>
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" value="<?php echo $name ?>" class="form-control
     <?php echo empty($nameErr) ? '' : 'is-invalid' ?>">
     <div class="invalid-feedback">
      <?php 
        echo $nameErr      
      ?>
     </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="username" class="form-control
     <?php echo empty($usernameErr) ? '' : 'is-invalid' ?> ">
    <div class="invalid-feedback">
      <?php echo $usernameErr ?>
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="passwd" class="form-control
     <?php
        echo empty($passwdErr) ? '' : 'is-invalid'
     ?>">
     <div class="invalid-feedback">
       <?php echo $passwdErr?>
     </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" name="confirmPasswd" class="form-control " >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>