<?php 

class ParseCSV {

  // Sets the delimiter that will be used for reading the file. 
  public static $delimiter = ',';
  private $filename;
  private $header;
  private $data=[];
  private $row_count = 0;

  // Calls the file function to set the file name when a new object is created.
  public function __construct($filename) {
    if($filename != '') {
      $this->file($filename);
    }
  }

  //Verifies a valid file is available.
  public function file($filename) {
    if(!file_exists($filename)) {
      echo 'File does not exist.';
      return false;
    } else if(!is_readable($filename)) {
      echo 'File is not readable.';
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  // Reads data from csv file into the data array. Modifies the array to incluide a header if detected.
  public function parse() {
    //Checks is the filename is set before continuing.
    if(!isset($this->filename)) {
      echo 'File not set';
      return false;
    }

    $file = fopen($this->filename, 'r');
    $this->reset();
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if ($row == NULL || $row === FALSE) {continue;}
      if (!$this->header) {
        $this->header = $row;
      } 
      else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
      }
    }
    fclose($file);
    return $this->data;
  }

  // Returns the current data array.
  public function last_results() {
    return $this->data;
  }

  // Returns the current row_count.
  public function row_count() {
    return $this->row_count;
  }

  // Resets the relevant properties for re-reading the file.
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->row_count = 0;
  } 
}