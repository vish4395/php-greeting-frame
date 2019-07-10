<?php
require_once('header.php');
 ?>
 <br /><br />
 <div class="col-md-4">
 <?php 
 if(isset($_SESSION['dp']))
 {

 }
 else
 {
	 if(isset($_COOKIE['dp']))
	 {
		 $_SESSION['dp']=$_COOKIE['dp'];
		 $_SESSION['text1']=$_COOKIE['text1'];
		 $_SESSION['text2']=$_COOKIE['text2'];
	 }
   	else
   	{
   		header_remove();
   		header('location:index.php');
   	}
 }
 ?>

<div class="panel panel-default">
  <div class="panel-heading">Your Profile</div>
  <div class="panel-body">
<div class="col-md-8  col-xs-8">
<h3 style="font-size:1.3em"><?php echo $_SESSION['text1'];?></h3>
<p><?php echo $_SESSION['text2'];?></p>
<p><a href="./destroyprofile.php" class="btn btn-warning" title="Logout">Destroy Profile</a></p>
</div>
<div class="col-md-4 col-xs-4"><img src="dp/<?php echo $_SESSION['dp'];?>" alt="" class="img-responsive img-thumbnail " /></div>
  </div>
</div>
<br />
<?php
include('googleadvert.php');
echo '<div class="col-md-6 col-sm-6 text-center text-xs-center hidden-sm">';
include('googleadvert.php');
echo '</div><div class="col-md-6 col-sm-6 text-center text-xs-center hidden-sm">';
include('googleadvert.php');
echo '</div>';
 ?>

<br />

</div>
 <div class="col-md-8">
 <?php
$Cat='';
if(isset($_GET['Cat']))
{
$Cat=$_GET['Cat'];
$dirname = "Greetings/".$Cat."/";
$images = array_merge(glob($dirname."*.png"), glob($dirname."*.jpg"));

}
else
{
	$Cat='*';
	$dirname = "Greetings/";
	$images = array_merge(glob($dirname."*/*.png"), glob($dirname."*/*.jpg"));
}
$foldrs = glob($dirname."*", GLOB_ONLYDIR);
$colors = array("00a300","1e7145","ff0097","9f00a7","603cba","1d1d1d","00aba9","2d89ef","ffc40d","da532c","ee1111","b91d47");
?>
<div class="row">
<div class="col-md-12">
<?php
foreach($foldrs as $foldr) {
	$CategoryName=str_replace($dirname, '',$foldr);
	if($Cat=='*')
	{
		echo '<div class="col-md-6 col-sm-6 text-center text-xs-center"><a class="panel btn btn-block" style="background:#'.$colors[array_rand($colors)].';color:white;font-size:2em;"  href="./greetings.php?Cat='.$CategoryName.'">'.$CategoryName.'</a>
</div>';
	}
	else
	{
		echo '<div class="col-md-6 col-sm-6 text-center text-xs-center"><a class="panel btn btn-block" style="background:#'.$colors[array_rand($colors)].';color:white;font-size:2em;"  href="./greetings.php?Cat='.$Cat.'/'.$CategoryName.'">'.$CategoryName.'</a>
</div>';
	}

}
?>
<?php
echo '<div class="col-md-6 col-sm-6 text-center text-xs-center hidden-sm">';
include('googleadvert.php');
echo '</div>';
 ?>
</div>
</div><br />
<?php
shuffle($images);
//usort($images, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
	if($Cat=='*')
	{
		for($i=0;$i<10;$i++) {
	$image = $images[$i];
	$imgid = str_replace("Greetings/","",$image);
	
	$imgtype = substr($image, strrpos($image, '.') + 1);
		if($imgtype=='jpg')
		{
			$imgid = str_replace(".jpg","",$imgid);
			$imageurl="greetframe.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=dp/".$_SESSION['dp']."&width=400";
			echo '<div class="col-md-6 col-sm-6 text-center text-xs-center">
<a href="generate.php?greeting='.$imgid.'"><img alt="" class="lazy img-responsive img-thumbnail" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
		elseif($imgtype=='png')
		{
			
			$imgid = str_replace(".png","",$imgid);
			if(strpos($imgid,"square")!=null)
			  {
				  $imageurl="greetframesquarepng.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=dp/".$_SESSION['dp']."&width=400";
			  }
			  else
			  {
			$imageurl="greetframepng.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=dp/".$_SESSION['dp']."&width=400";
			  }
			echo '<div class="col-md-6 col-sm-6 text-center text-xs-center">
<a href="generatepng.php?greeting='.$imgid.'"><img alt="" class="lazy img-responsive img-thumbnail" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
	}
	}
	else
	{
		
		foreach($images as $image) {
		$imgid = substr($image, strrpos($image, '/') + 1);
		$imgtype = substr($image, strrpos($image, '.') + 1);
		if($imgtype=='jpg')
		{
			$imgid = str_replace(".jpg","",$imgid);
			$imageurl="greetframe.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=dp/".$_SESSION['dp']."&width=400";
			echo '<div class="col-md-6 col-sm-6 text-center text-xs-center">
<a href="generate.php?greeting='.$Cat.'/'.$imgid.'"><img alt="" class="lazy img-responsive img-thumbnail" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
		elseif($imgtype=='png')
		{
			$imgid = str_replace(".png","",$imgid);
			if(strpos($imgid,"square")!=null)
			  {
				  $imageurl="greetframesquarepng.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=dp/".$_SESSION['dp']."&width=400";
			  }
			  else
			  {
			$imageurl="greetframepng.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=dp/".$_SESSION['dp']."&width=400";
			  }
			echo '<div class="col-md-6 col-sm-6 text-center text-xs-center">
<a href="generatepng.php?greeting='.$Cat.'/'.$imgid.'"><img alt="" class="lazy img-responsive img-thumbnail" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
		}
	}
?>
 
</div>


<?php
require_once('footer.php');
 ?>