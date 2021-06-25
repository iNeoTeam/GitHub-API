<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
$api = "https://api.ineo-team.ir"; //don't change it.
$parameters = array(
   'action' => "profile", // request method
   'username' => "iNeoTeam" // github page username
);
$output = json_decode(file_get_contents($api."/github.php?".http_build_query($parameters)));
if($output->status == "successfully"){
    echo json_encode(['ok' => true, 'status' => $output->status, 'result' => [
        'action' => $parameters['action'],
        'name' => $output->result->name,
        'user_id' => $output->result->id->userId
    ]]);
}else{
    echo json_encode(['ok' => false, 'status' => $output->status]);
}
unlink("error_log");
?>
