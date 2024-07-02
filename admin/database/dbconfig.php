<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<?php

// Database configuration
$servername = "localhost";        // Use 'localhost' or IP address
$db_username = "root";               // Use 'root' with all lowercase letters
$db_password = ""; // Replace with your actual database password
$dbname = "orenco";                // Replace with the correct database name

$conn = mysqli_connect($servername,$db_username,$db_password,$dbname);
$dbconfig = mysqli_select_db($conn, $dbname);

// Check connection
if ($dbconfig) {
    //echo "Database Connected";
}
else{
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

?>