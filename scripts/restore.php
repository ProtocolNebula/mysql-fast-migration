<?php
//die();
include_once 'config.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

echo 'Starting restoration to ',$dbname,'...<hr />';

// Temporary variable, used to store current query
$templine = '';

// Open file to read
$handle = fopen("dump.sql", "r");

// Loop through each line
while (($line = fgets($handle)) !== false) {

	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '') continue;

	// Add this line to the current segment
	$templine .= $line;
	
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';') {
		// Perform the query
		mysqli_query ( $conn , $templine) or print('Error processing \'<strong>' . $templine . '\'</strong>: ' . mysqli_error($conn) . '<br /><br />');

		// Reset temp variable to empty
		$templine = '';
	}
}

echo "Mysql restored successfully";