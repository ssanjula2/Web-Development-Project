<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<?php include('includes/topbar.php') ?>

<div class="container-fluid">
    <!--DATATABLE EXAMPLE-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class="card-body">

        <?php
        if(isset($_POST['edit_btn']))
        {
             // Database configuration
             $servername = "localhost";        // Use 'localhost' or IP address
             $db_username = "root";               // Use 'root' with all lowercase letters
             $db_password = ""; // Replace with your actual database password
             $dbname = "orenco";                // Replace with the correct database name

             // Create a connection to the database
             $conn = new mysqli($servername, $db_username, $db_password, $dbname);
         
             // Check connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
             
            $id = $_POST['edit_id'];
        
            $query = "SELECT * FROM register WHERE Id='$id' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                <form action="code.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['Id'] ?>">
                <div class="form-group">
                        <lable>UserName</lable>
                        <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <lable>Email</lable>
                        <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <lable>Password</lable>
                        <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Password">
                    </div>
                    <a href="register.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                </form>
            
            <?php
            }
        }
    ?>

        </div>
    </div>
</div> 




</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>