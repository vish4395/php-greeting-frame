<?php
$dirname = "../Greetings/";
$Cat='*';
$text1='Your Name';
$text2='Your Info';
$dp='dp/default.png';

$foldrs = glob($dirname."*", GLOB_ONLYDIR);
$data = array();
$Categories = array();
foreach($foldrs as $key => $foldr) {
	$CategoryName=str_replace($dirname, '',$foldr);
	$Categories[$key]['name']=$CategoryName;
	$Categories[$key]['bds-url']='http://badhaidilse.in/greetingframes/greetings.php?Cat='.$CategoryName;
	
	$subdirname = "../Greetings/".$CategoryName."/";
	$sub_folders = glob($subdirname."*", GLOB_ONLYDIR);
	foreach($sub_folders as $skey => $sfoldr) {
		$Categories[$key]['sub-categories'][$skey]=str_replace($subdirname, '',$sfoldr);
		}
	$CategoryThumbs = array_merge(glob($subdirname."*.png"), glob($subdirname."*.jpg"));
	shuffle($CategoryThumbs);
	$CategoryThumb = $CategoryThumbs[0];
		if($Cat=='*')
	{
	$image = $CategoryThumbs[0];
	$imgid = str_replace("../Greetings/","",$image);
	
	$imgtype = substr($image, strrpos($image, '.') + 1);
		if($imgtype=='jpg')
		{
			$imgid = str_replace(".jpg","",$imgid);
			if(strpos($imgid,"sqr")!=null)
			  {
				  $imageurl="greetframesquarejpg.php?frame=".$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
			  else
			  {
			$imageurl="greetframe.php?frame=".$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
		}
		elseif($imgtype=='png')
		{
			
			$imgid = str_replace(".png","",$imgid);
			if(strpos($imgid,"square")!=null)
			  {
				  $imageurl="greetframesquarepng.php?frame=".$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
			  else
			  {
			$imageurl="greetframepng.php?frame=".$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
		}
	}
	else
	{
		
		$imgid = substr($image, strrpos($image, '/') + 1);
		$imgtype = substr($image, strrpos($image, '.') + 1);
		if($imgtype=='jpg')
		{
			$imgid = str_replace(".jpg","",$imgid);
			$imgid = str_replace(".jpg","",$imgid);
			if(strpos($imgid,"sqr")!=null)
			  {
				  $imageurl="greetframesquarejpg.php?frame=".$Cat.'/'.$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
			  else
			  {
			$imageurl="greetframe.php?frame=".$Cat.'/'.$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
			
		}
		elseif($imgtype=='png')
		{
			$imgid = str_replace(".png","",$imgid);
			if(strpos($imgid,"square")!=null)
			  {
				  $imageurl="greetframesquarepng.php?frame=".$Cat.'/'.$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
			  else
			  {
			$imageurl="greetframepng.php?frame=".$Cat.'/'.$imgid."&text=".$text1."&text2=".$text2."&dp=".$dp."&width=400";
			  }
			
		}
	}

	$Categories[$key]['thmub_image'] = "http://badhaidilse.in/greetingframes/".$imageurl;

	}
$data['Categories'] = $Categories;

echo json_encode($data);

?>