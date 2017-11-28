<?php

class Application_Form_User extends Zend_Form
{
    public function init()
    {
        
        $this->addPrefixPath('Application_Form_Element', APPLICATION_PATH .'/forms/Element', 'ELEMENT');
        
        $this->setMethod('post');
        
        $this->addElement('text', 'name', array(
            'required'   => true,
            'validators' => array(
                array('validator' => 'alnum'),
		array('validator' => 'StringLength', 'options' => array(0, 50))
            )
        ));
        
        $this->addElement('identity', 'identity', array(
            'required'   => false,
        ));
        
        $this->addElement('gender', 'gender', array(
            'required'   => false,
        ));
        
        $this->addElement('year', 'y', array(
            'required'   => false,
        ));
        
        $this->addElement('month', 'm', array(
            'required'   => false,
        ));
        
        $this->addElement('day', 'd', array(
            'required'   => false,
        ));
        
        
        
        $this->addElement('submit', 'add', array(
            'label'    => '新規作成',
	));
        
        $this->addElement('submit', 'edit', array(
            'label'    => '編集',
	));
    }
}