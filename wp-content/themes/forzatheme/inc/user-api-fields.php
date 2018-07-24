<?
if (isset($_COOKIE['UserID']))   {
$userid                = $_COOKIE["UserID"];
$client                = new ApiClient();
$clientinfo            = $client->getClientRepository()->getById($userid);
#$user_ID              = $clientinfo->ClientID;
$user_fname            = $clientinfo->Firstname;
$user_mname            = $clientinfo->Middlename;
$user_lname            = $clientinfo->Lastname;
$user_activeloan       = $clientinfo->ActiveLoan;
$user_birthdate        = $clientinfo->BirthDate;
$user_clientstatusID   = $clientinfo->ClientStatusID;
$user_email            = $clientinfo->Communications[0]->CommValue;
$user_phone            = $clientinfo->Communications[1]->CommValue;



	try{
        //echo '<pre>';
		//print_r($clientinfo);
       // echo '</pre>';
	}

	catch(GuzzleHttp\Exception\ConnectException $ex){

		echo $ex->getMessage();

	}
}
else {}
