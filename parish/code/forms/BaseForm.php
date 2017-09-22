<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/13/2016
 * Time: 5:41 PM
 */
abstract class BaseForm extends Form {
    public function __construct(
        $controller,
        $name,
        FieldList $fields = null,
        FieldList $actions = null,
        $validator = null
    ) {
        if (!$fields) {
            $fields = $this->getFormFields();
        }
        if (!$actions) {
            $actions = $this->getFormActions();
        }
        if (!$validator) {
            $validator = $this->getFormValidator();
        }
        parent::__construct($controller, $name, $fields, $actions, $validator);
    }

    public function getFormFields() {
        return FieldList::create();
    }

    public function getFormActions() {
        return FieldList::create(
            FormAction::create('doSubmit', 'Submit')->setUseButtonTag(true)        	
        );
    }

    public function getFormValidator() {
        return RequiredFields::create();
    }


    abstract protected function doSubmit($data, $form, $request);
}