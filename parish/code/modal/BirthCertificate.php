<?php
class BirthCertificate extends DataObject{
    #code
    private static $db = array(
      'Year'        	=> 'Varchar(4)',
      'RegNO'       	=> 'Varchar(20)',
      'Name'        	=> 'Varchar(200)',
      'FathersName'     => 'Varchar(200)',
      'MothersName'     => 'Varchar(200)',
      'Parish'        	=> 'Varchar(100)',
      'Location'        => 'Varchar(20)',
      'DOB'        		=> 'Date',
	  'BaptisedAt' 		=> 'Varchar(200)',
	  'BaptisedDate'    => 'Date',
	  'Priest'        	=> 'Varchar(200)',
	  'GodFather'       => 'Varchar(200)',
	  'GodFatherParish' => 'Varchar(200)',
	  'GodMother'       => 'Varchar(200)',
	  'GodMotherParish' => 'Varchar(200)',
	  'Place' 			=> 'Varchar(20)',
	  'Date'    		=> 'Date',
	  'ParishPriest' 	=> 'Varchar(100)',	  	  
	  'Deleted'			=> 'Boolean'  	  	  
    );
	
	private static $defaults = array(
		'Year' => null,
		'RegNO' => null,
		'DOB' => null,
		'BaptisedDate' => null,
		'Date' => null,
		'Deleted' => 0,		
	);
    
	public function Age($dob){
		if($dob){
			$from = new DateTime($dob);
			$to   = new DateTime('today');
			return  $from->diff($to)->y.' years';
		}
    }    
	
	public function getLink($action = null, $BackURL = null){
		$controller = singleton('BirthController');
		$url = $controller->Link();		 
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
