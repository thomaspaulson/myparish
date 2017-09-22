<?php
class DeathCertificate extends DataObject{
    #code
    private static $db = array(
      'Year'        	=> 'Int',
      'RegNO'       	=> 'Varchar(20)',
      'DOD'        		=> 'SS_Datetime',
      'Age'        	=> 'Int',
      'Name'        	=> 'Varchar(200)',
      'FathersName'     => 'Varchar(200)',
      'MothersName'     => 'Varchar(200)',
      'SpouseName'     	=> 'Varchar(200)',
      'Parish'        	=> 'Varchar(100)',
	  'Priest'        	=> 'Varchar(200)',
	  'Cemetery'       	=> 'Varchar(100)',
	  'BuriedDate'		=> 'Date',
	  'DeathCause' 		=> 'Varchar(100)',
	  'Place' 			=> 'Varchar(20)',
	  'Date'    		=> 'Date',
	  'ParishPriest' 	=> 'Varchar(100)',	  	  
	  'Deleted'			=> 'Boolean'  	  	  
    );
	
	private static $defaults = array(
		'Year' => null,
		'RegNO' => null,
		'DOD' => null,
		'BaptisedDate' => null,
		'Date' => null,
		'Deleted' => 0,		
	);
	
	public function getLink($action = null, $BackURL = null){
		$controller = singleton('DeathController');
		$url = $controller->Link();
		 
		//$controller = new BirthController();
		//$url = $controller->Link();
		if($BackURL){
			return Controller::join_links(
				$url,
				$action.'/'.$this->ID,
				'?RedirectURL=' . urlencode($BackURL)			
				);
		}
		else{
			return Controller::join_links(
				$url,
				$action.'/'.$this->ID
				);			
		}
	}
}
