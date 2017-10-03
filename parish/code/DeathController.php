<?php
//
class DeathController extends SiteController {
    #code   
    public static $allowed_actions = array(
        'index', 'add', 'AddDeathForm', 'edit', 'EditDeathForm', 'view', 'delete', 'doprint'
    );    
    
	protected $list;
	
    public function init(){
        $this->title = 'Death certificate';
        parent::init();
    }
    
    public function index()
    {
    	$this->list = $this->getAllDeathCertificates();				
        return $this->renderWith(array('Death', 'App'));
    }    
    	
    public function add(){
        Requirements::css('parish/css/jquery-ui-1.12.1.custom/jquery-ui.css');
        Requirements::javascript('parish/css/jquery-ui-1.12.1.custom/jquery-ui.js');
        
        $this->title = "Add Death";
        $form = $this->AddDeathForm();
        
		$backURL = urldecode($this->getRequest()->getVar('BackURL'));
		$redirectURL = $form->Fields()->fieldByName('RedirectURL');
		$redirectURL->setValue($backURL);
        
//      set current date  
//		if($form->Fields()->fieldByName('Date')){
//			$dateField = $form->Fields()->fieldByName('Date');
//			$dateField->setValue(date('d-m-Y'));
//        }
                
        $data = array('Form' => $form);
        return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    }
    
    public function AddDeathForm(){
    	$form = new AddDeathForm($this, __FUNCTION__);		
    	return $form;
    }
    
    public function edit(){
        Requirements::css('parish/css/jquery-ui-1.12.1.custom/jquery-ui.css');
        Requirements::javascript('parish/css/jquery-ui-1.12.1.custom/jquery-ui.js');
        
        $id = (int)$this->request->param('ID');
        $deathCertificate = DeathCertificate::get()->byID($id);
        if(!$deathCertificate){
            return $this->httpError('404','Page not found');	
        }
        $this->title = 'Edit  / <small>'. $deathCertificate->Name.'</small>';

        $form = $this->EditDeathForm();
        $form->setTemplate('AddDeathForm');
        if($deathCertificate->exists() && $form){
                $form->loadDataFrom($deathCertificate);
        }

        if($deathCertificate->DOD){
            $yearODField = $form->Fields()->fieldByName('YearOD');
            $yearODField->setValue(date('Y',strtotime($deathCertificate->DOD)));

            $monthODField = $form->Fields()->fieldByName('MonthOD');
            $monthODField->setValue(date('m',strtotime($deathCertificate->DOD)));

            $dateODField = $form->Fields()->fieldByName('DateOD');
            $dateODField->setValue(date('d',strtotime($deathCertificate->DOD)));

            $timeODField = $form->Fields()->fieldByName('TimeOD');
            $timeODField->setValue(date('H:i',strtotime($deathCertificate->DOD)));

        }	

        if($deathCertificate->BuriedDate){
            $dateBuriedField = $form->Fields()->fieldByName('DateBuried');
            $dateBuriedField->setValue(date('d',strtotime($deathCertificate->BuriedDate)));

            $monthBuriedField = $form->Fields()->fieldByName('MonthBuried');
            $monthBuriedField->setValue(date('m',strtotime($deathCertificate->BuriedDate)));

            $yearBuriedField = $form->Fields()->fieldByName('YearBuried');
            $yearBuriedField->setValue(date('Y',strtotime($deathCertificate->BuriedDate)));            
        }

        if($deathCertificate->Date){
            $date = $form->Fields()->fieldByName('Date');
            $date->setValue(date('d-m-Y',strtotime($deathCertificate->Date)));
        }

        $backURL = urldecode($this->getRequest()->getVar('BackURL'));
        $redirectURL = $form->Fields()->fieldByName('RedirectURL');
        $redirectURL->setValue($backURL);


        $data = array('Form' => $form);
        return $this->customise($data)->renderWith(array('Generic_form', 'App'));
		
    }
    
    public function EditDeathForm(){
    	$form = new EditDeathForm($this, __FUNCTION__);		
    	return $form;
    
    }

    public function view(){
        $id = (int)$this->request->param('ID');
		$DeathCertificate = DeathCertificate::get()->byID($id);
		if(!$DeathCertificate){
		    return $this->httpError('404','Page not found');	
		}
		$this->title = $DeathCertificate->Name.' / <small> Death certificate</small>';
    	$data = array('DeathCertificate' => $DeathCertificate);
    	if($this->request->isAjax()){
    		return $this->customise($data )
    		->renderWith(array('Death_view'));
    	}
    	else{
    		return $this->customise($data )
    		->renderWith(array('Death_view','App'));
    	}        
    }    

    public function delete(){
        $id = (int)$this->request->param('ID');
        $deathCertificate = DeathCertificate::get()->byID($id);        
        if(!$deathCertificate){
            return $this->httpError('404','Page not found');	
        }		
        $deathCertificate->Deleted = 1;
        $deathCertificate->write();

        $backURL = urldecode($this->getRequest()->getVar('BackURL'));//exit($backURL );
        if($backURL){
            return $this->redirect($backURL.'&message=deleted');
        }
        
        return $this->redirect($this->Link().'?message=deleted');		
    }    
    
    public function SearchForm(){
        $form = new DeathSearchForm($this, __FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link());
        $form->setLegend('Search');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();		
        return $form;		 
    }
	
    public function doprint(){		
        $id = (int)$this->request->param('ID');
        $DeathCertificate = DeathCertificate::get()->byID($id);
        if(!$DeathCertificate){
            return $this->httpError('404','Page not found');	
        }
				
        $this->title = 'Death certificate';
        $data = array('DeathCertificate' => $DeathCertificate);
        return $this->customise($data )
		->renderWith(array('Death_print','Print'));	        
    }        
    
	
    public function getAllDeathCertificates(){
        
        $sqlQuery = new SQLQuery();
        $sqlQuery->setFrom('DeathCertificate');		


	$name = Convert::raw2sql($this->request->getVar('Name'));
        $blockNo = Convert::raw2sql($this->request->getVar('DOB'));
		
        if($name) {		
                $sqlQuery->addWhere("DeathCertificate.Name LIKE '%$name%'");
        }

        if($dateOfDeath = Convert::raw2sql($this->request->getVar('DateOfDeath'))) {		
                $date = date('Y-m-d', strtotime($dateOfDeath));
                $sqlQuery->addWhere("DeathCertificate.DateOfDeath = '$date'");
        }

        $sqlQuery->addWhere("DeathCertificate.Deleted != '1'");

        $sqlQuery->setOrderBy('DeathCertificate.ID DESC');
        $result = $sqlQuery->execute();
        //echo $sqlQuery->sql();
        // Iterate over results
        $arrList = new ArrayList();
        $count = $result->numRecords();
        //echo 'SELECT COUNT(*) FROM "Family" where ParishID = '.$myparish->ID;
        $counter = 0;
        foreach($result as $row) {			
                $row['Counter'] = $count--;
                //$row['Counter'] = ++$counter;
                $arrList->add($row); 
        }

        return $arrList;		
    }
	
    public function PaginatedList(){
        $list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
        return $list;
    }	

    public function MetaTitle() {
        return $this->title;
    }
    
    
    public function RecentDeath($numRecords = 3){
        $list = DeathCertificate::get()
            ->sort('ID DESC')
            ->filter('Deleted', 0)
            ->limit($numRecords);
        return $list;
    }    
    
    public function Month($monthIndex = null){
        $months = MyHelper::Months();
        $month = $months[$monthIndex];
        if($month){
            return $month;
        }        
    }
    
    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'death', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'death');
        }        
        
    }    
}
