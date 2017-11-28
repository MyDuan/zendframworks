<?php

class Application_Form_Element_Year extends Zend_Form_Element_Select {

    public function init() {

        for ($i = date('Y') - 5; $i <= date('Y') + 5; $i++) {
            $this->addMultiOption($i, $i);
        }
    }
}
