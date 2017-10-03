<?php
class BirthCertificate extends DataObject{
    #code
    private static $db = array(
        'Year'              => 'Varchar(4)',
        'RegNO'             => 'Varchar(20)',
        'PageNO'            => 'Varchar(4)',
        'Name'              => 'Varchar(100)',
        'Gender'            => 'Varchar(1)',
        'FathersName'       => 'Varchar(100)',
        'MothersName'       => 'Varchar(100)',
        'Parish'            => 'Varchar(100)',
        'Location'          => 'Varchar(20)',
        'DOB'               => 'Date',
        'BaptisedAt'        => 'Varchar(200)',
        'BaptisedDate'      => 'Date',
        'Priest'            => 'Varchar(100)',
        'GodFather'         => 'Varchar(100)',
        'GodFatherParish'   => 'Varchar(100)',
        'GodMotherRelation' => 'Varchar(20)',
        'GodMother'         => 'Varchar(100)',
        'GodMotherParish'   => 'Varchar(100)',
        'PrivatelyBaptised' => 'Boolean',
        'Place'             => 'Varchar(20)',
        'Date'              => 'Date',
        'ParishPriest'      => 'Varchar(100)',	  	  
        'Deleted'           => 'Boolean'  	  	  
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

    public function Sex(){
        switch($this->Gender){
            case 'm';
                return 'son';
                break;
            case 'f';
                return 'daughter';
                break;
            default:
                break;
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
