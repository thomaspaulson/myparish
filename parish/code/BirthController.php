<?php
//
class BirthController extends SiteController {
    #code   
    public static $allowed_actions = array(
        'index', 'add', 'AddBirthForm', 'edit', 'EditBirthForm', 'view', 'delete', 'doprint'
    );    
    
	protected $list;
	
    public function init(){
        $this->title = 'Birth certificate';
        parent::init();
    }
    
    public function index()
    {
    	$this->list = $this->getAllBirthCertificates();				
        return $this->renderWith(array('Birth', 'App'));
    }    
    	
    public function add(){
        Requirements::css('parish/css/jquery-ui-1.12.1.custom/jquery-ui.css');
        Requirements::javascript('parish/css/jquery-ui-1.12.1.custom/jquery-ui.js');
        $this->title = "Add birth";
        $form = $this->AddBirthForm();
        
		$backURL = urldecode($this->getRequest()->getVar('BackURL'));
		$redirectURL = $form->Fields()->fieldByName('RedirectURL');
		$redirectURL->setValue($backURL);
        
//		if($form->Fields()->fieldByName('Date')){
//			$dateField = $form->Fields()->fieldByName('Date');
//			$dateField->setValue(date('d-m-Y'));
//        }
        
        
        $data = array('Form' => $form);
        return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    }
    
    public function AddBirthForm(){
    	$form = new AddBirthForm($this, __FUNCTION__);		
    	return $form;
    }
    
    public function edit(){
        Requirements::css('parish/css/jquery-ui-1.12.1.custom/jquery-ui.css');
        Requirements::javascript('parish/css/jquery-ui-1.12.1.custom/jquery-ui.js');
        
        $id = (int)$this->request->param('ID');
        $birthCertificate = BirthCertificate::get()->byID($id);
        if(!$birthCertificate){
            return $this->httpError('404','Page not found');	
        }
        $this->title = 'Edit  / <small>'. $birthCertificate->Name.'</small>';

        $form = $this->EditBirthForm();
        $form->setTemplate('AddBirthForm');
        if($birthCertificate->exists() && $form){
                $form->loadDataFrom($birthCertificate);
        }

        if($birthCertificate->DOB){
                $dob = $form->Fields()->fieldByName('DOB');
                $dob->setValue(date('d-m-Y',strtotime($birthCertificate->DOB)));
        }	

        if($birthCertificate->BaptisedDate){
                $baptisedDate = $form->Fields()->fieldByName('BaptisedDate');
                $baptisedDate->setValue(date('d-m-Y',strtotime($birthCertificate->BaptisedDate)));
        }

        if($birthCertificate->Date){
                $date = $form->Fields()->fieldByName('Date');
                $date->setValue(date('d-m-Y',strtotime($birthCertificate->Date)));
        }

        $backURL = urldecode($this->getRequest()->getVar('BackURL'));
        $redirectURL = $form->Fields()->fieldByName('RedirectURL');
        $redirectURL->setValue($backURL);


        $data = array('Form' => $form);
        return $this->customise($data)->renderWith(array('Generic_form', 'App'));
		
    }
    
    public function EditBirthForm(){
    	$form = new EditBirthForm($this, __FUNCTION__);		
    	return $form;
    
    }

    public function view(){
        $id = (int)$this->request->param('ID');
		$birthCertificate = BirthCertificate::get()->byID($id);
		if(!$birthCertificate){
		    return $this->httpError('404','Page not found');	
		}
		$this->title = $birthCertificate->Name.' / <small> Birth certificate</small>';
    	$data = array('BirthCertificate' => $birthCertificate);
    	if($this->request->isAjax()){
    		return $this->customise($data )
    		->renderWith(array('Birth_view'));
    	}
    	else{
    		return $this->customise($data )
    		->renderWith(array('Birth_view','App'));
    	}        
    }    

    public function delete(){
        $id = (int)$this->request->param('ID');
		$birthCertificate = BirthCertificate::get()->byID($id);
		if(!$birthCertificate){
		    return $this->httpError('404','Page not found');	
		}		
        $birthCertificate->Deleted = 1;
		$birthCertificate->write();
		
		$backURL = urldecode($this->getRequest()->getVar('BackURL'));//exit($backURL );
        if($backURL){
        	return $this->redirect($backURL.'&message=deleted');
        }
        
		return $this->redirect($this->Link().'?message=deleted');
    }    
    
	public function SearchForm(){
		$form = new BirthSearchForm($this, __FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link());
        $form->setLegend('Search');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();		
		return $form;		 
	}
	
    public function doprint(){		
        $id = (int)$this->request->param('ID');
		$birthCertificate = BirthCertificate::get()->byID($id);
		if(!$birthCertificate){
		    return $this->httpError('404','Page not found');	
		}
				
		$this->title = 'Birth certificate';
		$data = array('BirthCertificate' => $birthCertificate);
        return $this->customise($data )
			->renderWith(array('Birth_print','Print'));	        
    }        
    
	
    public function getAllBirthCertificates(){
        
		$sqlQuery = new SQLQuery();
		$sqlQuery->setFrom('BirthCertificate');		
		

		$name = Convert::raw2sql($this->request->getVar('Name'));
        $blockNo = Convert::raw2sql($this->request->getVar('DOB'));
		
		if($name) {		
			$sqlQuery->addWhere("BirthCertificate.Name LIKE '%$name%'");
		}
		
		if($dateOfBirth = Convert::raw2sql($this->request->getVar('DateOfBirth'))) {		
			$date = date('Y-m-d', strtotime($dateOfBirth));
			$sqlQuery->addWhere("BirthCertificate.DateOfBirth = '$date'");
		}
		
		$sqlQuery->addWhere("BirthCertificate.Deleted != '1'");
		
		$sqlQuery->setOrderBy('BirthCertificate.ID DESC');
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
    
    public function RecentBrith($numRecords = 3){
        $list = BirthCertificate::get()
            ->sort('ID DESC')
            ->filter('Deleted', 0)
            ->limit($numRecords);
        return $list;
    }    
    
    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'birth', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'birth');
        }        
        
    }    
}
