<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common {

	public function response($status, $message)
	{
		$title = '';

		switch ($status) {
		    case 'success':
		        $title = 'Successful';
		        break;
		    case 'error':
		        $title = 'Unsuccessful';
		        break;
		    case 'warning':
		        $title = 'Alert';
		        break;
		    case 'info':
		        $title = 'Information';
		        break;
		    default:
		        $title = 'Message';
		} 

		$response =  array('status' => $status , 'title' => $title, 'message' => $message);
		return json_encode($response);
	}
}
