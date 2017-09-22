<?php
//
class MarriageController extends SiteController {
    #code   
    public static $allowed_actions = array(
        'index', 'add', 'edit', 'delete', 'print'
    );    
    
    public function init(){
        $this->title = 'Birth certificate';
        parent::init();
    }
    
    public function index()
    {
        return $this->renderWith(array('Marriage', 'App'));
    }    
    	
    public function add(){
        
    }
    
    public function edit(){
        
    }    

    public function delete(){
        
    }    

    /*    
    public function pr(){
        
    }    
    */
    
    public function MetaTitle() {
        return $this->title;
    }

    public function Link($slug = null) {
    	if($slug){
    		return Controller::join_links(Director::baseURL(), 'marriage', $slug);
    	} else {
    		return Controller::join_links(Director::baseURL(), 'marriage');
    	}
    }
    
}
