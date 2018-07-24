<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Uri;

	class NotificationsRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarNotificationAPI/notifications/";


		public function sendSms(string $phone, string $message, ?string $smsTemplate = null, ?string $clientId = null, ?string $applicationId = null, ?string $loanId = null) : bool{
			$json = $this->getApi()->encodeRequestBody(
				[
					"SendSMSRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => [
							"ApplicationID" => $applicationId,
							"ClientID" => $clientId,
							"LoanID" => $loanId,
							"SMSMessage" => $message,
							"SMSPhoneNumber" => $phone,
							"SMSTemplateID" => $smsTemplate
						]
					]
				]
			);
			$request = new Request('POST', self::CONST_PATH . "sendSMS", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->SendSMSResult->Code == "OK"){
				return true;
			}

			throw new ClientException($responseData->SendSMSResult->Description, $request, $response);
		}

		public function sendEmail(string $email, string $body, string $header, ?string $emailTemplate = null, ?string $clientId = null, ?string $applicationId = null, ?string $loanId = null) : string{
			$json = $this->getApi()->encodeRequestBody(
				[
					"SendEmailRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => [
							"ApplicationID" => $applicationId,
							"ClientID" => $clientId,
							"LoanID" => $loanId,
							"EmailAddress" => $email,
							"EmailBody" => $body,
							"EmailHeader" => $header,
							"EmailTemplateID" => $emailTemplate
						]
					]
				]
			);
			var_dump(self::CONST_PATH . "sendEmail");
			$request = new Request('POST', self::CONST_PATH . "sendEmail", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->SendEmailResult->Code == "OK"){
				return $responseData->SendEmailResult->ResponseObject->EmailMessageID;
			}

			throw new ClientException($responseData->SendEmailResult->Description, $request, $response);
		}

	}