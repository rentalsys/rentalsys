<?php
require_once ("db.php");

if (isset($_GET["image_id"])) {
    $imageId = $_GET["image_id"];
}

$sql = "DELETE FROM images_info WHERE image_id='" . $imageId . "'";
mysqli_query($conn, $sql);

header("Location:index.php");
?>