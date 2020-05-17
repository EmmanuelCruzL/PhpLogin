<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: /phpLogin');
}
require "database.php";


if(!empty($_POST['email']) && !empty($_POST['pwd'])){
  $records =$conn ->prepare("SELECT id,email,pwd FROM user WHERE email=:email ");
  $records->bindParam(':email',$_POST['email']);
  $records->execute();
  $result =$records->fetch(PDO::FETCH_ASSOC);
   
  if(count($result)>0 && password_verify($_POST['pwd'],$result['pwd'])){
   $_SESSION['user_id'] = $result['id'];
   header('Location: /phpLogin');
   
  }else{
      $message ="Sorry,Those credentials do not match";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require 'partials/cdn.php' ?>
</head>
<body>
<?php require 'partials/header.php' ?>
    <h1>Login</h1> 
    <span>or <a href="signup.php">SignUp</a></span>
    <form action="login.php" method="post">
        <?php if(!empty($message)): ?>
         <?= $message ?>
        <?php endif; ?>    
     <input type="text" name="email" placeholder="Enter your mail">
     <input type="password" name="pwd" placeholder="Enter your password">
     <input type="submit" value="Send">
    </form>
</body>
</html>