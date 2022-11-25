<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function loadClientSettings($domain_name)
{
    $servername     = "localhost";
/*    $username       = 'easyn7mj_surjeet';
    $password       = 'Nexta@12#$';
    $dbname         = "easyn7mj_nextasy_core";*/
    $username       = 'root';
    $password       = '';
    $dbname         = "easynow_beta";
    $data 			= false;
    $active_status 	= true;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM xsubscription where scr_domain = '".$domain_name."' and scr_status = ".$active_status;
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    	$data = $result->fetch_assoc();

	$conn->close();
    return $data;
}

?>