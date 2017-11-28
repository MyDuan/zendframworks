<?php

class Application_Form_Element_Identity extends Zend_Form_Element_Select {

    public function init() {

        $this->addFilter('StringTrim');
        $this->addMultiOption(1, '学生');
        $this->addMultiOption(2, 'スタッフ');
        $this->addMultiOption(3, '教授');
    }
}
