<?php
/**
 * Demo for Simple Excel Reader class
 *
 * @author Robin van Baalen <robin@stylr.nl>
 * @link http://stylr.nl Stylr Internet Technology
 */

require_once 'inc.common.php';

$objExcel = new ExcelReader();

$objExcel->read("demo.xls")


$arrHeaders = $objExcel->getHeaders();

?>
