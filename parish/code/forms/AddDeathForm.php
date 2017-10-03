<?php
class AddDeathForm extends BaseForm{

    public function __construct(
        $controller,
        $name,
        FieldList $fields = null,
        FieldList $actions = null,
        $validator = null
    ) {
        parent::__construct($controller, $name, $fields, $actions, $validator);
        $this->addExtraClass('js-places-search-form');	       
    }

    public function getFormFields() {

        $fields = parent::getFormFields();		
        $fields->push(TextField::create('Year','Year'));
        $fields->push(TextField::create('RegNO','Reg NO'));
        $fields->push(TextField::create('PageNO','Page NO'));
		
        $fields->push(TextField::create('YearOD','Date of Death')->setAttribute('placeholder', 'yyyy'));
        $monthField = DropdownField::create('MonthOD','Date of Death', MyHelper::Months())
                                        ->setEmptyString('(month)');;
        $fields->push($monthField);
        $fields->push(TextField::create('DateOD','Date of Death')->setAttribute('placeholder', 'dd'));
        $fields->push(TextField::create('TimeOD','Date of Death')->setAttribute('placeholder', 'hh:mm'));
        $fields->push(DropdownField::create('TimeStamp', 'AM/PM', array('am' => 'am', 'pm' => 'pm')));
        $fields->push(TextField::create('Age','Age'));		
        $fields->push(DropdownField::create('Gender', 'Gender', array('m'=>'son','f'=>'daugther'))->setEmptyString('select'));
        $fields->push(TextField::create('Name','Name')->setAttribute('placeholder', 'Name')); 		
        $fields->push(TextField::create('FathersName','Fathers name')->setAttribute('placeholder', 'Father\'s Name')); 		        
        $fields->push(TextField::create('MothersName','Mothers name')->setAttribute('placeholder', 'Mother\'s Name'));
	$fields->push(TextField::create('SpouseName','Mothers name')->setAttribute('placeholder', 'Spouse\'s Name'));		
        $fields->push(DropdownField::create('Solemnity','Solemnity',array('with' => 'with','without' => 'without')));
        $fields->push(DropdownField::create('Ecclesiatical','Ecclesiatical',array('with' => 'with','without' => 'without')));
        $fields->push(TextField::create('Parish','Parish name'));
	$fields->push(TextField::create('Priest','By'));
        $fields->push(TextField::create('Cemetery','Cemetery'));
        $fields->push(TextField::create('DateBuried','Date')->setAttribute('placeholder', 'dd'));        
        $monthBuriedField = DropdownField::create('MonthBuried','Month', MyHelper::Months())
                                        ->setEmptyString('(month)');        
        $fields->push($monthBuriedField);        
        //$fields->push(TextField::create('MonthBuried','Month')->setAttribute('placeholder', 'mm'));
        $fields->push(TextField::create('YearBuried','Year')->setAttribute('placeholder', 'yyyy'));
        $fields->push(TextField::create('DeathCause','Death Cause'));

        $fields->push(TextField::create('Place','Place'));
        $fields->push(TextField::create('Date','Date')->setAttribute('placeholder', 'dd-mm-yyyy'));
        $fields->push(TextField::create('ParishPriest','Priest Name'));

        $fields->push(HiddenField::create('RedirectURL','RedirectURL'));		

        return $fields;
    }

    public function getFormActions() {
        $actions = parent::getFormActions();
        $actions->first()->setTitle('Create');
        $cancel = FormAction::create('doCancel', 'Cancel')->setUseButtonTag(true);
        $cancel->addExtraClass('secondary');
        $actions->push($cancel);
        return $actions;
    }

    public function getFormValidator() {
        return RequiredFields::create(array('Status','Type'));
    }

    /**
     * @param $data array Data from request vars
     * @param $form ContactForm The form instance handling the request
     * @param $request SS_HTTPRequest The HTTP Request object
     */
    public function doSubmit($data, $form, $request) {
		//Debug::show($data); exit();
		//$email = $data['Email'];
        $deathCertificate = DeathCertificate::create();
		
        $year = $data['YearOD'];
        $month = $data['MonthOD'];
        $date = $data['DateOD'];
        $time = $data['TimeOD'];	
		// Death date
	$dateofDeath = MyHelper::DateTime($year, $month, $date, $time);
        if($dateofDeath){
            $deathCertificate->DOD = $dateofDeath->format('Y-m-d h:i');
        }

        //buried date
        $bdate = $data['DateBuried'];
        $bmonth = $data['MonthBuried'];
        $byear = $data['YearBuried'];
		
	$buriedDate = MyHelper::DateTime($byear, $bmonth, $bdate);
        if($buriedDate){
            $deathCertificate->BuriedDate = $buriedDate->format('Y-m-d');
        }    
		 
        $form->saveInto($deathCertificate);		
        $deathCertificate->write();

        if($link = $deathCertificate->getLink('view')){
                return $this->controller->redirect($link);
        }

        $redirectUrl = urldecode($data['RedirectURL']);
        return $this->getController()->redirect(
                        $redirectUrl
        );		
    }	  
    
}
