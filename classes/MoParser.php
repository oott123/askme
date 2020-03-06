<?php

class MoParser {
  private $_bigEndian = false;
  private $_file = false;
  private $_data = array();

  private function _readMOData($bytes) {
    if ($this->_bigEndian === false) {
      return unpack('V' . $bytes, fread($this->_file, 4 * $bytes));
    } else {
      return unpack('N' . $bytes, fread($this->_file, 4 * $bytes));
    }
  }

  public function loadTranslationData($filename, $locale) {
    $this->_data = array();
    $this->_bigEndian = false;
    $this->_file = @fopen($filename, 'rb');
    if (!$this->_file) throw new Exception('Error opening translation file \'' . $filename . '\'.');
    if (@filesize($filename) < 10) throw new Exception('\'' . $filename . '\' is not a gettext file');

    // get Endian
    $input = $this->_readMOData(1);
    if (strtolower(substr(dechex($input[1]), -8)) == "950412de") {
      $this->_bigEndian = false;
    } else if (strtolower(substr(dechex($input[1]), -8)) == "de120495") {
      $this->_bigEndian = true;
    } else {
      throw new Exception('\'' . $filename . '\' is not a gettext file');
    }
    // read revision - not supported for now
    $input = $this->_readMOData(1);

    // number of bytes
    $input = $this->_readMOData(1);
    $total = $input[1];

    // number of original strings
    $input = $this->_readMOData(1);
    $OOffset = $input[1];

    // number of translation strings
    $input = $this->_readMOData(1);
    $TOffset = $input[1];

    // fill the original table
    fseek($this->_file, $OOffset);
    $origtemp = $this->_readMOData(2 * $total);
    fseek($this->_file, $TOffset);
    $transtemp = $this->_readMOData(2 * $total);

    for($count = 0; $count < $total; ++$count) {
      if ($origtemp[$count * 2 + 1] != 0) {
        fseek($this->_file, $origtemp[$count * 2 + 2]);
        $original = @fread($this->_file, $origtemp[$count * 2 + 1]);
        $original = explode("\0", $original);
      } else {
        $original[0] = '';
      }

      if ($transtemp[$count * 2 + 1] != 0) {
        fseek($this->_file, $transtemp[$count * 2 + 2]);
        $translate = fread($this->_file, $transtemp[$count * 2 + 1]);
        $translate = explode("\0", $translate);
        if ((count($original) > 1) && (count($translate) > 1)) {
          $this->_data[$locale][$original[0]] = $translate;
          array_shift($original);
          foreach ($original as $orig) {
            $this->_data[$locale][$orig] = '';
          }
        } else {
          $this->_data[$locale][$original[0]] = $translate[0];
        }
      }
    }

    $this->_data[$locale][''] = trim($this->_data[$locale]['']);

    unset($this->_data[$locale]['']);
    return $this->_data;
  }

  public function translate($locale, $message) {
    if (isset($this->_data[$locale][$message])) {
      return $this->_data[$locale][$message];
    }
    return $message;
  }
}
