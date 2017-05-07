<?php
// Replacement cache
if ($replacements) {
    // Converting arrays to use "str_replace" native
    $replaceSearch = array();
    $replaceReplace = array();
    foreach ($replacements as $r) {
		if (!is_array($r) || isset($r[0]) || !isset($r[1])) {
			die('Check $replacements from config.php');
		}
        $replaceSearch[] = $r[0];
        $replaceReplace[] = $r[1];
    }
}