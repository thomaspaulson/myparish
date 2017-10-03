<?php
class MarriageCertificate extends DataObject{
    #code
    private static $db = array(
      'Year'        	=> 'Varchar(4)',
      'RegNO'       	=> 'Varchar(20)',
      'PageNO'       	=> 'Varchar(4)',      
      'GroomName'       => 'Varchar(100)',
      'GroomFather'     => 'Varchar(100)',
      'GroomMother'     => 'Varchar(100)',
      'GroomParish'     => 'Varchar(100)',
      'GroomBornAt'     => 'Varchar(100)',        
      'GroomDOB'        => 'Date',
      'GroomBaptisedAt' => 'Varchar(100)',  
      'GroomBaptised'   => 'Date',
      'BrideName'       => 'Varchar(100)',
      'BrideFather'     => 'Varchar(100)',
      'BrideMother'     => 'Varchar(100)',
      'BrideParish'     => 'Varchar(100)',
      'BrideDOB'        => 'Date',
      'BrideBornAt'     => 'Varchar(100)',                
      'BrideBaptisedAt' => 'Varchar(100)',  
      'BrideBaptised'   => 'Date',            
      'Parish'          => 'Varchar(100)',
      'DOMarriage'      => 'Date',
      'Witness1'        => 'Varchar(100)',
      'Witness1Parish'  => 'Varchar(100)',
      'Witness2'        => 'Varchar(100)',
      'Witness2Parish'  => 'Varchar(100)',
      'Place'		=> 'Varchar(20)',
      'Date'   		=> 'Date',
      'ParishPriest' 	=> 'Varchar(100)',	
      'Remarks' 	=> 'Varchar(100)',	        
      'Deleted'		=> 'Boolean'  	  	  
    );
	
    private static $defaults = array(
        'GroomDOB' => null,
        'GroomBaptised' => null,
        'BrideDOB' => null,
        'BrideBaptised' => null,
        'DOMarriage' => null,
        'Date' => null,
        'Deleted' => 0,		
    );
    
    /*
    public function Age($dob){
        if($dob){
            $from = new DateTime($dob);
            $to   = new DateTime('today');
            return  $from->diff($to)->y.' years';
        }
    }*/    
	
    public function getLink($action = null, $BackURL = null){
        $controller = singleton('MarriageController');
        $url = $controller->Link();		 
        if($BackURL){
                return Controller::join_links(
                        $url,
                        $action.'/'.$this->ID,
                        '?RedirectURL=' . urlencode($BackURL)			
                        );
        }
        return Controller::join_links(
                $url,
                $action.'/'.$this->ID
            );			
        
    }
	
}
