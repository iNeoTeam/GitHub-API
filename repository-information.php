<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
$api = "https://api.ineo-team.ir"; //don't change it.
$parameters = array(
   'action' => "project", // request method
   'url' => "https://github.com/iNeoTeam/GitHub-API" // github repository link
);
$output = json_decode(file_get_contents($api."/github.php?".http_build_query($parameters)));
if($output->status == "successfully"){
    echo json_encode(['ok' => true, 'status' => $output->status, 'result' => [
        'name' => $output->result->name,
        'download' => $output->result->download,
        'about' => $output->result->about
    ]]);
}else{
    echo json_encode(['ok' => false, 'status' => $output->status]);
}
unlink("error_log");
?>
