<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products 
                WHERE pID={$id}"; 
            $query_s=mysql_query($sql_s); 
            if(mysql_num_rows($query_s)!=0){ 
                $row_s=mysql_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['pID']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['productPrice'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?> 
    <h1>Product List</h1> 
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?> 
    <table> 
        <tr> 
            <th>Name</th> 
			<th>Image</th>
            <th>Description</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products where Active!='NULL' ORDER BY productName ASC"; 
            $query=mysql_query($sql); 
              
            while ($row=mysql_fetch_array($query)) { 
                  
        ?> 
            <tr> 
                <td><?php echo $row['productName'] ?></td> 
				<td><img src="../staff/user_images/<?php echo $row['productImage']; ?>" class="img-rounded" width="50" height="50" /></td>
                <td><?php echo $row['productDesc'] ?></td> 
                <td><?php echo $row['productPrice'] ?> ugx</td> 
                <td><a href="index.php?page=products&action=add&id=<?php echo $row['pID'] ?>">Add to cart</a></td> 
            </tr> 
        <?php 
                  
            } 
          
        ?> 
          
    </table>