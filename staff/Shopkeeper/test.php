<?php
error_reporting(~E_NOTICE);

require_once '../dbconfig.php';

if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM products WHERE pID =:uid');
    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    header("Location: index.php");
}



if (isset($_POST['btn_save_updates'])) {
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productType = $_POST['productType'];
    $productPrice = $_POST['productPrice'];

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if ($imgFile) {
        $upload_dir = '../user_images/'; // upload directory  
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $userpic = rand(1000, 1000000) . "." . $imgExt;
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 5000000) {
                unlink($upload_dir . $edit_row['productImage']);
                move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            } else {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        // if no image selected the old image remain as it is.
        $userpic = $edit_row['productImage']; // old image from database
    }


    // if no error occured, continue ....
    if (!isset($errMSG)) {
        $stmt = $DB_con->prepare('UPDATE products 
          SET productName=:pName, 
          productImage=:pImage, 
          productDesc=:pDesc, 
          productType=:pType, 
          productPrice=:pPrice 
          WHERE pID=:uid');
        $stmt->bindParam(':pName', $productName);
        $stmt->bindParam(':pImage', $userpic);
        $stmt->bindParam(':pDesc', $productDesc);
        $stmt->bindParam(':pType', $productType);
        $stmt->bindParam(':pPrice', $productPrice);
        $stmt->bindParam(':uid', $id);

        if ($stmt->execute()) {
            $successMSG = "Record Successfully Updated ...";
            header("refresh:2;index.php");
        } else {
            $errMSG = "Sorry Data Could Not Updated !";
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
    <div class="col sm-6">
   
        

        <form method="post" enctype="multipart/form-data" class="form-horizontal">


            <?php
            if (isset($errMSG)) {
                ?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                </div>
                <?php
            } else if (isset($successMSG)) {
                ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                </div>
                <?php
            }
            ?>


            <table class="table table-bordered table-responsive">

                <tr>
                    <td><label class="control-label">Product Name.</label></td>
                    <td><input class="form-control" type="text" name="productName" value="<?php echo $productName; ?>" required /></td>
                </tr>
                <tr>
                    <td><label class="control-label">Profile Img.</label></td>
                    <td>
                        <p><img src="../user_images/<?php echo $productImage; ?>" height="150" width="150" /></p>
                        <input class="input-group" type="file" name="user_image" accept="image/*" />
                    </td>
                </tr>
                <tr>
                    <td><label class="control-label">Product Desc.</label></td>
                    <td><input class="form-control" type="text" name="productDesc" value="<?php echo $productDesc; ?>" required /></td>
                </tr>
                <tr>
                    <td><label class="control-label">Product Type.</label></td>
                    <td>
                        <select name='productType' class='form-control' required>
                            <option value="<?php echo $productType; ?>" selected><?php echo $productType; ?></option>
                            <option value="computer">Computers</option>
                            <option value="disk">Disks</option>
                            <option value="spare">Spares</option>
                            <option value="website">Websites</option>                                 <option  value="">--Select--</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label class="control-label">Product Price.</label></td>
                    <td><input class="form-control" type="text" name="productPrice" value="<?php echo $productPrice; ?>" required /></td>
                </tr>



                <tr>
                    <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

                </td>
            </tr>

        </table>

    </form>


    <div class="alert alert-info">
        <strong>link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">&copy Ivan 2018</a>!
    </div>

</div>
</body>
</html>