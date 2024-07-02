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
            <h6 class="m-0 font-weight-bold text-primary">Career
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                   Add 
            </button>
            </h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">

            <?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "orenco";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM career";
    $query_run = $conn->query($query);

    if (!$query_run) {
        die("Query failed: " . $conn->error);
    }
    ?>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Images</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($query_run->num_rows > 0) {
                while ($row = $query_run->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['Ca_Id']; ?></td>
                        <td><?php echo $row['Fu_Name']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
                        <td><?php echo $row['image']; ?></td>
                        <td>
                            <form action="register_edit.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['Id']; ?>">
                                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['Id']; ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='8'>No Record Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
</div>



                </div>
            <!-- End of Main Content -->

            


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>