<?php
require_once '../dbconfig.php';
error_reporting( ~E_NOTICE );
	
	if(isset($_POST['btn-save']))
	{
		$productName = $_POST['productName'];
		$productDesc = $_POST['productDesc'];
		$productType = $_POST['productType'];
                $productPrice = $_POST['productPrice'];
				$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		if(empty($productName)){
			$errMSG = "Please Enter productName.";
		}
		if(empty($productType)){
			$errMSG = "Please Enter productName.";
		}
		
		else if(empty($productDesc)){
			$errMSG = "Please Enter Discription.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select An Image File.";
		}
		else
		{
			$upload_dir = '../user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		if(!isset($errMSG)){
			
			$stmt = $DB_con->prepare('INSERT INTO products(productName,productImage,productDesc,productType,productPrice) VALUES(:pName, :pImage, :pDesc, :pType, :pPrice)');
			$stmt->bindParam(':pName', $productName);
			$stmt->bindParam(':pImage', $userpic);
			$stmt->bindParam(':pDesc', $productDesc);
            $stmt->bindParam(':pType', $productType);
            $stmt->bindParam(':pPrice', $productPrice);
		
			
		if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:2;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while addind item....";
			}
		}
	}

?>