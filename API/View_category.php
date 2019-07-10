<?php
$dirname = "../Greetings/";
$Cat='*';
$text1='Your Name';
$text2='Your Info';
$dp='dp/default.png';

if(isset($_GET['category_name']))
{
	$Cat=$_GET['category_name'];
	$dirname = "../Greetings/".$Cat.'/';

}
else
{
	$Cat='*';
	$dirname = "../Greetings/";
}

$foldrs = glob($dirname."*", GLOB_ONLYDIR);
$data = array();
$Categories = array();
$cards = array();
$CardThumbs = array_merge(glob($dirname."*.png"), glob($dirname."*.jpg"));

foreach($foldrs as $key => $foldr) {
	$CategoryName=str_replace($dirname, '',$foldr);
	$Categories[$key]['name']=$CategoryName;
	$Categories[$key]['bds-url']='http://badhaidilse.in/greetingframes/greetings.php?Cat='.$CategoryName;
	$Cat=$CategoryName;
	$subdirname = $dirname.$CategoryName."/";
	$sub_folders = glob($subdirname."*", GLOB_ONLYDIR);
	foreach($sub_folders as $skey => $sfoldr) {
		$Categories[$key]['sub-categories'][$skey]=str_replace($subdirname, '',$sfoldr);
		}
	$CategoryThumbs = array_merge(glob($subdirname."*.png"), glob($subdirname."*.jpg"));

	shuffle($CategoryThumbs);
	$CategoryThumb[0] = $CategoryThumbs[0];
	$cards[$key]['thmub_image'] = Image_explorer($CategoryThumb,$Cat,$text1,$text2,$dp);
	$Categories[$key]['thmub_image'] = $cards[$key]['thmub_image'][0];
	//$Categories[$key]['thmub_images'] = $Categories[$key]['thmub_image'];

	}
$data['Cards'] = $cards;
$data['Sub-Categories'] = $Categories;

echo json_encode($data);

function Image_explorer($image_array,$Cat,$text1,$text2,$dp)
{
		if($Cat=='*')
	{
		$images = $image_array;
		foreach($images as $image) {
	
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
	}
	else
	{
		$images = $image_array;
		foreach($images as $img=>$image) {
		//$image = $CategoryThumbs[0];
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

		$thmub_images[$img] = "http://badhaidilse.in/greetingframes/".$imageurl;
	 }
	}
	return $thmub_images;
}
?>