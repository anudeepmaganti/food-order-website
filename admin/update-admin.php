<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php
            //get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Creat SQL Query to get the details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //execute the Query
            $res = mysqli_query($conn,$sql);

            //check whether query executed or not
            if($res==true)
            {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                  // get the details
                  //echo "Admin Available";
                  $row=mysqli_fetch_assoc($res);

                  $full_name=$row['full_name'];
                  $username=$row['username'];
                }
                else
                {
                   //redirect to manage admin
                   header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">

            
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                <td colspan="2">
                        <input type="hidden" name ="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php
    //check whether submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "button clicked";
        //get all the value from the form to update
        $id = $_POST['id'];
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];


        //Create a SQL Query to Update Admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    
    }
?>



<?php include('partials/footer.php'); ?>
