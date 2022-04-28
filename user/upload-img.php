<?php
if(isset($_POST['img_submit'])){
	
	$img_name=$_FILES['img_upload']['name'];
	$tmp_img_name=$_FILES['img_upload']['tmp_name'];
    $folder='profile_img/';
	move_uploaded_file($tmp_img_name,$folder.$img_name);
}

?>
<form action='' method='POST' enctype='multipart/form-data'>
<input type='file' name='img_upload'><br>
<input type='submit' name='img_submit'>
</form>