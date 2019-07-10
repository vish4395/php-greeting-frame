<?php
session_start();
// print_r($_POST);
$_session['msg']='';
if(isset($_POST['next']) && isset($_FILES['file_dp']) && isset($_POST['name']))
{
	$target_dir = "dp/";
	$target_file = $target_dir.preg_replace("/[^A-Za-z0-9]/", '_', $_POST['name']).'-'.basename($_FILES["file_dp"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file_dp"]["tmp_name"]);
    if($check !== false) {
        $_session['msg'] .= "File is an image - " . $check["mime"] . ". <br />";
        $uploadOk = 1;
    } else {
        $_session['msg'] .= "File is not an image. <br />";
        $uploadOk = 0;
    }
	if ($uploadOk == 0) {
    $_session['msg'] .= "Sorry, your file was not uploaded.";
	header('location:index.php');
	}
	// if everything is ok, try to upload file
 else {
    if (move_uploaded_file($_FILES["file_dp"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["file_dp"]["name"]). " has been uploaded.";
		$_SESSION['dp']= str_replace($target_dir, "", $target_file);
		$_SESSION['text1']=htmlspecialchars($_POST['name']);
		$_SESSION['text2']=htmlspecialchars($_POST['oth_info']);
		setcookie('dp', $_SESSION['dp'], time() + (86400 * 30), "/");
		setcookie('text1', $_SESSION['text1'], time() + (86400 * 30), "/");
		setcookie('text2', $_SESSION['text2'], time() + (86400 * 30), "/");
		if($_SESSION['sess_ref']){
				header('location:'.$_SESSION['sess_ref']);
			}
		else{
				header('location:greetings.php');
			}

    }
	else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}
else
{
	echo "error";
}


// print_r($_SESSION);
?>