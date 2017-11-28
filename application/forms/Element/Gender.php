
<?php

class Application_Form_Element_Gender extends Zend_Form_Element_Radio {

    public function init() {
        $this->addMultiOption(0, '男性');
        $this->addMultiOption(1, '女性');
    }
}
