<?php
require_once('header.php');
 ?>
 <div class="fh5co-narrow-content">   
 <?php
$Cat='';

if(isset($_GET['greeting']))
{
$Cat=explode('/',$_GET['greeting'],-1)[0];
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

					<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
						<div class="text-center">
							<?php
								  //greetframesquarejpg
								  if(isset($_GET['greeting']))
								  {
								  	 if(strpos($_GET['greeting'],"square")!=null)
									{
									  $imageurl="greetframesquarepng.php?frame=".$_GET['greeting']."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp']);
									}
									else
									{
										$imageurl="greetframepng.php?frame=".$_GET['greeting']."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp']);
									}

									  
									  
									  echo '<img src="'.$imageurl.'" alt="" class="img-responsive text-center text-xs-center img-thumbnail"/> <br />';
									 
								  }
								  ?>
								  <?php
									if($_SESSION['dp']=='i.pravatar.cc/300')
									{
										?>
									<a href="./destroyprofile.php" class="btn btn-primary btn-block" title="Signup">Add Your Photo &amp; name</a>
										<?php

									}
									else{
									?>
										<a href="./destroyprofile.php" class="btn btn-primary btn-block" title="Logout">Change Your Photo &amp; name</a>
									<?php
										}
									?>
								  <?php  echo '<a href="'.$imageurl.'" download="'.uniqid("bds_").'.jpg" class="btn btn-info btn-block">Download Now</a>';
							?>
							<?php //include('googleadvert.php'); ?>
						</div>
					</div>
					
					<div class="col-md-8 col-md-offset-2 animate-box" data-animate-effect="fadeInLeft">
						
						<div class="col-md-12">

							
						  <div class="sharethis-inline-reaction-buttons"></div>
						  <div class="fb-comments" data-numposts="5"></div>
						  <?php include('googleadvert.php'); ?>
							<h3>You may also like</h3>
							<?php
shuffle($images);
//ksort($images,SORT_LOCALE_STRING );
//usort($images, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
	if($Cat=='*')
	{
		$loopsize=(sizeof($images)>6?6:sizeof($images));
		for($i=0;$i<$loopsize;$i++) {
	$image = $images[$i];
	$imgid = str_replace("Greetings/","",$image);
	
	$imgtype = substr($image, strrpos($image, '.') + 1);
		if($imgtype=='jpg')
		{
			$imgid = str_replace(".jpg","",$imgid);
			if(strpos($imgid,"sqr")!=null)
			  {
				  $imageurl="greetframesquarejpg.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			  else
			  {
			$imageurl="greetframe.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			echo '<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 work-item"><a href="generate.php?greeting='.$imgid.'"><img alt="" class="lazy img-responsive" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
		elseif($imgtype=='png')
		{
			
			$imgid = str_replace(".png","",$imgid);
			if(strpos($imgid,"square")!=null)
			  {
				  $imageurl="greetframesquarepng.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			  else
			  {
			$imageurl="greetframepng.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			echo '<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 work-item">
<a href="generatepng.php?greeting='.$imgid.'"><img alt="" class="lazy img-responsive" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
	}
	}
	else
	{
		
		$loopsize=(sizeof($images)>6?6:sizeof($images));
		for($i=0;$i<$loopsize;$i++) {
		$image = $images[$i];
		$imgid = substr($image, strrpos($image, '/') + 1);
		$imgtype = substr($image, strrpos($image, '.') + 1);
		if($imgtype=='jpg')
		{
			$imgid = str_replace(".jpg","",$imgid);
			$imgid = str_replace(".jpg","",$imgid);
			if(strpos($imgid,"sqr")!=null)
			  {
				  $imageurl="greetframesquarejpg.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			  else
			  {
			$imageurl="greetframe.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			
			echo '<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 work-item">
<a href="generate.php?greeting='.$Cat.'/'.$imgid.'"><img alt="" class="lazy img-responsive" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
		elseif($imgtype=='png')
		{
			$imgid = str_replace(".png","",$imgid);
			if(strpos($imgid,"square")!=null)
			  {
				  $imageurl="greetframesquarepng.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			  else
			  {
			$imageurl="greetframepng.php?frame=".$Cat.'/'.$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			echo '<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 work-item">
<a href="generatepng.php?greeting='.$Cat.'/'.$imgid.'"><img alt="" class="lazy img-responsive" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';
		}
		}
	}
?>
						</div>

					</div>
				</div>

				<div class="row work-pagination animate-box" data-animate-effect="fadeInLeft">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0">

						<div class="col-md-4 col-sm-4 col-xs-4 text-center hidden">
							<a href="#"><i class="icon-long-arrow-left"></i> <span>Previous Project</span></a>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 text-center col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
							<a href="./greetings.php"><i class="icon-th-large"></i></a>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 text-center hidden">
							<a href="#"><span>Next Project</span> <i class="icon-long-arrow-right"></i></a>
						</div>
					</div>
				</div>

			</div>
			 
<?php
require_once('footer.php');
 ?>
			