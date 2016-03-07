<?php session_start();

$response = "";

if($_REQUEST['action'] == 'like'){
	
	if(!in_array($_REQUEST['href'], $_SESSION['like'])){
		$_SESSION['like'][] = $_REQUEST['href'];		
	}	
}elseif($_REQUEST['action'] == 'unlike'){
		if(($key = array_search($_REQUEST['href'], $_SESSION['like'])) !== false) {
			unset($_SESSION['like'][$key]);
		}
}

if($_REQUEST['action'] == 'hide'){	
	if(!in_array($_REQUEST['href'], $_SESSION['hide'])){
		$_SESSION['hide'][] = $_REQUEST['href'];		
	}	
}

if($_REQUEST['action'] == 'unhide'){	
	unset($_SESSION['hide']);
}

if($_REQUEST['action'] == 'getLikeLocations'){
	$response = array('rows' => $_SESSION['like']);
}

if($_REQUEST['action'] == 'getHideLocations'){
	$response = array('rows' => $_SESSION['hide']);
}

echo json_encode($response);
exit;

//session_destroy();

//print_r(array_key_exists($_REQUEST['href'], $_SESSION['like'])); die();

?>