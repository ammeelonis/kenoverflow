<?php

include_once('includes/connection.php');

if(isset($_POST['firstname'], $_POST['surname'], $_POST['username'], $_POST['password'])){

  $firstname = $_POST['firstname'];
  $surname = $_POST['surname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  $pass_encrypt = md5($password);

  if($password == $confirm_password){

    if(empty($firstname) or empty($surname) or empty($username) or empty($password)){
      $error = "Tous les champs sont requis!!";
    } else {

      $stmt = $conn->prepare("INSERT INTO users (first_name, surname, user_name, user_password) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $firstname, $surname, $username, $pass_encrypt);
      $stmt->execute();

      //echo "Account created successfully";
      //$_SESSION['logged_in'] = true;
        header('location:login.php');
           }
  } else {
    $error = "Les mots de passe ne correspondent pas!";
  }

  }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hanscom Nouvel administrateur</title>
    <link rel="stylesheet" href="assets/style.css" type="text/css">

  </head>
  <body>

    <div class="container">
      <h3>
        Créer un nouvel administrateur
      </h3>
      <form class="login" action="new_user.php" method="post">

        <input type="text" name="firstname" value=""placeholder="Prénom"><br/>

        <input type="text" name="surname" value="" placeholder="Nom de famille"><br/>

        <input type="text" name="username" value="" placeholder="Username"><br/>

        <label for="password"><small>Saisir mot de passe</small></label><br/>
        <input type="password" name="password" value="" autocomplete="off"><br/>

        <label for="confirm_password"><small>Confirmez le mot de passe</small></label><br/>
        <input type="password" name="confirm_password" value="" autocomplete="off"><?php if(isset($error)){?>
          <small style = "color:#aa0000;"><?php echo $error;?></small>
        <?php } ?><br/><br/>

        <button style="background:#be9c2e; padding:15px;  border:0px;" type="submit" name="createNew"><strong>Créer un administrateur</strong></button>
      </form>

    </div>


  </body>
</html>
