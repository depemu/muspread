<?php

class Muspread {
  private $_service;
  private $_spreadsheetId;

  function __construct($client) {
    $this->_service = new Google_Service_Sheets($client);
  }

  function setSpreadsheetId($spreadsheetId) {
    $this->_spreadsheetId = $spreadsheetId;
  }

  function read($range) {
    $read = $this->_service->spreadsheets_values->get($this->_spreadsheetId, $range);
    $result = $read->getValues();

    return $result;
  }
}
