<?php
/**
 * This script is the same than "restore" but with support for multiple rows for each insert
 * 
 */
//die();
include_once 'config.php';
set_time_limit(-1);
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('No mysql connection');

echo 'Starting restoration to ',$dbname,'...<hr />';

if (!is_file('dump.sql')) die('No dump file found');

function executeQuery($query) {
	// Replacing the strings
	if ($GLOBALS['replacements']) {
		$query = str_replace($GLOBALS['replaceSearch'], $GLOBALS['replaceReplace'], $query);
	}
	
	// Perform the query
	mysqli_query ($GLOBALS['conn'], $query) or print('Error processing \'<strong>' . $query . '\'</strong>: ' . mysqli_error($GLOBALS['conn']) . '<br /><br />');
}

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

// "INSERT INTO" sentence base
$insertIntoLine = false;

// Temporary variable, used to store current query
$templine = '';

// Loop through each line
while (($line = fgets($handle)) !== false) {

	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '/*') continue;

	$line = trim($line);
	
	// Add this line to the current segment
	$templine .= $line;
	
	// New insert
	if (!$insertIntoLine and strpos($line, 'INSERT INTO ') !== false) {
		$insertIntoLine = $line . ' ';
	}
	
	// If it has a semicolon at the end, it's the end of the query
	if ($insertIntoLine and substr(trim($line), -1, 1) == ',') {
		$templine = substr(trim($templine), 0, -1) . ';'; // Reeplace "," to ";"
		executeQuery($templine);
		
		$templine = $insertIntoLine;
	} else if (substr(trim($line), -1, 1) == ';') {
		executeQuery($templine);
		
		// Reset temp variable to empty
		$templine = '';
		$insertIntoLine = false;
	}
}

echo "Mysql restored successfully";