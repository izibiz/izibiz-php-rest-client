<?php

$baseurl = "https://apidev.izibiz.com.tr/v1/";

class Operations
{

  public function httpRequest($url, $header, $data, $requestType)
  {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    if ($requestType == "POST") {

      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    } else if ($requestType == "GET") {
      curl_setopt($curl, CURLOPT_HTTPGET, true);
    } else if ($requestType == "DELETE") {
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    }


    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // curl_setopt($curl, CURLOPT_VERBOSE, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //  $resp = json_decode(curl_exec($curl));

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    echo curl_error($curl);
    $resp = curl_exec($curl);
    if (curl_errno($curl)) {
      print curl_error($curl);
    }
    curl_close($curl);
    return $resp;
  }

  public function homeFileOpen()
  {
    $file_path = dirname(__FILE__, 3);
    $klas = "$file_path\Izibiz_php_rest_client_files";
    $this->fileExists($klas);
    return $klas;
  }

  public function header($token)
  {
    $headers = array(
      "Accept: application/json",
      "Content-Type:application/json;charset=UTF-8",
      "Authorization:Bearer " .$token
    );
    return $headers;
  }

  public function fileExists($klas)
  {
    if (!file_exists($klas)) {
      $olustur = mkdir("$klas");
    }
  }

  public function decompress($file_path,$folderpath)
  {
    $unzip = new ZipArchive;
    $zip1 = $unzip->open($file_path);

    if ($zip1 === TRUE) {
      $unzip->extractTo($folderpath);
      $unzip->close();
      unlink($file_path);
    }
  }

}
