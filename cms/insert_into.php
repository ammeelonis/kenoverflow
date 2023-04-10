<?php
/*if(session_status() == PHP_SESSION_NONE){
  //session has not started
  session_start();}

  if(!isset($_SESSION['logged_in'])){
    header('Location:login.php');
  }
*/
  $msg = "";

  //Establishing Database connection
  include_once('includes/connection.php');
  
  // If upload button is clicked ...
  if (isset($_POST['addProduct'])) {

    $product_name = $_POST["product_name"];
	$category = $_POST["product_category"];    
    $description = nl2br($_POST["description"]);	
    $composition = nl2br($_POST["composition"]);	
    $indications = nl2br($_POST["indications"]);	
    $contra_indications = nl2br($_POST["contra_indications"]);
	$side_effects = nl2br($_POST["side_effects"]);	
    $dosage = nl2br($_POST["dosage"]);	
    $note = nl2br($_POST["note"]);	
    $withdrawal_times = nl2br($_POST["withdrawal_times"]);
	$packing = nl2br($_POST["packing"]);	
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "assets/images/".$filename;


        if(empty($product_name) or empty($category) or empty($description) or empty($filename)){
          $error = "Please Fill vacant fields";
        } else {

    //echo $title . $quote . $content . $filename;

    $stmt = $conn->prepare("INSERT INTO products (category, product_name, product_image, composition, description, indications, contra_indications, side_effects, dosage, note, withdrawal_times, packing) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $category, $product_name, $filename, $composition, $description, $indications, $contra_indications, $side_effects, $dosage, $note, $withdrawal_times, $packing);
    $stmt->execute();


        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      
      header("location:index.php");
      //echo "Article successfully added...";
      exit();
  }

}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ken Overflow</title>
    <link rel="stylesheet" href="assets/style.css" type="text/css">
  </head>
  <body>

    <div class="container_insert">
      <?php include('includes/navigation.php');?>
      <h3><a href="" id="logo">Add New Product</a></h3>

      <form action="insert_into.php" method="post" enctype="multipart/form-data">

          <label for="product_name">Product Name</label><br/>
          <input type="text" name="product_name" placeholder="Insert Product Name"><br/><br/>
		  
		  <label for="product_category">Product Category</label><br/>
          <select name="product_category">
		  <option value="">--Select One--</option>
			<option value="water_soluble">Water Soluble</option>
			<option value="oral">Oral</option>
			<option value="injectable">Injectable</option>
			<option value="vet_equipment">Veterinary Equipment</option>
			<option value="disinfectant">Disinfectant</option>
		  </select>
		  
          <label for="description">Product Description</label><br/>
          <textarea name="description" rows="4" cols="65" placeholder="Insert Product Description"></textarea><br/><br/>

          <label for="composition">Composition</label><br/>
          <textarea name="composition" rows="4" cols="65" placeholder="Composition"></textarea><br/><br/>
		  
		  <label for="indications">Indications</label><br/>
          <textarea name="indications" rows="4" cols="65" placeholder="Indications"></textarea><br/><br/>

          <label for="contra_indications">Contra-indications</label><br/>
          <textarea name="contra_indications" rows="4" cols="65" placeholder="Contra-indications"></textarea><br/><br/>

		  <label for="side_effects">Side-effects</label><br/>
          <textarea name="side_effects" rows="4" cols="65" placeholder="Side-effects"></textarea><br/><br/>

          <label for="dosage">Dosage</label><br/>
          <textarea name="dosage" rows="4" cols="65" placeholder="Dosage"></textarea><br/><br/>

		  <label for="note">Note</label><br/>
          <textarea name="note" rows="4" cols="65" placeholder="Note"></textarea><br/><br/>

          <label for="withdrawal_times">Withdrawal Times</label><br/>
          <textarea name="withdrawal_times" rows="4" cols="65" placeholder="Withdrawal Times"></textarea><br/><br/>

		  <label for="packing">Packing</label><br/>
          <textarea name="packing" rows="4" cols="65" placeholder="Packing"></textarea><br/><br/>


          <label for="uploadfile">Upload Product Image</label><br/>
          <input type="file" name="uploadfile" accept="image/*"/><br/><br/>
			  <?php if(isset($error)){?>
				<small style = "color:#aa0000;"><?php echo $error;?></small>
			  <?php } ?><br/>

          <button style="background:#be9c2e; border:0px; padding:10px;" type="submit" name="addProduct"><strong>Add Product</strong></button>

      </form>
    </div>


  </body>
</html>
