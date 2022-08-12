<?php
require_once ("db.php");
$sql = "SELECT * FROM images_info ORDER BY image_id DESC";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
<title>Lista de imagens</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<body>
    <form name="frmImage" method="post" action="">
        <div>
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <div class="btn-menu" align="right"
                style="padding-bottom: 5px;">
                <a href="image-add.php" class="link">Add Imagem</a>
            </div>
            <table border="0" cellpadding="10" cellspacing="1"
                width="100%" class="tblListForm">
                <tr class="listheader">
                    <td>Diretório</td>
                    <td>Criado</td>
                    <td>Ações</td>
                </tr>
<?php
$i = 0;
while ($row = mysqli_fetch_array($result)) {
    ?>
<tr class="row">
                    <td><?php echo $row["image_path"]; ?></td>
                    <td width="25%"><?php echo date("d-m-Y", strtotime($row["date"])); ?></td>
                    <td width="20%"><a
                        href="image-edit.php?image_id=<?php echo $row["image_id"]; ?>"
                        class="link"><img alt='Edit' title='Edit'
                            src='icons/edit.png' class="action-icon" /></a>
                        <a
                        href="image-delete.php?image_id=<?php echo $row["image_id"]; ?>"
                        class="link"><img alt='Delete' title='Delete'
                            src='icons/delete.png' class="action-icon" /></a></td>
                </tr>
<?php
    $i ++;
}
?>
</table>
    
    </form>
    </div>
</body>
</html>