<?php

	class Constants{

		const CONSTANTS = [
			"RegDocumentType" => [
				"Jmbg" => "BDC463D4-FE42-406A-A3D8-C87320E3536C",
				"SocialSecurityNumber" => "1DEC02AF-AC1F-4FC3-895B-B9746DD4C7C9",
				"IdCard" => "1188B317-4229-4C67-8D20-19048E279AAC",
			],

			"ClientCommunicationType" => [
				"HomePhone" => "0DA6A26B-D7BC-DF11-B00F-001D60E938C6",
				"OfficePhone" => "3DDDB3CC-53EE-49C4-A71F-E9E257F59E49",
				"Phone" => "D4A2DC80-30CA-DF11-9B2A-001D60E938C6",
				"Email" => "EE1C85C3-CFCB-DF11-9B2A-001D60E938C6",
			],

			"AddressType" => [
				"Registration" => "24422A09-9B5C-413A-9A4F-8586CE9B56DD",
				"LivingResidential" => "297253BF-AED1-4634-87B4-6A3C494B4D0F",
				"Business" => "FB7A3F6A-F36B-1410-6F81-1C6F65E50343",
			],

			"ClientStatusType" => [
				"Active" => "B509AB2C-E1FB-4BFF-A6C8-3904B05258CB",
				"New" => "6EC0F766-D7F5-49B9-B36B-E63EA94DE72A",
				"Repeater" => "929467FD-665E-4011-AD0E-3573E34E5ABB",
				"Vip" => "FE98DE17-2A15-4BA9-A0E4-F328878A1FDA",
			],

			"LoanStatusType" => [
				"Closed" => "02B0BA06-E213-443D-9C3F-22015D376B6E",
				"Disbursed" => "49F67EC3-09C2-46F0-A5ED-EC2BED319E74",
				"InArrears" => "68F0778F-8489-4F68-9C02-84E2330A7B3B",
			],

			"SigningMethod" => [
				"SignWithSmsCode" => "5CE4393C-21C3-4EA2-8762-F4F84EFFA891",
				"PersonalSigning" => "8801DBED-0AF8-4141-9247-77D07EF668DC",
			],

			"DisbursmentMethod" => [
				"Cash" => "9508DDBE-AB3C-45E7-9D61-195061BD1E07",
				"NonCashTransfer" => "C10B3AA8-D656-495E-B263-FE7FF48C3D68",
			],

			"ResidentialProperty" => [
				"OwnerCoOwner" => "731FB06B-6EE5-4815-99E7-C78098635097",
			],

			"CarPossession" => [
				"No" => "BA5B319B-A927-46A5-A639-54FDFEAB47B7",
			],

			"MaritalStatus" => [
				"Single" => "6E2C607C-C521-455E-BC40-1246309EE232",
			],

			"OfferType" => [
				"Fixed" => "60D3412E-9343-4C69-8F6B-D646C9E0903F",
				"Special" => "B505FE70-199A-419D-A2A3-4724D92DB393",
				"Variable" => "872FABBD-8798-4C51-995D-0DE9AB804340",
			],

			"Gender" => [
				"Male" => "EEAC42EE-65B6-DF11-831A-001D60E938C6",
				"Female" => "FC2483F8-65B6-DF11-831A-001D60E938C6",
			],

			"Country" => [
				"Albania" => "12039BEC-8DD7-43FE-8A5F-4A69C2DD0B17",
				"Bosnia" => "7F43AF47-6600-4BAC-BBC7-57BFABAAF400",
				"Macedonia" => "3BD504C6-AF1E-485F-B59F-D8C3F746E499",
			],

			"CultureNames" => [
				"Macedonia" => "mk",
				"Bosnia" => "bs",
				"Albania" => "sq",
			],

			"EmployementStatus" => [
				"EmployedPartTime" => "407735E5-386C-4E8B-965F-D369ADAF18C2",
				"Retired" => "4819D7DF-51D5-4567-96DC-DE715E8053EE",
				"SelfEmployed" => "D23EFB9A-EC75-4B74-8745-167DCA88592D",
				"Unemployed" => "465F1760-182F-42AE-B264-533ECC4DA07A",
				"WorkingOnContract" => "6ACB7CC9-C638-479F-9578-3B45E80807CE",
				"PermanentEmployment" => "50E67DFE-561C-4307-81FA-F46DA1D6E467",
			],

			"ApplicationStatus" => [
				"DataCaptureFinished" => "A18268BC-9602-4163-BB61-BC89228F9818",
				"Created" => "FCFB2399-60D9-4A5A-91F2-9D501E2B8369",
				"PreApplication" => "45178FB5-87F8-4E39-B2DB-146B7113EBC8",
				"Signing" => "CF6B319D-EB29-48CC-B150-99C71D6A6462",
				"Closed" => "C8BD7900-DE8F-428D-B3C7-D191518D7F35",
				"SpecialOfferRequested" => "E50D2E21-E868-473B-9D4B-B399DECF891E",
				"Rejected" => "2E551420-DB4F-41E9-AB2B-151AEB0B6601",
				"Accepted" => "7A8332E4-D170-4E5F-AFD6-2F5E37515904",
				"Verification" => "A6A4DD53-1F77-4ADC-B8E6-D7803197EFCB",
				"VerificationCompleted" => "52D8627E-895E-429D-8C44-1BC6C2AC03ED",
				"Signed" => "ABDEC374-9C59-4CA4-9AC8-560988D7DBB8",
				"PreCreated" => "1E8C32B6-1CC9-43E6-B45A-17AC51945208",
				"Duplicated" => "9A32AE73-AACF-4ED1-84F4-67FC73572B3A",
				"DuplicatedUnavailableOffer" => "2F3BC0C7-0EBE-4C86-B6EC-5A8E8F90AF25",
				"RejectedDuplicated" => "D864DB13-B71C-4FEC-A9C3-3895E72139DA",
			],

			"LoanApplicationParameter" => [
				"Amount" => "E477D926-A5B9-43A5-97FF-62B9ADC711D5",
				"DueDate" => "E9FC717B-AF4C-4C4C-85CD-C4FA09A944D8",
				"NumberOfDays" => "4A167339-5CD1-4EE6-87DB-D2C09E975407",
				"InterestAmount" => "223CB1CB-6BAA-4854-AB0D-03FBD620BA25", //(Камата 10%)
				"FeeAmount" => "42E7A51C-F936-4078-BA7F-6E24552E3280", // (Провизиjа / Вкупни провизии)
				"AmountToPay" => "5E88395F-AA88-43F8-957E-A8A3A30F2EAE", // (Вкупно за отплата)
				"Apr" => "F31DD9A9-BD38-4D01-BACD-5FEC11E5FB2A", // (СВТ)
			],

			"LoanParameter" => [
				"ActualDueDate" => "34B459BD-4EB3-44D4-98AD-47EEAF5D05C3",
				"FeesDue" => "B385C5EC-84FD-4E90-87C8-1D54BAA0B89D",
				"TotalDue" => "2E989A2E-0FCE-41BD-A644-7FA73778E0FA",
				"PrincipalBalance" => "C200DEB3-EF9E-4603-BA86-6372FE0AEB5C",
				"FeesBalance" => "FCB3C181-84FD-47C1-A5BC-8B7BD105F74A",
				"InterestBalance" => "E7A559BC-EDE9-4C0E-86AC-93D0D33B3670",
				"TotalBalance" => "5ACBFDD0-0BA1-4B79-8536-D2C85D825473",
				"DisbursmentDate" => "82296E69-B380-4C59-B730-B5CE8CA8468C",
				"ExtensionAvailabilityForClient" => "C6A11B9B-4566-4ACB-AE7F-EDF1844E3CC3",
				"ExtensionRequestFlag" => "6F43DB66-1F79-4344-A82D-09790E566994",
				"ProposedExtensionTerm" => "D530FE1A-BC19-4883-BFC2-17F65229C127",
				"ProposedExtensionFee" => "87F1ABD2-40F3-4F35-9DEB-2D948F77998D",
				"ProposedExtensionPaymentDD" => "20DEAF55-A361-4B53-BE00-5C4967048BCF",
				"SattlementBalance" => "F8C22C49-E0F2-45C9-A60F-F9D3EBD3A497",
				"ExtensionFeeAmountOnSattelmentBalance" => "458D2E9B-F2EF-4162-AE6E-AF44BC0F1D04",
			],

		];

	}