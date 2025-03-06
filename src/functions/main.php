<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
include('../config/database.php');
include('../functions/advertisement.php');

//! Set $development=true during development for debugging
$development = 'true';

//* Add to top of files (Debugging Elimination)
//* checkfile(basename(__FILE__),$development);
function checkfile($filename,$development)
{
	if($development == 'true')
	{
		echo("<script>console.log('Check $filename');</script>");
	}
}


$urlprefix = [];
$urlprefix['phone'] = ['attribute' => 'tel:60','icon' => 'bi bi-telephone-fill'];
$urlprefix['email'] = ['attribute' => 'mailto:','icon' => 'bi bi-envelope'];
$urlprefix['website'] = ['attribute' => '','icon' => 'fa fa-globe'];
$url_r = mysqli_query($conn,"SELECT * FROM url");
if(mysqli_num_rows($url_r)>0)
{
	while($row = mysqli_fetch_assoc($url_r))
	{
		$urlprefix[$row['name']] = [
            'attribute' => $row['attribute'],
            'icon' => $row['icon']
        ];
	}
}
//print_r($urlprefix);

function createdirectory($dir)
{
	if(!is_dir($dir))
	{
		mkdir($dir, 0755, true);
	}
}

function refreshdirectory($folder)
{
    global $conn;
    if($folder == 'locations')
    {
        $location_q = mysqli_query($conn, "SELECT id FROM location");
		$idexisting = [];

		if (mysqli_num_rows($location_q) > 0) {
			while ($l_r = mysqli_fetch_assoc($location_q)) {
				$idexisting[] = $l_r['id']; // Store existing IDs
				createdirectory("../uploads/locations/" . $l_r['id']);
			}
		}

		// Get all directories in the uploads folder
		$uploadpath = "../uploads/locations/";
		$directories = array_filter(glob($uploadpath . '*'), 'is_dir');

		foreach ($directories as $dir) {
			$dir_id = basename($dir); // Extract the directory name (ID)

			// If the ID does not exist in the database, delete the directory
			if (!in_array($dir_id, $idexisting)) {
				deletedirectory($dir);
			}
		}
        //echo('<script>alert("Direktori lokasi dikemaskini.")</script>');
    }
}

// Function to delete a directory and its contents
function deletedirectory($dir) {
    if (!is_dir($dir)) return;

    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $filePath = $dir . '/' . $file;
        is_dir($filePath) ? deletedirectory($filePath) : unlink($filePath);
    }

    rmdir($dir);
}

function addjs($filename)
{
	global $development;
	checkfile(basename($filename),$development);
	echo("<script src='$filename'></script>");
}

function redirect($location)
{
	echo("<script>window.location.href='$location';</script>");
}

function taglink($tag)
{
	$content = "";
	if (!empty($tag)) {
		$tags = explode(',', $tag);
		foreach ($tags as $t) {
			$t = trim($t);
			$content .=' <a href="?tag=' . urlencode($t) . '"><small class="text-primary">#' . htmlspecialchars($t) . '</small></a>';
		}
		return($content);
	}
	return("");
}

function tagquery($conn,$tag,$public)
{
	$argument = "";
	if(empty($public))
	{
		$argument .= ' OR public = 1';
	}
	if(!empty($tag))
	{
		$decode = urldecode($tag);
		$tagword = explode(' ',$decode);
		$argument .= ' AND (';
		$params = [];
		$types = 'i';
		foreach ($tagword as $index => $word) {
			if($index>0)
			{
				$argument .= ' OR ';
			}
			$argument .= 'tag LIKE ?';
			$params[] = '%'.$word.'%';
			$types .= 's';
		}
		$argument .= ')';
	}
	else
	{
		$argument = '';
	}
    $stmt = $conn->prepare('SELECT * FROM location WHERE public = ?' . $argument);
    if (!empty($tag)) {
        $stmt->bind_param($types, $public, ...$params);  // Use the spread operator to bind all params
    } else {
        $stmt->bind_param('i', $public);
    }
    $stmt->execute();
    $location_q = $stmt->get_result();
	return($location_q);
}

function alltagquery($conn,$tag)
{
	// Initialize the argument variable for tag filtering
	$argument = "";

	// If $tag is provided, process it
	if (!empty($tag)) {
		$decode = urldecode($tag);
		$tagword = explode(' ', $decode);
		$argument = ' AND (';

		$types = "";
		$params = [];
		foreach ($tagword as $index => $word) {
			if ($index > 0) {
				$argument .= ' OR ';
			}
			$argument .= 'tag LIKE ?';
			$params[] = '%' . $word . '%';
			$types .= 's';
		}
		$argument .= ')';
	}
	$query = 'SELECT * FROM location WHERE (public = 0 OR public = 1)' . $argument. ' ORDER BY name ASC';
	$stmt = $conn->prepare($query);
	if (!empty($tag)) {$stmt->bind_param($types, ...$params);}
	$stmt->execute();
	$location_q = $stmt->get_result();
	return($location_q);

}

function socialmedia($social)
{
	global $urlprefix;
	$content = '';
	foreach($urlprefix as $name => $url)
	{
		if(!empty($social[$name]))
		{
			$content .= '<a id="'.$name.'" class="btn btn-success mx-1 rounded-pill" target="_blank" rel="nofollow"';
			$content .= 'href="'.$url['attribute'].$social[$name].'"';
			$content .= '>';
			if(!empty($url['icon']))
			{
				$content .= '<i class="'.$url['icon'].'"></i>';
			}
			$content .= '</a>';
		}
	}
	return($content);
}