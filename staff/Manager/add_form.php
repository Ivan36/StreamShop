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


<body>
    <div class="b-container">
        <div class="row">
<div class="col-sm-2"></div>
            <div class="col-sm-10" style="padding-bottom:10px;">
                <?php
                include'../config.php';
                $query = "SELECT * FROM users ORDER BY uID";
                $query_result = mysqli_query($conn, $query);
                ?>
                <div class='panel panel-success'>
                    <div class='panel-body'>
                        <div class="row">
                            <h2 style="color:#6495ED; font-family: Georgia, Times New Roman, serif;">REGISTER NEW MEMBER</h2>
                            <hr>
                        </div>
                        <div class="row ">
                            <form method="POST" action="m_process.php" name="registration_form" id="registration_form">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label style="color:green;">FIRST NAME:</label>
                                        <input type="text" name ="fName" id="fName" class="form-control" placeholder="first name" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label style="color:green;" >LAST NAME:</label>
                                        <input type="text" name ="lName" id="lName" class="form-control" placeholder="last name" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label style="color:green;">GENDER:</label>
                                        <select name="gender" class="form-control" id="gender" required>
                                            <option>male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label style="color:green;">EMAIL:</label>
                                        <input type="text" name ="emailAddress" id="emailAddress" class="form-control" placeholder="name@domain.com" required/>   
                                    </div>
                                    <div class="col-sm-4">
                                        <label style="color:green;">TYPE:</label>
                                        <select name="type" class="form-control" id="type" required>
                                            <option>client</option>
                                            <option>manager</option>
                                            <option>shopkeeper</option>
                                            <option>admin</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label style="color:green;">USERNAME:</label>
                                        <input type="text" name ="uName"id="uName" class="form-control" placeholder="prefered username" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label style="color:green;">PASSWORD:</label>
                                        <input type="password" name ="password" id="password" class="form-control" placeholder="**************" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label style="color:green;">CONFIRM-PASSWORD:</label>
                                        <input type="password" name ="confirmPassword" id="confirmPassword" class="form-control" placeholder="**************" required/>
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" value="REGISTER MEMBER" class="btn btn-primary btn-sm m_buttons" name="registerMember"/>
                            </form>
                        </div>
                    </div>
                </div>            
            </div>
        </div>

    </div>
</body>
