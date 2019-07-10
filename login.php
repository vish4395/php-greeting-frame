
<?php
require_once('header.php');
//echo $_SESSION['sess_ref'];
//PHP array containing forenames.
$names = array(
    'Christopher',
    'Ryan',
    'Ethan',
    'John',
    'Zoey',
    'Sarah',
    'Michelle',
    'Samantha',
);
 
//PHP array containing surnames.
$surnames = array(
    'Walker',
    'Thompson',
    'Anderson',
    'Johnson',
    'Tremblay',
    'Peltier',
    'Cunningham',
    'Simpson',
    'Mercado',
    'Sellers'
);


 ?>
 <?php 
 if(isset($_SESSION['dp']))
 {
	 @header('location:greetings.php');
 }
 else
 {
	 if(isset($_COOKIE['dp']))
	 {
		 $_SESSION['dp']=$_COOKIE['dp'];
		 $_SESSION['text1']=@$_COOKIE['text1'];
		 $_SESSION['text2']=@$_COOKIE['text2'];
		 header('location:greetings.php');
	 }
	 else{
	 }
 }
 ?>
   		<div class="row">

			 <div class="col-md-6">
			 	<div class="fh5co-narrow-content" style="padding: 1em 0;">
					
			  <?php
			  if(isset($_session['msg']))
			  {
			  echo $_session['msg'];
			  //$_session['msg']='';
			  }
			  ?>
			  <h2 style="font-size:2em">Step 1 : Give Your Detail</h2><hr />
			<form id="rendered-form" method="post" action="settingprofile.php"  enctype="multipart/form-data">
				<div class="fb-file form-group field-file_dp">
					<label for="file_dp" class="fb-file-label">Photo<span class="fb-required">*</span><span class="tooltip-element" tooltip="Upload Your Photo">?</span></label>
					<input type="file" placeholder="Upload Your Photo" class="form-control" name="file_dp" id="file_dp" title="Upload Your Photo" required="required" aria-required="true">
				</div>
				<div class="fb-text form-group field-name">
					<label for="name" class="fb-text-label">Name<span class="fb-required">*</span><span class="tooltip-element" tooltip="Sender's Name">?</span></label>
					<input type="text" placeholder="Your Name" class="form-control" name="name" maxlength="25" id="name" title="Sender's Name" required="required" aria-required="true">
				</div>
				<div class="fb-text form-group field-oth_info">
					<label for="oth_info" class="fb-text-label">other info<span class="tooltip-element" tooltip="like Designation, Mobile no or other identity">?</span></label>
					<input type="text" class="form-control" name="oth_info" maxlength="80" id="oth_info" title="like Designation, Mobile no or other identity">
				</div><div class="fb-button form-group field-next">
					<button type="submit" class="btn btn-primary" name="next" value="Next" style="success" id="next">Next</button>
				</div>
			</form>
				</div>
				</div>
			 <div class="col-md-6">
			<div class="owl-carousel-fullwidth animate-box" data-animate-effect="fadeInLeft">
				<?php
					$dirname = "Greetings/";
					$images = array_merge(glob($dirname."*/frame_sqr_*.png"), glob($dirname."*/frame_sqr_*.jpg"));
				shuffle($images);
					for($i=0;$i<4;$i++) {
								$image = $images[$i];
								$imgid = str_replace("Greetings/","",$image);
								
								$imgtype = substr($image, strrpos($image, '.') + 1);
									if($imgtype=='jpg')
									{
										$imgid = str_replace(".jpg","",$imgid);
										if(strpos($imgid,"sqr")!=null)
										  {
											  $imageurl="greetframesquarejpg.php?frame=".$imgid."&text=".$names[mt_rand(0, sizeof($names) - 1)].' '.$surnames[mt_rand(0, sizeof($surnames) - 1)]."&text2=".@$_SESSION['text2']."&dp=".urlencode('i.pravatar.cc/300').'&width=600';
										  }
										  else
										  {
										$imageurl="greetframe.php?frame=".$imgid."&text=".$names[mt_rand(0, sizeof($names) - 1)].' '.$surnames[mt_rand(0, sizeof($surnames) - 1)]."&text2=".@$_SESSION['text2']."&dp=".urlencode('i.pravatar.cc/300').'&width=600';
										  }
										echo '<div class="item">
							<a href="generate.php?greeting='.$imgid.'"><img alt="" class="img-responsive" src="'.$imageurl.'" /></a></div>';
									}
									elseif($imgtype=='png')
									{
										
										$imgid = str_replace(".png","",$imgid);
										if(strpos($imgid,"square")!=null)
										  {
											  $imageurl="greetframesquarepng.php?frame=".$imgid."&text=".$names[mt_rand(0, sizeof($names) - 1)].' '.$surnames[mt_rand(0, sizeof($surnames) - 1)]."&text2=".@$_SESSION['text2']."&dp=".urlencode('i.pravatar.cc/300').'&width=600';
										  }
										  else
										  {
										$imageurl="greetframepng.php?frame=".$imgid."&text=".$names[mt_rand(0, sizeof($names) - 1)].' '.$surnames[mt_rand(0, sizeof($surnames) - 1)]."&text2=".@$_SESSION['text2']."&dp=".urlencode('i.pravatar.cc/300').'&width=600';
										  }
										echo '<div class="item">
							<a href="generatepng.php?greeting='.$imgid.'"><img alt="" class="img-responsive" src="'.$imageurl.'" /></a></div>';
									}
								}
				?>
		          </div>
				</div>
			</div>
			<div class="fh5co-testimonial" >
				
				<div class="fh5co-narrow-content style-intro">
					Free & everyday new greeting cards and new quotes for every occasion and reason. 
Choose from birthday, anniversary and celebratory cards for festival and special occasions for father,mother,sister, brother, friend, girlfriend, wife through variety of mood like fun,romance,serious, inspiration.
Everyday cards brighten up a family member and a friend with funny, optimistic good morning and good day message let a loved one know how much you love and how much you miss them with sweet message. Inspire,encourage, motivate them with smart,wise,philosophical quotes.
Personlised hand picked greeting cards with your name and picture
Share on any social sharing app
				</div>
			</div>
		<div class="fh5co-narrow-content">
		 <div class="row">
			 <div class="col-md-12">
			 <!-- <img src="./images/footerbar.jpg" alt="" class="img-responsive" width="100%"/> -->
			 </div>
			 </div>
			 <div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
			  </div>
			  <div class="col-md-3"></div>
			 </div>
			 
<?php
require_once('footer.php');
 ?>