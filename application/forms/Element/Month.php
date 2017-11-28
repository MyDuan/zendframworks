<?php

class Application_Form_Element_Month extends Zend_Form_Element_Select {

    public function init() {

        for ($i = 1; $i <= 12; $i++) {
            $this->addMultiOption($i, $i);
        }
    }

}
