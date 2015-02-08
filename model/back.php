<?php
	class Back{
		public $code;
		public $result;
		public function __construct($code, $result){
			$this->code = $code;
			$this->result = $result;
		}
		
		public function __get($property_name){
			
			if(isset($this->$property_name)){
				return($this->$property_name);
			}else{
				return Null;
			}
		}
		
	
		public function __set($property_name, $value){
			
			$this->$property_name = $value;
		}
	}