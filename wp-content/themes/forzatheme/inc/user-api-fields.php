<?
$url                = home_url( '/' );
if (isset($_COOKIE['UserID']))   {
	/* получаем id юзера из куки*/
     $userid                = $_COOKIE["UserID"];
    /* проверяем есть ли такой юзер */
     $client_id = get_client_id($userid);
    /* если нет такого юзера -  присваиваем "левый id" */
    if($client_id == false) {
			$userid = '00000000-0000-0110-0000-000000000000';
	}  else {
	 /* если есть - заполняем переменные	*/
	$client             = new ApiClient();
    $clientinfo         = $client->getClientRepository()->getById($userid);
	#$u_ID              = $clientinfo->ClientID;
	$u_fname            = $clientinfo->Firstname;
	$u_mname            = $clientinfo->Middlename;
	$u_lname            = $clientinfo->Lastname;
	$u_activeloan       = $clientinfo->ActiveLoan;
	$u_birthdate        = $clientinfo->BirthDate;
	$u_clientstatusID   = $clientinfo->ClientStatusID;
	$u_email            = $clientinfo->Communications[0]->CommValue;
	$u_phone            = $clientinfo->Communications[1]->CommValue;
	$u_JMBG             = $clientinfo->RegDocuments[0]->DocNumber;
	$u_ID_card          = $clientinfo->RegDocuments[1]->DocNumber;

	try{
        //echo '<pre>';
		//print_r($clientinfo);
       // echo '</pre>';
	}

	catch(GuzzleHttp\Exception\ConnectException $ex){

		echo $ex->getMessage();

	}


   }

}
else {
	$userid = '00000000-0000-0110-0000-000000000000';
	}

if(isset($_GET['logout'])) {
//setcookie("UserID", $client_id, time() - (86400 * 30), "/");
	$_SESSION['crm_client'] = null;
}
