<?php

require __DIR__ . '/GoogleClient.php';

class Muspread {
  private $_service;
  private $_spreadsheetId;

  function __construct($client) {
    $this->_service = new Google_Service_Sheets($client);
  }

  private function _sanitize($string) {
    return filter_var(trim($string), FILTER_SANITIZE_SPECIAL_CHARS);
  }

  function setSpreadsheetId($spreadsheetId) {
    $this->_spreadsheetId = $this->_sanitize($spreadsheetId);
  }

  function read($range) {
    $range = $this->_sanitize($range);
    $result = array('success' => false);

    if ($this->_spreadsheetId != '' and $range != '') {
      try {
        $read = $this->_service->spreadsheets_values->get($this->_spreadsheetId, $range);
        $result = array(
          'success' => true,
          'result' => $read->getValues()
        );
      }
      catch (Exception $e) {}
    }

    return $result;
  }
}
