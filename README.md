Throw
=====

Throw consists of 2 simple scripts (one in PHP and one in Bash) that
allows you to "throw" (upload) files to a remote web server.

Features
--------

Simple and useful features include:
 * File uploads in one command.
 * The ability to take and upload a live screen shot in one command.
 * Extremely flexible.

Installing
----------

 * Modify the variables in throw.php to your specifications.
 * Upload throw.php to an external web server.
 * Modify the variables in throw (bash script) yet again to your
 specifications and set the "throwlink" variable to the external URL of
 throw.php on the web server. 
 
	# Example: http://yourdomain.com/files/throw.php
	
 * Notes: Make sure you modify "upload_max_filesize" and "post_max_size"
 located in php.ini.
 
Licensing
---------

These simple scripts are licensed under the GNU GPL v2, and are released 
with absolutely NO WARRANTY OF ANY SORT.
