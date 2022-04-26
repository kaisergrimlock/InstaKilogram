<?php
if(isset($_POST['img_submit'])){
    $img_name = $_FILES['img-upload']['name'];
    $temp_img_name = $_FILES['img-upload']['temp_name'];
    move_uploaded_file($temp_img_name, $img_name);
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="img-upload" id="img-upload">
    <input type="submit" value="submit">
</form>