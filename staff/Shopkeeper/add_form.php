<style type="text/css">
    #dis{
        display:none;
    }
</style>


<div id="dis">
    <?php
    if (isset($errMSG)) {
        ?>
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
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

</div>


<form method='post' action='create.php' enctype='multipart/form-data'>

    <table class='table table-bordered'>

        <tr>
            <td>PRODUCT NAME</td>
            <td><input type='text' name='productName' class='form-control' placeholder='Product Name' required /></td>
        </tr>

        <tr>
            <td>PRODUCT IMAGE</td>
            <td><input class='input-group' type='file' name='user_image' accept='image/*' />
            </td>
        </tr>

        <tr>
            <td>PRODUCT DESCRITPION</td>
            <td><input type='text' name='productDesc' class='form-control' placeholder='Product Description' required></td>
        </tr>

        <tr>
            <td>PRODUCT TYPE</td>
            <td>
                <select name='productType' class='form-control' required>
                    <option  value="">--Select--</option>
                    <option value="computer">Computers</option>
                    <option value="disk">Disks</option>
                    <option value="spare">Spares</option>
                    <option value="website">Websites</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>PRODUCT PRICE</td>
            <td><input type='text' name='productPrice' class='form-control' placeholder='Product Price' required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
                    <span class="glyphicon glyphicon-plus"></span> Save this Record
                </button>  
            </td>
        </tr>

    </table>
</form>

