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