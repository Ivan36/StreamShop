 <?php 
    // session_start(); 
    require("includes/connection.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("products", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 
  
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<head>
    <link href="../css/client.css" rel="Stylesheet">
    <!-- <link href="../css/bootstrap.min.css" rel="Stylesheet"> -->
    <link href="../css/bootstrap.css" rel="Stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="Stylesheet">
    <script src="../js/jquery-1.11.3.js" type="text/javascript"></script>
    <script src="../js/jquery-1.11.3.min (1).js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/reset.css" /> 
    <link rel="stylesheet" href="css/style.css" /> 
  <link href="../css/responsive.css" rel="Stylesheet">
  <script src="../js/jquery.min.js"></script>
 
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin: 1% 1%;
      margin-bottom: 0;
      border-radius: 5px;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      border-radius: 5px;
    }
  </style>
      
  
    <title>Shopping Cart</title> 
  
  
</head> 
  
<body>
<?php include'cartmenu.php'; ?> 
      
    <div id="container"> 
  
        <div id="main"> 
              
            <?php require($_page.".php"); ?> 
  
        </div><!--end of main--> 
          
        <div id="sidebar"> 
              <h1>Cart</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM products WHERE pID IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY productName ASC"; 
        $query= mysql_query($sql); 
		
        while($row=mysql_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['productName'] ?> x <?php echo $_SESSION['cart'][$row['pID']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="index.php?page=cart">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>
        </div><!--end of sidebar--> 
  
    </div><!--end container--> 
  
</body> 
</html>