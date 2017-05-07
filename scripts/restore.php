<?php
//die();
include_once 'config.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('No mysql connection');

echo 'Starting restoration to ',$dbname,'...<hr />';

// Temporary variable, used to store current query
$templine = '';

if (!is_file('dump.sql')) die('No dump file found');

// Open file to read
$handle = fopen("dump.sql", "r");

// Replacement cache
if ($replacements) {
    // Converting arrays to use "str_replace" native
    $replaceSearch = array();
    $replaceReplace = array();
    foreach ($replacements as $r) {
        $replaceSearch[] = $r[0];
        $replaceReplace[] = $r[1];
    }
}

// Loop through each line
while (($line = fgets($handle)) !== false) {

	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '/*') continue;

	// Add this line to the current segment
	$templine .= $line;
	
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';') {
                // Replacing the strings
                if ($replacements) {
                    $templine = str_replace($replaceSearch, $replaceReplace, $templine);
                }
            
		// Perform the query
		mysqli_query ($conn , $templine) or print('Error processing \'<strong>' . $templine . '\'</strong>: ' . mysqli_error($conn) . '<br /><br />');

		// Reset temp variable to empty
		$templine = '';
	}
}

echo "Mysql restored successfully";