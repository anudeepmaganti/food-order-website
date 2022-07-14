<?php include('partials/menu.php'); ?>

    <!-- Main Content Section starts-->
    <div class="main-content">
    <div class="wrapper">
            <h1>Manage Admin</h1>
            <br/> <br/>
            
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying sessiom msg
                    unset($_SESSION['add']); // Removing session msg
                }
           
                 if(isset($_SESSION['delete']))
                 {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                 }

                 if(isset($_SESSION['update']))
                 {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                 }

                 if(isset($_SESSION['user-not-found']))
                 {
                     echo $_SESSION['user-not-found'];
                     unset($_SESSION['user-not-found']);
                 }
            
            ?>

            <br/> <br/> 


            <!--button to add admin-->
            <a href="add-admin.php" class="btn-primary"> Add Admin </a>
            <br/> <br/>


            <table class="tbl-full">
                <tr>
                    <th>S.NO</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>


                <?php
                    // Query to get all admin
                     $sql = "SELECT * FROM tbl_admin";
                     //Execute the query 
                     $res = mysqli_query($conn, $sql);

                     //check whether the query executed or not
                     if($res==true)
                     {
                        //count rows to check whethere we have data in db or not
                        $count = mysqli_num_rows($res); // Function to get all the rows in db
                        
                        //create a variable and assign the value
                        $sn=1;
                        //check the num of rows
                        if($count>0){
                            //we have data in db
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to all data from db
                                // and while loop will run as long as we have data in db

                               //Get individual DAta
                               $id=$rows['id'];
                               $full_name=$rows['full_name'];
                               $username=$rows['username'];

                               //Display the Values in our Table
                               ?>
                               
                               <tr>
                                   <td><?php echo $sn++ ?>. </td>
                                   <td><?php echo $full_name; ?></td>
                                   <td><?php echo $username; ?></td>
                                   <td>
                                       <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary" >Change Password</a>
                                       <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?Php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                       <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?Php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                   </td>
                               </tr>


                               <?php
                            }
                        }
                        else
                        {
                            //we do not have data in db

                        }
                     }
                ?>

                
            </table>

        </div>
    </div>
    <!-- Main Content Section ends-->
    
    <!-- Footer Section starts-->
    <?php include('partials/footer.php'); ?>