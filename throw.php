<?php
/*
Throw script - Allows you to toss files to a web server using curl.

This software is licensed under the GNU GPL v2, and is released with 
absolutely NO WARRANTY OF ANY SORT.
*/

 
// Where the files will be located at (no ending slashes). Remember that 
// the files are uploaded in the same location as this script.
$url = "http://example.com/"; 
$file_upload_size = "6"; // Max file size (In megabytes)

if(isset($_GET['uid']))
{
	$allowedExts = array("gif", "jpeg", "jpg", "png", "zip", "gz", "bz2", "xz", "tar", "bmp", "txt", "c", "h", "cpp", "pl", "py", "sh", "bash");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	$random = substr(md5(microtime()),rand(0,26),5);

	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/x-gif")
	|| ($_FILES["file"]["type"] == "application/octet-stream")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/x-jpeg")
	|| ($_FILES["file"]["type"] == "image/x-jpg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "application/tar")
	|| ($_FILES["file"]["type"] == "application/zip")
	|| ($_FILES["file"]["type"] == "application/x-tar")
	|| ($_FILES["file"]["type"] == "application/x-zip")
	|| ($_FILES["file"]["type"] == "application/x-bzip2")
	|| ($_FILES["file"]["type"] == "application/x-gzip")
	|| ($_FILES["file"]["type"] == "application/bzip2")
	|| ($_FILES["file"]["type"] == "application/gzip")
	|| ($_FILES["file"]["type"] == "application/x-lzma")
	|| ($_FILES["file"]["type"] == "application/x-xz")
	|| ($_FILES["file"]["type"] == "application/xz")
	|| ($_FILES["file"]["type"] == "text/plain")
	|| ($_FILES["file"]["type"] == "image/bmp")
	|| ($_FILES["file"]["type"] == "text/c")
	|| ($_FILES["file"]["type"] == "text/h")
	|| ($_FILES["file"]["type"] == "text/cpp")
	|| ($_FILES["file"]["type"] == "text/x-c")
	|| ($_FILES["file"]["type"] == "text/x-h")
	|| ($_FILES["file"]["type"] == "text/x-cpp")
	|| ($_FILES["file"]["type"] == "text/py")
	|| ($_FILES["file"]["type"] == "text/python")
	|| ($_FILES["file"]["type"] == "text/x-python")
	|| ($_FILES["file"]["type"] == "text/x-py")
	|| ($_FILES["file"]["type"] == "text/pl")
	|| ($_FILES["file"]["type"] == "text/perl")
	|| ($_FILES["file"]["type"] == "text/x-pl")
	|| ($_FILES["file"]["type"] == "text/shell")
	|| ($_FILES["file"]["type"] == "text/bash")
	|| ($_FILES["file"]["type"] == "text/sh")
	|| ($_FILES["file"]["type"] == "text/x-bash")
	|| ($_FILES["file"]["type"] == "text/x-shell")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < (1024 * 1024 * $file_upload_size))
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Failed to upload. Return code: " . $_FILES["file"]["error"] . "\n";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"], "random/" . $_FILES["file"]["name"]);
			rename("random/" . $_FILES["file"]["name"], "random/$random.$extension");
			echo "File successfully uploaded: $url/$random.$extension\n";
		}
	}
	else
	{
		echo "Error: File is too large, or is a invalid filetype\nMime type: " . $_FILES["file"]["type"] . "\nFile size: " . $_FILES["file"]["size"] . "\n";
	}
}
else
{
	echo "Wrong link intrusion.\n";
}

?>
