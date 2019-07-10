<!-- 
  Project: Greeting Frames <BadhaiDilSe>
  Author: Vishal Sharma
  Contact: vishals4395@gmail.com
 -->

<?php
session_start();
if (isset($_GET['Cat']))
{
  $req_cat=$_GET['Cat'];
}
else
{
  $req_cat='';
}
if(isset($_COOKIE['dp']))
	 {
		 $_SESSION['dp']=$_COOKIE['dp'];
		 $_SESSION['text1']=$_COOKIE['text1'];
		 $_SESSION['text2']=@$_COOKIE['text2'];
		 $_SESSION['rand_id']=rand(0,1000);
	 }
	 else
	 {
	 	
	 	$_SESSION['dp']='i.pravatar.cc/300';
		 $_SESSION['text1']='Your Name';
		 $_SESSION['text2']='';
		 $_SESSION['rand_id']=rand(0,1000);		
		//header('location:index.php');
	 }

   $bds_site_name="BadhaiDilSe.in";
   $bds_site_url="http://BadhaiDilSe.in";
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo ($req_cat?$req_cat.' Cards - ':$req_cat); echo $bds_site_name;?> :: Make Your Own Card Gallery... | Birthday Card, Good Morning Cards, Quotes Cards, Anniversary cards, Hindi Cards,Thank You, Rakshabandhan Cards with photo & Name</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo ($req_cat?$req_cat.' - ':$req_cat); echo $bds_site_name;?> :: Make Your Own Card Gallery... | Birthday Card, Good Morning Cards, Quotes Cards, Anniversary cards, Hindi Cards,Thank You, Rakshabandhan Cards with photo & Name" />
  <meta name="keywords" content="<?php echo ($req_cat?$req_cat.' Cards ':$req_cat);?>, BadhaiDilSe.in, BadhaiDilSe, Badhai Dil Se" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta property="og:title" content="<?php echo ($req_cat?$req_cat.' Cards - ':$req_cat);echo $bds_site_name;?> :: Make Your Own Card Gallery... | Birthday Card, Good Morning Cards, Quotes Cards, Anniversary cards, Hindi Cards,Thank You, Rakshabandhan Cards with photo & Name">
<meta property="og:site_name" content="<?php echo $bds_site_name;?>">
<?php
if($req_cat)
{
$ogimages = array_merge(glob(dirname(__FILE__)."/Greetings/$req_cat/*.png"), glob(dirname(__FILE__)."/Greetings/$req_cat/*.jpg"));
}
elseif(isset($_GET['greeting']))
{
$ogimages = array_merge(glob(dirname(__FILE__)."/Greetings/*/*.png"), glob(dirname(__FILE__)."/Greetings/*/*.jpg"));
}
else
{
$ogimages = array_merge(glob(dirname(__FILE__)."/Greetings/*/*.png"), glob(dirname(__FILE__)."/Greetings/*/*.jpg"));
}
shuffle($ogimages);
$ogimgid = str_replace(dirname(__FILE__)."/","",$ogimages[0]);
echo '<meta property="og:image" content="<?php echo $bds_site_url;?>/'.$ogimgid.'">';
?>


<!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->


  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=596065fa6b0f56001255f8f3&product=inline-share-buttons"></script>
  
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102296369-1', 'auto');
  ga('send', 'pageview');

</script>
<script async defer data-pin-hover="true" data-pin-tall="true" data-pin-lang="en" src="//assets.pinterest.com/js/pinit.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fh5co-page">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" style="background: white;box-shadow: 0px 1px 4px #333;width: 100%"><i></i>&nbsp; <strong>Badhaidilse.in</strong></a> 
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

      <h1 id="fh5co-logo" ><a href="./"><img src="logo.jpeg" alt="Badhaidilse.in" class="img img-circle img-responsive" style="width: 90%;margin:0 auto;max-width: 118px;border:solid 3px white;box-shadow: 1px 1px 3px black;"></a></h1>
      <nav id="fh5co-main-menu" role="navigation">
        <ul>
          <!-- <li class="fh5co-active"><a href="./">Home</a></li> -->
          <li class="fh5co"><a href="./">Home</a></li>
          <?php
          $Hfoldrs = glob("Greetings/*", GLOB_ONLYDIR);
          foreach($Hfoldrs as $foldr) {
          $CategoryName=str_replace("Greetings/", '',$foldr);
                        echo '<li><hr><a href="./greetings/'.str_replace(" ","-", $CategoryName).'">'.$CategoryName.'</a></li>';
          }
          ?>
        </ul>
      </nav>

      <div class="fh5co-footer">
        <p class="hidden"><small>&copy; 2018 Vishal Sharma. All Rights Reserved.</span> </small></p>
      </div>

    </aside>

    <div id="fh5co-main">
                <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">&nbsp; <span></span></h2>
                <div class="header-box-vs">
                <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><?php echo $bds_site_name;?> <span></span></h2>
                <div class="row">
                  <div class="col-md-6">Make Your Own Greeting Gallery...</div>
                  <div class="col-md-6"><!-- <div class="sharethis-inline-share-buttons"></div> --></div>
                </div>
                </div>


   
			