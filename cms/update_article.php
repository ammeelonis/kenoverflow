<?php
if(session_status() == PHP_SESSION_NONE){
  //session has not started
  session_start();}

  if(!isset($_SESSION['logged_in'])){
    header('Location:login.php');
  }


  $msg = "";

 include_once('includes/connection.php');

  //Establishing Database connection
  $connection = new mysqli($server, $user, $password, $db);
  // If upload button is clicked ...
  if (isset($_POST['edit_article'])) {

    $id = $_POST["article_id"];
    $up_title = $_POST["article_title"];
    $up_quote = $_POST["article_quote"];
    $up_content = nl2br($_POST["article_content"]);

    $up_filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "assets/images/".$up_filename;

    $int_id = (int)$id;
    //echo $int_id . $up_title . $up_quote . $up_content . $up_filename;
    if(empty($id) or empty($up_title) or empty($up_quote) or empty($up_content) or empty($up_filename)){
      $error = "Tous les champs sont requis!!";
    } else {

        // Get all the submitted data from the form
        $update_SQL =$connection->prepare("UPDATE articles_upd SET article_title=?, article_quote=?, article_content=?, article_image=? WHERE article_id=?");

          $update_SQL->bind_param('sssss', $up_title, $up_quote, $up_content, $up_filename, $int_id);
          $update_SQL->execute();

   //mysql_select_db(‘PRODUCTS’);
  /*$retval = mysqli_query( $connection, $update_SQL);

            if(!$retval)
                {
                die('Could not update data: ' . mysqli_error($connection));
                }*/
            //echo "Article successfully updated...";
            header("location:index.php");
            exit();
    }
  }
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hanscom</title>
    <link rel="stylesheet" href="assets/style.css" type="text/css">
  </head>
  <body>

    <div class="container_insert">
      <?php include('includes/navigation.php');?>
      <h3><a href="" id="logo">Modifier l'article</a></h3>

      <form action="#" method="post" enctype="multipart/form-data">

          <label for="article_id">ID de l'article</label><br/>
          <input id="article_id" type="text" name="article_id" value="" placeholder="Insérer l'ID d'article"><br/><br/>

          <label for="article_title">Le titre de l'article</label><br/>
          <input type="text" name="article_title" placeholder="Insérer un titre"><br/><br/>
          <label for="article_quote">Citation d'article</label><br/>
          <textarea name="article_quote" rows="4" cols="65" placeholder="Insérer une citation d'article"></textarea><br/><br/>


          <label for="article_content">Nouveau contenu</label><br/>
          <textarea name="article_content" rows="8" cols="65" placeholder="Insérer le texte de l'article"></textarea><br/><br/>

          <label for="uploadfile">Télécharger l'image de l'article</label><br/>
          <input type="file" name="uploadfile" accept="image/*"/><br/><br/>
          <?php if(isset($error)){?>
            <small style = "color:#aa0000;"><?php echo $error;?></small>
          <?php } ?><br/>

          <button style="background:#be9c2e; border:0px; padding:10px;" type="submit" name="edit_article"><strong>MISE À JOUR DE L'ARTICLE</strong></button>

      </form>
    </div>


  </body>
</html>
