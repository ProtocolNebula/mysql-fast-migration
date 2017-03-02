<?php
error_reporting(E_ALL);
set_time_limit(-1); // This only works in no secure mode servers and if we have permissions

// DB Configuration
$dbhost = 'localhost';
$dbname = '';
$dbuser = 'root';
$dbpass = '';


/*
 * REPLACEMENTS
 * THIS IS FOR "RESTORE.PHP", NOT "BACKUP.PHP". This NOT MODIFY the .sql file
 * NOTE: Take caer with ORDER
 * 
 * This let you the possibility to change things, for example, a PATH or any type of string you wish. Is useful for wordpress, smf, etc...
 * Leave as false if you don't need this
 * 
 * EX:
$replacements = array(
   array('http://oldhost/oldDir', 'http://newhost/newDir'),
   array('/oldhost/', '/newHost/'),
   //...
 )

$replacements = false; */

$replacements = false;