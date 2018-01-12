<?php 
$action = $_REQUEST['action_to_do'];
if($action == 'shutdown'){
	$result = shell_exec("shutdown.sh");	
}

else if($action == 'reboot'){
    $result = shell_exec("reboot.sh");	
    
}

else{
	$result = "Please select an action";
}
var_dump($result);
exit;
header('Location: index.php?result='.$result);

?>