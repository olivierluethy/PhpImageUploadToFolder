<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "babylow");

// Fetch all the image paths from the database
$sql = "SELECT path FROM images";
$result = mysqli_query($conn, $sql);

// Loop through the result and display each image
while ($row = mysqli_fetch_array($result)) {
    $path = $row['path'];
    echo "<img src='$path' style='width:200px;height:200px;margin:10px;'>";
    }
    ?>