<?php
session_start();

include_once('includes/connection.php');

 if(isset($_POST['username'], $_POST['password'])){

   $username = $_POST['username'];
   $password = $_POST['password'];

   $pass_encrypt = md5($password);

   if(empty($username) or empty($password)){
     $error = "Tous les champs sont requis!!";
   } else {
     $sql = "SELECT * FROM users WHERE user_name='$username' AND user_password ='$pass_encrypt'";

        if ($result=mysqli_query($conn, $sql))
          {
          // Return the number of rows in result set
          $num = mysqli_num_rows($result);
            if ($num == 1){
              //user is authentic
              $_SESSION['logged_in'] = true;
              header('location:index.php');
            } else {
              //unser not authentic
              $error = "Informations de connexion incorrectes!";
            }
          }
  /*   $query = $conn->prepare("SELECT * FROM users WHERE user_name=? AND user_password =?");
  //   $query->bindValue(1, $username);
  //   $query->bindValue(2, $password);
     $query->bind_param('ss', $username, $password);
     $result = $query->execute();

     $num = mysqli_num_rows($result);
     if ($num == 1){
       //user is authentic
     } else {
       //unser not authentic
       $error = "Incorrect login details!";
     } */
   }

 }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hanscom Login</title>
    <link rel="stylesheet" href="assets/style.css" type="text/css">

  </head>
  <body>

    <div class="container">
      <h3>
        Admin Login
      </h3>
      <form class="login" action="login.php" method="post">

        <input type="text" name="username" value="" placeholder="Username" autocomplete="off"><br/>

        <label for="password"><small>Input Password</small></label><br/>
        <input type="password" name="password" value="" autocomplete="off"><?php if(isset($error)){?>
          <small style = "color:#aa0000;"><?php echo $error;?></small>
        <?php } ?><br/>

        <button style="background:#be9c2e; padding:15px;  border:0px;" type="submit" name="login"><strong>Login</strong></button>
      </form>

    </div>


  </body>
</html>
