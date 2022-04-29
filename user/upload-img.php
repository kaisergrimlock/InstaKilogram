<?php
if(isset($_POST['submit'])){
	
	$name=$_FILES['upload']['name'];
	$img_name=$_FILES['upload']['tmp_name'];
    $folder='upload/';
	move_uploaded_file($img_name,$folder.$name);
}

?>
<form action='' method='POST' enctype='multipart/form-data'>
<input type='file' name='upload'><br>
<input type='submit' name='submit'>

</form>