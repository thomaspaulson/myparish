<?php
class MarriageSearchForm extends BaseForm{	
	

    public function __construct(
        $controller,
        $name,
        FieldList $fields = null,
        FieldList $actions = null,
        $validator = null
    	){
        parent::__construct($controller, $name, $fields, $actions, $validator);
        $this->addExtraClass('js-places-search-form');

    }

    public function getFormFields(){
        $fields = parent::getFormFields();
        $fields->push(TextField::create('GroomName', 'Name')->setAttribute('placeholder', 'Groom'));
        $fields->push(TextField::create('BrideName', 'Name')->setAttribute('placeholder', 'Bride'));
        $fields->push(TextField::create('DOMarriage', 'Date of Marriage')->setAttribute('placeholder', 'dd-mm-yyyy'));        
        return $fields;
    }

    public function getFormActions(){
        $actions = parent::getFormActions();
        $actions->first()->setTitle('Search');
        return $actions;
    }

    public function getFormValidator(){
        return RequiredFields::create();
    }
	
    /**
     * @param $data array Data from request vars
     * @param $form ContactForm The form instance handling the request
     * @param $request SS_HTTPRequest The HTTP Request object
     */
    public function doSubmit($data, $form, $request) {
        
    }
		
}
