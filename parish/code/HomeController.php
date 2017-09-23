<?php
//
class HomeController extends SiteController {
    #code   
    public static $allowed_actions = array(
        'index'
    );    
    
    public function init(){
        $this->title = 'Home';
        parent::init();
    }
    
    public function index()
    {
        return $this->renderWith(array('Home', 'App'));
    }    
    	
    public function MetaTitle() {
        return $this->title;        
        
    }
    
}
