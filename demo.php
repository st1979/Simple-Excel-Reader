<?php
/**
 * Demo for Simple Excel Reader class
 *
 * @author Robin van Baalen <robin@stylr.nl>
 * @link http://stylr.nl Stylr Internet Technology
 */

require_once 'inc.common.php';

$objExcel = new SimpleExcelReader();

// This needs to be an Excel 2003 file. No XLSX is supported for now.
$objExcel->read("demo.xls");

$arrHeaders = $objExcel->getHeaders();

echo "<pre>";
print_r($arrHeaders);
echo "</pre>";

?>
