<?php
class EditBirthForm extends BaseForm{

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
        
        $fields->push(TextField::create('Name','Name')->setAttribute('placeholder', 'Name')); 
        $fields->push(DropdownField::create('Gender', 'Gender', array('m'=>'son','f'=>'daugther'))->setEmptyString('select'));
        $fields->push(TextField::create('FathersName','Fathers name')->setAttribute('placeholder', 'Father\'s Name')); 		        
        $fields->push(TextField::create('MothersName','Mothers name')->setAttribute('placeholder', 'Mother\'s Name'));
        $fields->push(TextField::create('Parish','Parish name'));
        $fields->push(TextField::create('Location','At'));
        $fields->push(TextField::create('DOB','Date of birth')->setAttribute('placeholder', 'dd-mm-yyyy'));
	$fields->push(TextField::create('BaptisedAt','Parish name'));
        $fields->push(TextField::create('BaptisedDate','On (date)')->setAttribute('placeholder', 'dd-mm-yyyy'));        
        $fields->push(TextField::create('Priest','By'));
        $fields->push(TextField::create('GodFather','God Father')->setAttribute('placeholder', 'God Father'));
        $fields->push(TextField::create('GodFatherParish','God Father Parish'));
        $fields->push(TextField::create('GodMotherRelation','relation')->setAttribute('placeholder', 'relation'));
        $fields->push(TextField::create('GodMother','God Mother')->setAttribute('placeholder', 'God Mother'));        
        $fields->push(TextField::create('GodMotherParish','God Mother Parish')); 
        $fields->push(CheckboxField::create('PrivatelyBaptised','(privately)'));
	$fields->push(HiddenField::create('ID','ID'));		
        
		
        $fields->push(TextField::create('Place','Place'));
        $fields->push(TextField::create('Date','Date')->setAttribute('placeholder', 'dd-mm-yyyy'));
        $fields->push(TextField::create('ParishPriest','Priest Name'));							

        $fields->push(HiddenField::create('RedirectURL','RedirectURL'));		

        return $fields;
    }

    public function getFormActions() {
        $actions = parent::getFormActions();
        $actions->first()->setTitle('Edit');
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
        
    	$id = (int)$data['ID'];
    	$birthCertificate = BirthCertificate::get()->byID($id);    	
    	$form->saveInto($birthCertificate);
		
    	$birthCertificate->write();

        $redirectUrl = urldecode($data['RedirectURL']);
        if($redirectUrl){
            return $this->getController()->redirect(
                            $redirectUrl
            );
        }

        if($link = $birthCertificate->getLink('view')){
                return $this->controller->redirect($link);
        }		
    }	        
}
