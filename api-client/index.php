<?php

	/*
	 * ApiClient use example
	 */

	require_once 'ApiClient/vendor/autoload.php'; // for guzzle exceptions use
	require_once 'ApiClient/ApiClient.php';
	require_once 'ApiClient/data/Constants.php';

	$client = new ApiClient();

	/*$contact = $client->getClientRepository()->getById("cb11f737-d070-459b-90b4-d1670de5af41");
	$docs = $client->getClientRegDocsRepository()->getRegDocFiles($contact->RegDocuments[0]->DocID);
	var_dump($client->getClientRegDocsRepository()->getFileById($docs[0]->FileID));*/
	
	/*try{
		var_dump($client->getClientRepository()->getById("da316b25-72be-47dd-86c5-02114b59b1e7"));
	}
	catch(GuzzleHttp\Exception\ConnectException $ex){
		echo $ex->getMessage();
	}*/

	//var_dump($client->getClientRepository()->getById("da316b25-72be-47dd-86c5-02114b59b1e7"));

	/*$clients = $client->getClientRepository()->search([
		'DocTypeID' => Constants::CONSTANTS['RegDocumentType']['Jmbg'],
		'DocNumber' => '0704967703600'
	]);*/

	/*$client->getClientRepository()->create(
		[
			"Firstname" => "test02",
			"RegDocuments" => [
				[
					'DocTypeID' => Constants::CONSTANTS['RegDocumentType']['Jmbg'],
					'DocNumber' => 'значение'
				],
				[
					'DocTypeID' => Constants::CONSTANTS['RegDocumentType']['IdCard'],
					'DocNumber' => 'значение'
				]
			]
		]
	);*/

	var_dump($client->getNotificationsRepository()->sendEmail("info@cgimpel.ru", "body", "header"));

	/*
	$file = file_get_contents("examples/testpdf.pdf");
	$client->createRegDocFile("a8562726-6d2e-446d-8ae6-1746f208590d", "testfile5.pdf", $file);
	*/