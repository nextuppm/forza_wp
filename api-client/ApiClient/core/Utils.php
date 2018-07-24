<?php

	class Utils {

		public static function validateGUID($guid) : bool{
			return preg_match(
				'/^\{?[A-Za-z0-9]{8}-[A-Za-z0-9]{4}-[A-Za-z0-9]{4}-[A-Za-z0-9]{4}-[A-Za-z0-9]{12}\}?$/',
				$guid
			);
		}

		public static function getCurrentDate(){
			return "/Date(" . time() . "000+0200)/"; //TODO use timezone
		}

	}