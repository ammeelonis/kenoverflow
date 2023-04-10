<?php
include_once('cms/includes/connection.php');

if (isset($_GET['id'])){
  //display articles
  $id = $_GET['id'];

  $query = "SELECT * FROM products WHERE id = '$id'";

  $result = mysqli_query($conn, $query);
  $row = $result->fetch_assoc();

  if(!$row){
    echo('Failed to fetch data!') . mysqli_error($conn);
  } else {
    echo "Success!";
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
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.12.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/kenoverflow-144x100.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Product Details</title>
  <link rel="stylesheet" href="assets/material-design/css/material-icons.min.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu1 cid-s2FqTl60XE" once="menu" id="menu1-2b">

    
    

    <nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
                      <div class="container-fluid">
        <div class="navbar-brand">
            <div class="col-lg-auto">
            <span class="navbar-logo">
                <a href="index.php">
                    <img src="assets/images/kenoverflow-144x100.png" alt="Kenoverflow" title="" style="height: 4.5rem;">
                </a>
            </span>
            
        </div>
    </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown">
                    <a class="nav-link link text-black display-4" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="about.php">
                        About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">
                         Products</a><div class="dropdown-menu"><div class="dropdown"><a class="text-black dropdown-item dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">Veterinary Drugs &amp; Vaccines</a><div class="dropdown-menu dropdown-submenu"><a class="text-black dropdown-item display-4" href="watersoluble.php">Water Soluble</a><a class="text-black dropdown-item display-4" href="orals.php" aria-expanded="false">Orals</a><a class="text-black dropdown-item display-4" href="injectables.php" aria-expanded="false">Injectables</a><a class="text-black dropdown-item display-4" href="disinfectant.php" aria-expanded="false">Disinfectant</a></div></div><a class="text-black dropdown-item display-4" href="equipment.php">Veterinary Equipment</a></div>
                </li><li class="nav-item"><a class="nav-link link text-black display-4" href="distributors.php">Distributors</a></li><li class="nav-item"><a class="nav-link link text-black display-4" href="careers.php">
                        Careers</a></li></ul>
           <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary-outline display-4" href="contact.php">
                    Contact Us
                </a></div>
      </div>
    </div></nav>
</section>

<section class="content4 conferencem4_content4 cid-tsGtL3jRdk" id="content4-2h">

	

	

	<div class="container">
		<div class="row wrap">
			<div style="margin-top: 0px;" class="col-lg-4 align-self-start">
				<div class="card__wrap text-white">
					<div class="image">
						<img src="cms/assets/images/<?php echo $row['product_image'];?>" alt="" title="">
					</div>
					
				</div>
			</div>
			<div class="col lg-8">
				<div class="card__content">
					
					<h3 class="mbr-section-title mbr-bold mbr-fonts-style display-7"><?php echo $row['product_name'];?></h3>
					<p class="mbr-text mbr-fonts-style display-4">
					
					<strong>Composition:</strong>
					<br>
<br><?php $out_composition = $row['composition'];
$str = str_replace("............................................................................................................................", ".", $out_composition);
echo $str;?><br></br>

<strong>Description:
</strong><br><?php echo $row['description'];?><br><br>

<strong>Indications:
</strong><br><?php echo $row['indications'];?>
<br><br>

<strong>Contra-indications:
</strong><br><?php echo $row['contra_indications'];?>
<br><br>

<strong>Side effects:
</strong><br><?php echo $row['side_effects'];?>
<br><br>

<strong>Dosage:
</strong><br><?php echo $row['dosage'];?>
<br><br>

<strong>Note:</strong>&nbsp;<?php echo $row['note'];?>
<br><br>

<strong>Withdrawal times:
</strong><br><?php echo $row['withdrawal_times'];?><br>
<br>

<strong>Packaging:
</strong><br><?php echo $row['packing'];?></p>
					<div class="mbr-section-btn"><a class="btn btn-secondary-outline display-4" href="javascript:history.back()"><span class="material material-arrow-back mbr-iconfont mbr-iconfont-btn"></span>Back</a></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="footer1 cid-rRO2bVxeST mbr-parallax-background" id="footer1-23">

    

    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(255, 255, 255);">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 wrap order-0 col-lg-3">
               
                 <img class="logo__image" src="assets/images/kenoverflow-144x100.png" alt="Kenoverflow" title="">
            </div>
            
            <div class="col-md-6 wrap col-lg-3">
                <div class="footer__content">
                    <h4 class="mbr-fonts-style mbr-semibold title__address display-4">Partnership</h4>
                    <p class="work__address mbr-fonts-style display-4">Interested in working with us?<br><strong>mail@kenoverflow.com</strong></p>
                </div>
                <div class="footer__content">
                    <h4 class="mbr-fonts-style mbr-semibold title__address display-4">Phone</h4>
                    <p class="work__address mbr-fonts-style display-4">+2348036321842</p>
                </div>
            </div>
             
            
            
            </div>
            <div class="divider"></div>
            <div class="row align-items-baseline">
                <div class="col-md-6">
                     <p class="privacy mbr-fonts-style align-left display-4"></p>
                </div>
                <div class="col-md-6">
                     <p class="privacy mbr-fonts-style align-right display-4">© 2022 Ken-Overflow Nig. Ltd. - All Rights Reserved</p>
                </div>
            </div>
        </div>
                
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
</body>
</html>