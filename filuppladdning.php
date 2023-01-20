 

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbserverprogrammering";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$anvandernamn = $_SESSION["name"];

echo $anvandernamn . " laddade upp en fil! <br> <br>";

echo "Följade filuppladdningar finns i filen: <br> <br>";

    $fname = $_POST["fileToupload"];

    $file = fopen("uppladdningar.txt", "a");
    fwrite($file, "$anvandernamn => $fname <br>");
    fclose($file);

   $file = fopen("uppladdningar.txt", "r");
   echo fread($file, filesize("uppladdningar.txt"));
   fclose($file);

   $sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig) VALUES ('$fname', '" . $anvandernamn . "', NOW(), FALSE)";
   $result = $conn->query($sql);

   if($anvandernamn == "holros") {
    $sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig)
    VALUES ('$fname', '" . $anvandernamn . "', NOW(), TRUE)";
    $conn->query($sql);
  }


?>