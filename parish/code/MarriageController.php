<?php
//
class MarriageController extends SiteController {
    #code   
    public static $allowed_actions = array(
        'index', 'add', 'AddMarriageForm', 'edit', 'EditMarriageForm', 'view', 'delete', 'doprint'
    );    
    
	protected $list;
	
    public function init(){
        $this->title = 'Marriage certificate';
        parent::init();
    }
    
    public function index()
    {
    	$this->list = $this->getAllMarriageCertificates();				
        return $this->renderWith(array('Marriage', 'App'));
    }    
    	
    public function add(){
        $this->title = "Add birth";
        $form = $this->AddMarriageForm();
        
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
    
    public function AddMarriageForm(){
    	$form = new AddMarriageForm($this, __FUNCTION__);		
    	return $form;
    }
    
    public function edit(){
        $id = (int)$this->request->param('ID');
		$birthCertificate = MarriageCertificate::get()->byID($id);
		if(!$birthCertificate){
		    return $this->httpError('404','Page not found');	
		}
		$this->title = 'Edit  / <small>'. $birthCertificate->Name.'</small>';
	
		$form = $this->EditMarriageForm();
		$form->setTemplate('AddMarriageForm');
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
    
    public function EditMarriageForm(){
    	$form = new EditMarriageForm($this, __FUNCTION__);		
    	return $form;
    
    }

    public function view(){
        $id = (int)$this->request->param('ID');
		$birthCertificate = MarriageCertificate::get()->byID($id);
		if(!$birthCertificate){
		    return $this->httpError('404','Page not found');	
		}
		$this->title = $birthCertificate->Name.' / <small> Marriage certificate</small>';
    	$data = array('MarriageCertificate' => $birthCertificate);
    	if($this->request->isAjax()){
    		return $this->customise($data )
    		->renderWith(array('Marriage_view'));
    	}
    	else{
    		return $this->customise($data )
    		->renderWith(array('Marriage_view','App'));
    	}        
    }    

    public function delete(){
        $id = (int)$this->request->param('ID');
		$birthCertificate = MarriageCertificate::get()->byID($id);
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
		$form = new MarriageSearchForm($this, __FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link());
        $form->setLegend('Search');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();		
		return $form;		 
	}
	
    public function doprint(){		
        $id = (int)$this->request->param('ID');
		$birthCertificate = MarriageCertificate::get()->byID($id);
		if(!$birthCertificate){
		    return $this->httpError('404','Page not found');	
		}
				
		$this->title = 'Marriage certificate';
		$data = array('MarriageCertificate' => $birthCertificate);
        return $this->customise($data )
			->renderWith(array('Marriage_print','Print'));	        
    }        
    
	
    public function getAllMarriageCertificates(){
        
		$sqlQuery = new SQLQuery();
		$sqlQuery->setFrom('MarriageCertificate');		

		$name = Convert::raw2sql($this->request->getVar('Name'));
        $blockNo = Convert::raw2sql($this->request->getVar('DOB'));
		if($name) {		
			$sqlQuery->addWhere("MarriageCertificate.Name LIKE '%$name%'");
		}
		if($dateOfMarriage = Convert::raw2sql($this->request->getVar('DateOfMarriage'))) {	
			$date = date('Y-m-d', strtotime($dateOfMarriage));
			$sqlQuery->addWhere("MarriageCertificate.DateOfMarriage = '$date'");
		}

        
		$sqlQuery->addWhere("MarriageCertificate.Deleted != '1'");
		
		$sqlQuery->setOrderBy('MarriageCertificate.ID DESC');
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
        $list = MarriageCertificate::get()
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
