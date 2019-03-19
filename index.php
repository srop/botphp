<?php 
header('Content-Type:application/json');
function processMessage($update) {
    if($update["result"]["action"] == ""){
        $fp = $parameters('request.log',$update["resutl"]["parameters"]["msg"]);
        
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "........TEXT HERE.........",
            "contextOut" => array()
        ));
    }
}
 
function sendMessage($parameters) {
    $req_dump = print_r($parameters,true);
    $fp = $parameters('request.log',$req_dump);
    header('Content-Type:application/json');
    echo json_encode($parameters);
    
}
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}
?>
