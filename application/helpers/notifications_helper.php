<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
//     function send_notice($title, $message) {
// 	    $imageUrl = '';
// 	    return send_fcm($title, '', 'global', $message, $imageUrl, $action, '');
// 	}
    function send_notice($title="", $message="",$type="",$userId="") {
        if($title=="" || $message=="")
            return false;
        // $message_data = (object)array("title" => "Background Message Title", "body" => "Background message body");
        // return send_gcm($message_data, "android");
	   // return send_fcm1($title, '', 'global', $message);
	   return sendMessage($userId="", $title, $message,$type);
	}

    function sendMessage($userId="", $title, $message,$type){
        $heading = array(
            "en" => $title
        );
        $content = array(
            "en" => $message
        );
        
        $fields = array(
            'app_id' => "7b8b0c6d-bcb8-4f1e-9408-3dee000b6271",
            'channel_for_external_user_ids' => 'push',
            'data' => array("foo" => "bar","type"=>$type, "custom"=>["i"=>""]),
            'headings' => $heading,
            'contents' => $content
        );
        if($userId!=""){
            $fields['include_player_ids'] =array($userId);
        }
        else{
            $fields['included_segments'] = array('All');
        }
        
        $fields = json_encode($fields);
        //print_r($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic YjA3ZjJkMDAtZjA1MS00MDM1LTk5OGMtNTVhNzc2ZGY0ODVi'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        // print_r($response);
        // exit;
        return $response;
    }

    function send_fcm($title="FCM Notification", $firebase_token='', $topic='', $message='', $imageUrl='', $action='', $actionDestination='') {
    	require_once __DIR__ . '/notification.php';
    	$notification = new Notification();

    	if($actionDestination ==''){
    		$action = '';
    	}
    	$notification->setTitle($title);
    	$notification->setMessage($message);
    	$notification->setImage($imageUrl);
    	$notification->setAction($action);
    	$notification->setActionDestination($actionDestination);
    	
    // 	$firebase_api = "AAAAE7XfFFk:APA91bGNw4HVBMgOUFje0_wb0vjoZShOzgeKfa8XVI6JaHgVcQn8G3YqfcPKJCa3JMeZYkT-r2Lj5UJzRN7G725vfmSjNNdQgeyCPKCTsNaa_G4TcfQmTx6eRCWKjhtym-G04G1I3oUb";
        $firebase_api = "AAAAKBVlZSM:APA91bEVTeSbywDhdn-LAy1lZy6fCxBLAsfst2Yp_R1r_5WG_oUtGr_LzDur1SbYw1ZhYM0PLcRPa3t1EXEVmVY2Zq_sYS-w9YnBaKz91dGYapQowZuFQf5NmQkHM19NdhTkejkCr5Oc";
        
    	
    	$requestData = $notification->getNotification();
    	
    	if($topic=='global'){
    		$fields = array(
    			'to' => '/topics/' . $topic,
    			'data' => $requestData,
    		);
    		
    	}else{
    		$fields = array(
    			'to' => $firebase_token,
    			'data' => $requestData,
    		);
    	}
    
    
    	// Set POST variables
    	$url = 'https://fcm.googleapis.com/fcm/send';
    
    	$headers = array(
    		'Authorization: key=' . $firebase_api,
    		'Content-Type: application/json'
    	);
    	
    	// Open connection
    	$ch = curl_init();
    
    	// Set the url, number of POST vars, POST data
    	curl_setopt($ch, CURLOPT_URL, $url);
    
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	// Disabling SSL Certificate support temporarily
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
    	// Execute post
    	$result = curl_exec($ch);
    	if($result === FALSE){
    		//die('Curl failed: ' . curl_error($ch));
    	}
    
    	// Close connection
    	curl_close($ch);
    	
    // 	echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
    // 	echo json_encode($fields,JSON_PRETTY_PRINT);
    // 	echo '</pre></p><h3>Response </h3><p><pre>';
    // 	echo $result;
    // 	echo '</pre></p>';
    	return 1;
    }