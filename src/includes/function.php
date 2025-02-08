<?php
$development = 'true';//During Development = true

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