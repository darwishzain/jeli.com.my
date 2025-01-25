<?php
$development = 'true';//During Development = true

//To call function
//$url = attribute('url',$conn);
//To echo if exist
//if(!empty($dev)){echo('asas');}
function attribute($name,$conn)
{
	$website_r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT attribute FROM website WHERE name = '$name'"));
	return($website_r['attribute']);

}
$url = attribute('url',$conn);
$title = attribute('title',$conn);
$description = attribute('description',$conn);
$iconlight = attribute('iconlight',$conn);
$icondark = attribute('icondark',$conn);

$bootstrapjs = attribute('bootstrapjs',$conn);
$bootstrapcss = attribute('bootstrapcss',$conn);
$bootstrapicon = attribute('bootstrapicon',$conn);
$bootstrapbundlejs = attribute('bootstrapbundlejs',$conn);
$fontawesomecss = attribute('fontawesomecss',$conn);
$fontawesomejs = attribute('fontawesomejs',$conn);

//Add to top of files
//checkfile(basename(__FILE__),$development);
function checkfile($filename,$development)
{
	if($development == 'true')
	{
		echo("<script>console.log('$filename');</script>");
	}
}


?>