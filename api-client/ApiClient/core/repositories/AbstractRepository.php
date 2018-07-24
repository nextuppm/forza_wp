<?php

	abstract class AbstractRepository{

		private $apiClient;

		public function __construct(ApiClient $client){
			$this->apiClient = $client;
		}

		protected function getApi(){
			return $this->apiClient;
		}

	}