<?php
$username = '';
$passwd = '';
$usernameErr = '';
$passwdErr = '';
if (isset($_POST['username'], $_POST['passwd'])) {
  $username = trim($_POST['username']);
  $passwd = trim($_POST['passwd']);
  if (empty($username)) {
    $usernameErr = 'Please input username ';
  }
  if (empty($passwd)) {
    $passwdErr = 'Please input password';
  }
  if (empty($usernameErr) &&  empty($passwdErr)) {
    $user =  logUserIn($username, $passwd);
    if ($user !== false) {
      $_SESSION['user_id'] = $user->id;
      header('Location: ./?page=dashboard');
    } else {
      echo '<div class = "alert alert-danger" role = "alert">Login Failed</div?';
    }
  }
}

?>

<form method="post" action="./?page=login" class="col-md-6 col-lg-8 mx-auto">
  <h1>Login</h1>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input name="username" value="<?php echo $username ?>" type="text" class="form-control 
      <?php
      echo empty($usernameErr) ? '' : 'is-invalid';
      ?>">
    <div class="invalid-feedback">
      <?php
      echo $usernameErr;
      ?>
    </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input name="passwd" value="<?php echo $passwd ?>" type="password" class="form-control 
    <?php
    echo empty($passwdErr) ? '' : 'is-invalid';
    ?>">
    <div class="invalid-feedback">
      <?php
      echo $passwdErr;
      ?>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>