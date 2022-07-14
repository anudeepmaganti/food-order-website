<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/>
        <br/>

        <?php 
            if(isset($_SESSION['add']))//check whether session is set or not
            {
                echo $_SESSION['add']; //displaying sessiom msg
                unset($_SESSION['add']); // Removing session msg
            }
            ?>

        <form action="" method="POST">

            
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your userame">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                    
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    //Process the value from Form ans save it in data base

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {   //Button clicked
        //1.Get the data from Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);//Password Encripted with MD5
          
    
    //2. sql quary to save the data to data base
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    "; 
   
    //db is conned usinging mysqli_connect() in config/constants

    // 3. EXECUTING QUERY and saving data inti database.
    $res = mysqli_query($conn , $sql) or die(mysqli_error());

    // 4. Check whether the (query is executed) daya is inserted or not display appropriate message
    if($res==TRUE){
        //Data inserted
        //echo "data inserted";
        //Creat a session variavle to display msg
        $_SESSION['add'] = "<div class='success'>Admin Added Sucessfully</div>";
        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    else{
        //echo "failed to insert data";
         //Creat a session variavle to display msg
         $_SESSION['add'] = "<div class='error'>Failed to Admin Added</div>";
         //Redirect page to manage admin
         header("location:".SITEURL.'admin/add-admin.php');
     }

    }
?>