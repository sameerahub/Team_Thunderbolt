<?php include('reusable_part/menu.php'); ?>
<?php include('../dbcon.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h3>Update user</h3>
        <br><br>

        <?php
        //get the id of selected admin
        $id = $_GET['id'];

        //create sql query to get the details from selected admin
        $sql = "SELECT *FROM users WHERE user_id=$id";

        //Execute query
        $res = mysqli_query($conn, $sql);


        //check wheter query executed  or not
        if ($res == true) {

            //check whether the data is available or not
            $count = mysqli_num_rows($res);

            //check whether we have admin data or not
            if ($count == 1) {

                //get the details
                // echo "  Admin Available<br><br>";
                $row = mysqli_fetch_assoc($res);

                
                $username = $row['username'];
            } else {

                //we will direct manage admin page
                header("location:" . SITEURL . 'admin/manage-user.php');
            }
        }

        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>UserName :</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn-secondary" value="Update admin">
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>

<?php
//check whether submit btn click or not
if (isset($_POST['submit'])) {
    // echo "btn clicked";
    //get all the value from the form

    $id = $_POST['id'];
    
    $username = $_POST['username'];

    //create sql query to update admin
    $sql = "UPDATE users SET  
        
           username= '$username'
           WHERE user_id=$id
    ";

    //execute query
    $res = mysqli_query($conn, $sql);

    //check whether query executed or not

    if ($res == true) {

        //query executed
        $_SESSION['update'] = "<div class='success' >Admin Updated Successfully</div>";

        //Redirect to manage admin page
        header("location:" . SITEURL . 'admin/manage-user.php');
    } else {

        //fail to update
        $_SESSION['update'] = "<div class='success' >Admin Updated UnSuccessfully</div>";

        //Redirect to manage admin page
        header("location:" . SITEURL . 'admin/manage-user.php');
    }
} else {
}


?>

<?php include('reusable_part/footer.php'); ?>