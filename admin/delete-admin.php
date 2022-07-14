<?php
     
     include('../config/constants.php');
     //1. get the ID of admin to be deleted
     $id=$_GET['id'];
     //2. CreatenSQL Query to delete admin
     $sql = "DELETE FROM tbl_admin WHERE id=$id";

     //Execute the query
     $res = mysqli_query($conn ,$sql);

     //check query executed successfully or not
     if($res==true){
        //success 
        //echo "Admin Deleted";

        // create session variable to display msg
        $_SESSION['delete'] = "<div class='success'>Admin Delete successfully</div>";
        //redirect to manage admin page
        header("location:".SITEURL.'admin/manage-admin.php');
     }

     else{
        //failed
        //echo "Admin not deleted";
      
        // create session variable to display msg
        $_SESSION['delete'] = "<div class='error'>Failed to delett Admin. Try again later</div>";
        //redirect to manage admin page to display msg
        header('localhost:'.SITEURL.'admin/manage-admin.php');

     }
     //3. Redirect to manage Admin page with msg(success/failure)
     

?>