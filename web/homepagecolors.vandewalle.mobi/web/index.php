<?php

// TODO: refactor into .env file
$servername = "";
$username = "";
$password = "";
$db = "homepagecolors";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$sql = "select * from homepages where fetched = 1 and display = 1 order by (mostSat1 + mostSat2) desc, mostHue1 desc, mostHue2 , type, url";
$result = $conn->query($sql);

$urls = [];
if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
    //     array_push($urls, $row["swaps"]);
    // }
} else {
    echo "0 results";
}
$conn->close();

?>


<html>
    <head>
        <title>Homepage Colors</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat&display=swap" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center my-5">
                    <h1 class="title">Homepage Colors</h1>
                </div>
            </div>

            <div class="row">
                <?
                    while($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-2">
                            <div class="d-flex justify-content-center flex-column p-3" style=";">
                                <div class="img-fluid homepageimage">
                                    <a href="<?= $row["url"] ?>" target="_blank">
                                        <img src="./images/<?= $row["swaps"] ?>" class="rounded"  style="border: solid 1px #494949;">
                                    </a>
                                </div>
                                
                                <h3 class="d-flex justify-content-center mt-2"><?= $row["name"] ?></h3>
                            </div>
                        </div>
                
                <?
                    }
                ?>
            </div>

        </div>




    </body>

</html>








