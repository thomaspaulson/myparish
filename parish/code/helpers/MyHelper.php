<?php
class MyHelper {
	public static function DateTime($year = 0, $month  = 0, $date = 0, $time = null){
		if($time){
			$format = 'Y-m-d h:i';
			$dateString = $year.'-'.$month.'-'.$date.' '.$time;
		}
		else{
			$dateString = $year.'-'.$month.'-'.$date;
			$format = 'Y-m-d';
		}				
        if( checkdate ( (int)$month , (int)$date , (int)$year )){            
            $dateTime = DateTime::createFromFormat($format, $dateString);            
            return $dateTime;
        }
        return null;
	}
	
	public static function Months(){		
	 $months = array(	 	
	    '01' => 'January',
	    '02' => 'February',
	    '03' => 'March',
	    '04' => 'April',
	    '05' => 'May',
	    '06' => 'June',
	    '07' => 'July',
	    '08' => 'August',
	    '09' => 'September',
	    '10' => 'October',
	    '11' => 'November',
	    '12' => 'December'	    	    	    	    
	  );
	  return $months;	
	}	  
}
