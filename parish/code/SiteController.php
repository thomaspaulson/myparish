<?php
//
class SiteController extends Controller
{
    private static $page_length = 50;

	protected $title;
    
    private static $allowed_actions = array(
    );

    public function init()
    {
		Requirements::css('parish/css/foundation-icons/foundation-icons.css');
		
        Requirements::javascript('themes/default/js/jquery.js');
        Requirements::javascript('themes/default/js/what-input.js');
        Requirements::javascript('themes/default/js/foundation.js');
        parent::init();
        
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
    }
    
    
    // return request url with baseurl
    public function RedirectURL(){
        //echo Director::baseURL();exit();        
        return urlencode(Director::baseURL().$this->request->getURL(true));
    }
    
    public function RequestedURL(){
    	//echo Director::baseURL();exit();    	
    	return urlencode(Director::absoluteBaseURL().$this->request->getURL(true));
    }
    
    public function BackURL(){
    	$backUrl = $this->request->getVar('BackURL');
		if($backUrl){    	
    		return urlencode($backUrl);
		}
		// BackURL not set
		return $this->RequestedURL();
    }
    
    // return pageLength
    public function getPageLength(){
        return self::$page_length;
    }
	
    public function getUrlParameters(){
        $vars = $this->request->getVars();
        if(isset($vars['url']))
            unset($vars['url']);
        if(count($vars)){
            return http_build_query($vars);
        }
        return null;
    }
	
    /**
     * Creates custom error pages. This will look for a template with the 
     * name ErrorPage_$code (ie ErrorPage_404) or fall back to "ErrorPage".
     *
     * @param $code int
     * @param $message string
     *
     * @return SS_HTTPResponse
    **/
    public function httpError($code, $message = null) {
        // Check for theme with related error code template.
        if(SSViewer::hasTemplate("ErrorPage_" . $code)) {
            $this->template = "ErrorPage_" . $code;
        } else if(SSViewer::hasTemplate("ErrorPage")) {
            $this->template = "ErrorPage";
        }

        if($this->template) {
            $this->response->setBody($this->render(array(
                "Code" => $code,
                "Message" => $message,
            )));
            $message =& $this->response;
        }

        return parent::httpError($code, $message);
    }
	
	public function Date($date = null, $format = 'd-m-Y'){
		if($date){
			$date = new DateTime($date);
			return $date->format( $format);
		}
		return 'NA';
		//return date($format , $date );	
	}

	public function Age($dob, $age = null){
		if($dob){
			$from = new DateTime($dob);
			$to   = new DateTime('today');
			return  $from->diff($to)->y.'';
		}
		else{
			return $age;
		}
	}
	    
}
