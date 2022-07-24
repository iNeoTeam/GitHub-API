<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
define("API", "https://api.ineo-team.ir");
define('ACCESS_KEY', "YOUR_ACCESS_KEY"); # Get from: T.me/APIManager_Bot?start=api-github
function GitHub($action, $data = []){
      $data['accessKey'] = ACCESS_KEY;
      $data['action'] = $action;
      $cURL = curl_init();
      curl_setopt($cURL, CURLOPT_URL, API."/github.php");
      curl_setopt($cURL, CURLOPT_POST, true);
      curl_setopt($cURL, CURLOPT_POSTFIELDS, $data);
      curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
      $Result = curl_exec($cURL);
      curl_close($cURL);
      return $Result;
}

# Get GitHub Profile Information:
echo GitHub("profile", ['username' => "iNeoTeam"]);

# Get GitHub Page Repositories:
echo GitHub("repositories", ['username' => "iNeoTeam"]);

# Get GitHub Repositorie Information:
echo GitHub("project", ['url' => "https://github.com/iNeoTeam/GitHub-API"]);
unlink("error_log");
?>
