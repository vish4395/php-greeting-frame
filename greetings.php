<?php
require_once('header.php');
 ?>
 <div class="fh5co-narrow-content">   
<div class="row">
 <div class="col-md-12" style="text-align: right;">
 	<?php
 	 greet:
if(@$_SESSION['dp']=='i.pravatar.cc/300')
{
	?>
<a href="./destroyprofile.php" class="btn btn-primary pull-right" title="Signup">Add Your Photo &amp; name</a>
	<?php

}
else{
?>
	<a href="./destroyprofile.php" class="btn btn-primary pull-right" title="Logout">Change Your Photo &amp; name</a>
<?php
}
	?> <?php echo @$_SESSION['text1'];?>
	<br /><br />
 </div>
 <div class="col-md-12 hidden">
 <?php 

 if(isset($_SESSION['dp']))
 {
 
 ?>

<div class="panel panel-default">
  <div class="panel-heading">Your Profile</div>
  <div class="panel-body">
<div class="col-md-8  col-xs-8">
<h3 style="font-size:1.3em"><?php echo $_SESSION['text1'];?></h3>
<p><?php echo $_SESSION['text2'];?></p>
<p>

<?php
if($_SESSION['dp']=='i.pravatar.cc/300')
{
	?>
<a href="./destroyprofile.php" class="btn btn-warning" title="Signup">Add Your Photo &amp; name</a>
	<?php

}
else{
?>
	<a href="./destroyprofile.php" class="btn btn-warning" title="Logout">Change Your Photo &amp; name</a>
<?php
}
	?></p>
</div>
<!-- <div class="col-md-4 col-xs-4"><img src="<?php echo ($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp']);?>" alt="" class="img-responsive img-thumbnail " /></div>
 -->  </div>
</div>
<br />
<?php
include('googleadvert.php');
 ?>

<br />

</div>
 <div class="col-md-12">
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
	$evdimages = array_merge(glob($dirname."Good Day/*.png"), glob($dirname."Good Day/*.jpg"),glob($dirname."Good Morning/*.png"), glob($dirname."Good Morning/*.jpg"),glob($dirname."Good Night/*.png"), glob($dirname."Good Night/*.jpg"),glob($dirname."Love/*.png"), glob($dirname."Love/*.jpg"),glob($dirname."Quotes and Feelings/*.png"), glob($dirname."Quotes and Feelings/*.jpg"));
}
$foldrs = glob($dirname."*", GLOB_ONLYDIR);
$colors = array("00a300","1e7145","ff0097","9f00a7","603cba","1d1d1d","00aba9","2d89ef","ffc40d","da532c","ee1111","b91d47");
?>

<?php if($Cat=='*') 
{
?>
 <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#Categories">Categories</a></li>
    <li class="active"><a data-toggle="tab" href="#Recent">Recommended</a></li>
    <li><a data-toggle="tab" href="#Random">Random</a></li>
    <li><a data-toggle="tab" href="#menu3">Coming soon</a></li>
  </ul>

  <div class="tab-content">
    <div id="Categories" class="tab-pane fade in">
			<div class="row">
			<div class="col-md-12">
				<h2>Brows a category</h2>
			<?php
			foreach($foldrs as $foldr) {
				$CategoryName=str_replace($dirname, '',$foldr);
				if($Cat=='*')
				{
					echo '<div class="col-md-4 col-sm-6 text-center text-xs-center"><a class="panel btn btn-block" style="background:#'.$colors[array_rand($colors)].';color:white;font-size:1.2em;"  href="./greetings/'.str_replace(" ","-", $CategoryName).'">'.$CategoryName.'</a>
			</div>';
				}
				else
				{
					echo '<div class="col-md-4 col-sm-6 text-center text-xs-center"><a class="panel btn btn-block" style="background:#'.$colors[array_rand($colors)].';color:white;font-size:1.2em;"  href="./greetings.php?Cat='.$Cat.'/'.$CategoryName.'">'.$CategoryName.'</a>
			</div>';
				}

			}
			?>

			</div>
			</div>
    </div>

    <div id="Recent" class="tab-pane fade in active">
      <h3>Recomended Cards</h3>
     <div class="row">
<div class="col-md-12">

				<div class="row animate-box" data-animate-effect="fadeInLeft"><!-- 
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="work.html">
							<img src="images/work_1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<h3 class="fh5co-work-title">Work Title Here</h3>
							<p>Illustration, Branding</p>
						</a>
					</div> -->
<?php
//ksort($images,SORT_LOCALE_STRING );
shuffle($evdimages);
//usort($myarray, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
// usort($images, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
// rsort($images);
	if($Cat=='*')
	{
		for($i=0;$i<10;$i++) {
	$image = $evdimages[$i];
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
			/*echo '<div class="col-md-6 col-sm-6 text-center text-xs-center">
<a href="generate.php?greeting='.$imgid.'"><img alt="" class="lazy img-responsive img-thumbnail" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';*/
			echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="generate.php?greeting='.$imgid.'">
							<img data-original="'.$imageurl.'" alt="" class="lazy img-responsive">
						</a>
					</div>';
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
			/*echo '<div class="col-md-6 col-sm-6 text-center text-xs-center">
<a href="generatepng.php?greeting='.$imgid.'"><img alt="" class="lazy img-responsive img-thumbnail" data-original="'.$imageurl.'" width="400" height="185" /></a></div>';*/
			echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
							<a href="generatepng.php?greeting='.$imgid.'">
								<img data-original="'.$imageurl.'" alt="" class="lazy img-responsive">
							</a>
						</div>';
		}

		if($i==rand(0,10)){
			echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">'.
						$i.
						'</div>';
		}

	}
	}
?>

					<div class="clearfix visible-sm-block"></div>
					<div class="clearfix visible-md-block visible-sm-block"></div>
					<div class="clearfix visible-md-block"></div>
					
				</div>
</div>
</div>
    </div>
    <div id="Random" class="tab-pane fade">
      <h3>Random 10</h3>
     <div class="row">
<div class="col-md-12">
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
			if(strpos($imgid,"sqr")!=null)
			  {
				  $imageurl="greetframesquarejpg.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			  else
			  {
			$imageurl="greetframe.php?frame=".$imgid."&text=".$_SESSION['text1']."&text2=".$_SESSION['text2']."&dp=".($_SESSION['dp']=='i.pravatar.cc/300'?$_SESSION['dp'].'?u='.$_SESSION['rand_id']:'dp/'.$_SESSION['dp'])."&width=400";
			  }
			echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="generate.php?greeting='.$imgid.'">
							<img data-original="'.$imageurl.'" alt="" class="lazy img-responsive">
						</a>
					</div>';
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
echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="generatepng.php?greeting='.$imgid.'">
							<img data-original="'.$imageurl.'" alt="" class="lazy img-responsive">
						</a>
					</div>';
		}
	}
	}
?>
</div>
</div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Coming soon</h3>
      <p>More tabs coming soon</p>
    </div>
  </div>
<?php
}
else
{
	echo '<h1>'.$Cat.' Cards</h1>';
	?>
	
<div class="col-md-12">
	
<?php
include('googleadvert.php');
 ?>
</div>
	<div class="col-md-12">
		
	<?php
	foreach($foldrs as $foldr) {
		$CategoryName=str_replace($dirname, '',$foldr);
		if($Cat=='*')
		{
			echo '<div class="col-sm-6 text-center text-xs-center"><a class="panel btn btn-block" style="background:#'.$colors[array_rand($colors)].';color:white;font-size:1.2em;"  href="./greetings/'.str_replace(" ","-", $CategoryName).'">'.$CategoryName.'</a></div>';
		}
		else
		{
			echo '<div class="col-sm-6 text-center text-xs-center"><a class="panel btn btn-block" style="background:#'.$colors[array_rand($colors)].';color:white;font-size:1.2em;"  href="./greetings.php?Cat='.$Cat.'/'.$CategoryName.'">'.$CategoryName.'</a></div>';
		}
	}
	?>
	</div>
	<?php
		
		foreach($images as $image) {
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
			
			echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="generate.php?greeting='.$Cat.'/'.$imgid.'">
							<img data-original="'.$imageurl.'" alt="" class="lazy img-responsive">
						</a>
					</div>';
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
echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="generatepng.php?greeting='.$Cat.'/'.$imgid.'">
							<img data-original="'.$imageurl.'" alt="" class="lazy img-responsive">
						</a>
					</div>';
		}
		}
		?>
			<div class="clearfix"></div>
		<div class="col-md-12">
		<?php

include('googleadvert.php');
$opts = array('http' =>
  array(
    'user_agent' => 'BadhaiDilSeBot/1.0 (http://www.badhaidilse.in/)'
  )
);
$context = stream_context_create($opts);

//$url = 'http://en.wikipedia.org/w/api.php?action=query&titles=India&prop=info&format=json';
$url = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.urlencode($Cat);
$wikidata=@file_get_contents($url, FALSE, $context);
$wikidata_decode=json_decode($wikidata,true);/*
echo '<pre>';
print_r($wikidata_decode);
echo '</pre>';*/
$wikidata_page = @reset($wikidata_decode['query']['pages']);
if($wikidata_page){
	if($wikidata_page['extract']!=''){
	echo '<h2>'.$wikidata_page['title'].'</h2>';
	echo '<p>'.$wikidata_page['extract'].'</p>';
	echo '<p style="text-align:right"><auther> - Wikipedia</p></auther>';
		}
	}
}
?>
</div>
<div class="col-md-12">
	<div class="clearfix"></div>
<?php
include('googleadvert.php');
 ?>
</div>
</div>

 <?php
 }

 else
 {

 	if(isset($_COOKIE['dp']))
	 {
		 $_SESSION['dp']=$_COOKIE['dp'];
		 $_SESSION['text1']=$_COOKIE['text1'];
		 $_SESSION['text2']=$_COOKIE['text2'];
		 $_SESSION['rand_id']=rand(0,1000);

		 goto greet; 
	 }
	 else
	 {
	 	
	 	$_SESSION['dp']='i.pravatar.cc/300';
		 $_SESSION['text1']='Your Name';
		 $_SESSION['text2']='';
		 $_SESSION['rand_id']=rand(0,1000);
		 
		 goto greet;
		
		//header('location:index.php');
	 }
}
 ?>

 </div>
<?php
require_once('footer.php');
 ?>