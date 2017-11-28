<?php

class Application_Form_Element_Day extends Zend_Form_Element_Select {

    public function init() {

        for ($i = 1; $i <= 31; $i++) {
            $this->addMultiOption($i, $i);
        }
    }

}
