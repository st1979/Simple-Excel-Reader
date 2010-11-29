<?php
/**
 * Simple Excel Reader class. This is a wrapper class for the PEAR library Spreadsheet_Excel_Reader
 *
 * @version 0.1 alfa
 * @author Robin van Baalen <robin@stylr.nl>
 * @package Simple Excel Reader
 * @category File handling
 *
 */

class SimpleExcelReader extends Spreadsheet_Excel_Reader {

    /**
     * Nothing to construct, yet.
     */
    public function __construct(){
        parent::Spreadsheet_Excel_Reader();
    }

    /**
     * Read the Excel file
     * @param string $sFileName Full path to the Excel file to read
     * @return object $this The current instance. Chainable method.
     */
    public function read($strFileName) {
        parent::read($strFileName);

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
        $arrReturn = array();

        if(is_array($this->sheet)){
            $arrReturn = $this->sheet;
        }
        else {
            if(!is_array($this->sheets)){
                $this->sheets = $this->getSheets();
            }
            else {
                $this->currentSheet = $this->getSheet();
            }
        }
    }

}

?>
