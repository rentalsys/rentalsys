<?php
require_once ("db.php");
$imagePath = "";

if (! empty($_FILES)) {
    
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "uploads/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    
    $targetFile = $targetPath . $_FILES['file']['name'];
    
    $selectQuery = "select image_path from images_info where image_id='" . $_GET["image_id"] . "'";
    
    $resultSelectQuery = mysqli_query($conn, $selectQuery);
    $image = mysqli_fetch_array($resultSelectQuery, MYSQLI_ASSOC);
    
    if (move_uploaded_file($tempFile, $targetFile)) {
        
        // -----For updating the folder we need to delete the old file -----------------
        if (! unlink($image[image_path])) {
            echo ("Error deleting $image");
        } else {
            echo ("Deleted $image");
        }
    } else {
        echo "false";
    }
}

if (! empty($_GET["action"]) && $_GET["action"] == "save") {
    $sql = "UPDATE images_info SET image_path ='" . $imagePath . "' WHERE image_id ='" . $_GET["image_id"] . "'";
    mysqli_query($conn, $sql);
    $message = "Record Modified Successfully";
}

$select_query = "SELECT * FROM images_info WHERE image_id='" . $_GET["image_id"] . "'";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
?>
<html>

<head>
<title>Edit Image</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />

<link rel="stylesheet" type="text/css" href="dropzone/dropzone.css" />
<script type="text/javascript" src="dropzone/dropzone.js"></script>
</head>

<body>

    <div class="box-preview">
        <img src="<?php echo $row["image_path"]; ?>" />
        <div class="preview-footer"><?php echo $row["image_path"]; ?></div>
    </div>

    <form name="frmImage"
        action="image-edit.php?action=save&image_id=<?php echo $_GET['image_id']?>"
        class="dropzone"></form>
    <div class="btn-menu">
        <a href="index.php" class="link">Back to List</a>
    </div>
</body>
</html>