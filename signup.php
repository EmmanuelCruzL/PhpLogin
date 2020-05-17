<?php 
require 'database.php';
 $message ='';
 
 if(!empty($_POST['email']) && !empty($_POST['pwd'])){
 $sql ="INSERT INTO  user(email,pwd) values(:email , :pwd)";
 $stmt =$conn->prepare($sql);
 $stmt->bindParam(':email',$_POST['email']);
 $pwd =password_hash($_POST['pwd'],PASSWORD_BCRYPT);
 $stmt->bindParam(':pwd',$pwd);

 if($stmt ->execute()){

     $message ="Successfully create  new user";
 }else{

     $message = "Sorry there mush have been an issue creating your accout";
 }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'partials/cdn.php' ?>
</head>
<body>
<?php require 'partials/header.php' ?>
<?php  if(!empty($message)):?>
    <p><?=$message ?></p>
<?php endif; ?>
<h1>SignUp</h1>
<span>or <a href="login.php">Login</a></span>

<form action="signup.php" method="post">
     <input type="text" name="email" placeholder="Enter your mail">
     <input type="password" name="pwd" placeholder="Enter your password">
     <input type="password" name="confirm_pwd" placeholder="Confirm your password">
     <input type="submit" value="send">
    </form>

</body>
</html>