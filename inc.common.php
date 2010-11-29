<?php

$_cfg["paths"]["basepath"] 			= dirname(__FILE__) . "/";
$_cfg["paths"]["includes"]			= $_cfg["paths"]["basepath"] . "includes/";
$_cfg["paths"]["libraries"]			= $_cfg["paths"]["basepath"] . "libraries/";
//*** Custom libraries
$_cfg["paths"]["excelreader"]				= $_cfg["paths"]["libraries"] . "ExcelReader/";

//*** Setting the default include paths
set_include_path("/" . PATH_SEPARATOR . $_cfg["paths"]["includes"] . PATH_SEPARATOR . $_cfg["paths"]["imageresizer"] . PATH_SEPARATOR . $_cfg["paths"]["vfb"] . PATH_SEPARATOR . $_cfg["paths"]["libraries"] . PATH_SEPARATOR . $_cfg["paths"]["pear"] . PATH_SEPARATOR . $_cfg["paths"]["htmlmimemail"]);

//*** Autoloading functions, PHP5 > only.
function __autoload($class_name) {
	$strClass = 'class.' . strtolower($class_name) . '.php';
	if (include_exists($strClass)) {
		require_once($strClass);
		return;
	}

	$strClass = implode('/', explode('_', $class_name)) . '.php';
	if (include_exists($strClass)) {
		require_once($strClass);
		return;
	}
}

function include_exists($file) {
   static $include_dirs = null;
   static $include_path = null;

   // set include_dirs
   if (is_null($include_dirs) || get_include_path() !== $include_path) {
	   $include_path    = get_include_path();
	   foreach (split(PATH_SEPARATOR, $include_path) as $include_dir) {
		   if (substr($include_dir, -1) != '/') {
			   $include_dir .= '/';
		   }
		   $include_dirs[] = $include_dir;
	   }
   }

   if (substr($file, 0, 1) == '/') { //absolute filepath - what about file:///?
	   return (file_exists($file));
   }

   if ((substr($file, 0, 7) == 'http://' || substr($file, 0, 6) == 'ftp://') && ini_get('allow_url_fopen')) {
	   return true;
   }

   foreach ($include_dirs as $include_dir) {
	   if (file_exists($include_dir.$file)) {
		   return true;
	   }
   }

   return false;
}

?>