<?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
  
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to the products page.</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
			<th>Image</th>
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products WHERE pID IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY productName ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
					
                    while($row=mysql_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['pID']]['quantity']*$row['productPrice']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['productName'] ?></td> 
							<td><img src="../staff/user_images/<?php echo $row['productImage']; ?>" class="img-rounded" width="50" height="50" /></td>
                            <td><input type="text" name="quantity[<?php echo $row['pID'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['pID']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['productPrice'] ?>ugx</td> 
                            <td><?php echo $_SESSION['cart'][$row['pID']]['quantity']*$row['productPrice'] ?>ugx</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?> ugx</td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item set its quantity to 0. </p>