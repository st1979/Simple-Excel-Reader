<?php
/**
 * Simple Excel Reader class
 *
 * @version 0.1
 * @author Robin van Baalen <robin@stylr.nl>
 *
 */

class SimpleExcelReader extends Spreadsheet_Excel_Reader {

    public function __construct(){

    }

    /**
     * Read the Excel file
     * @param string $sFileName Full path to the Excel file to read
     * @return object $this The current instance. Chainable method.
     */
    public function read($sFileName) {
        parent::read($sFileName);

        return $this;
    }

    /**
     * Get an array of sheets
     * @param integer $intSheet Sheet number
     * @return array An array of rows for the given sheet. If no sheet is set, return an array of all sheets
     */
    public function getSheets($intSheet = NULL){
        return (!is_null($intSheet)) ? $this->sheets[$intSheet] : $this->sheets;
    }

    /**
     * Get an array of rows for the given sheet. Default: first sheet.
     * @param integer $intSheet Sheet number. Default: 0.
     * @return array An array of rows
     */
    public function getSheet($intSheet = 0){
        return $this->getSheets($intSheet);
    }

    public function getHeaders(){
        
    }

}

?>
