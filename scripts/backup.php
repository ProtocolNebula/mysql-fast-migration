<?php
//die();
include_once 'config.php';
include_once dirname(__FILE__) . 'Mysqldump.php';

echo 'Starting backup of ',$dbname,'...<hr />';

$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host='.dbhost.';dbname='.$dbname, $dbuser, $dbpass);
    $dump->start('dump.sql');
	
echo 'Dump database sucessfully!<br /><br />',
'<a href="dump.sql">Download .sql file</a> (if it not works, do it through FTP)';