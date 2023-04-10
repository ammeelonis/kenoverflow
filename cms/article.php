<?php
include_once('includes/connection.php');

if (isset($_GET['id'])){
  //display articles
  $id = $_GET['id'];

  $query = "SELECT * FROM articles WHERE article_id = '$id'";

  $result = mysqli_query($conn, $query);
  $row = $result->fetch_assoc();

  if(!$row){
    echo('Failed to fetch data!') . mysqli_error($conn);
  } else {
    echo "successfully done!";
  }
}
/*include('includes/article.php');

$article = new Article;

if (isset($_GET['id'])){
  //display articles
  $id = $_GET['id'];
  $data = $article->fetch_data($id);

  print_r($data);
} else {
  //header('location:index.php');
  exit();
}*/
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hanscom CMS_EN</title>
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <style media="screen">
            q {
        quotes: "“" "”" "‘" "’";
        }
        q::before {
          content: open-quote;
        }
        q::after {
          content: close-quote;
        }
    </style>
  </head>
  <body>
    <nav style="margin-left:420px;">
      <a href="index.php">CMS Home</a> |&nbsp;
      <a href="insert_into.php">Add New Article</a> |&nbsp;
      <a href="update_article.php">Update Article</a> |&nbsp;
      <a href="https://hanscomconsulting.com">Website Home</a> |&nbsp;
      <a href="#">Logout</a>
    </nav>


    <div class="container">
      <h3><a href="" id="logo">
        <?php
        $out_title = $row['article_title'];
        echo $out_title;
        ?>
      </a></h3>
      <img src="assets/images/<?php $out_image = $row['article_image'];
      echo $out_image; ?>" alt="">
      <q>
        <?php
        $out_quote = $row['article_quote'];
        echo $out_quote;
        ?>
      </q>
      <p>
        <?php
        $out_content = $row['article_content'];
        echo $out_content;
        ?>
      </p>



    </div>


  </body>
</html>
