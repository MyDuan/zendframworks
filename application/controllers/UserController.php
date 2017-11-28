<?php

class UserController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $db = Zend_Registry::get('db');
        $user = new Application_Model_User($db);
        $result = $user->fetchAll();
        $this->initView()->result = $result;
        
        $class = new Application_Model_Class($db);
        $result_class = $class->fetchAll();
        $this->initView()->class = $result_class;
    }
    
    public function addAction()
    {
        $request = $this->getRequest();
        
        $form = new Application_Form_User();
        $this->initView()->form = $form;
        
        if($request->isPost()){
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                
                $db = Zend_Registry::get('db');
                $user = new Application_Model_User($db);
                $request = $this->getRequest();
            
                $set = array (
                    "name" => $request->name,
                    "gender" => $request->gender,
                    "identity" => $request->identity,
                );
                $user->insert($set);
                $this->_redirect('/user/index');
                
            } else {
                $form->populate($formData);
            }
        }
    }
    
    public function editAction()
    {
        $request = $this->getRequest();
        $id = $request->uno;
        
        $defult = $this->getDefultForm();
        $form = new Application_Form_User();
        $form->setDefaults($defult);
        $this->initView()->form = $form;
        
        $db = Zend_Registry::get('db');
        $user = new Application_Model_User($db);
        
        if($request->isPost()){
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $adapter = $user->getAdapter();
                $set = array (
                    "name" => $request->name,
                    "gender" => $request->gender,
                    "identity" => $request->identity,
                );
                $where = $adapter->quoteInto("id=?", $id);
                $user->update($set, $where);
          
                $this->_redirect('/user/index');
            } else{
                $form->populate($formData);
            }
        }
    }
    
    public function deleteAction()
    {
        $request = $this->getRequest();
        var_dump($request);
        $id = $request->uno;
        var_dump($id);
        $db = Zend_Registry::get('db');
        $user = new Application_Model_User($db);
        $adapter = $user->getAdapter();
        $where = $adapter->quoteInto("id=?", $id);
        $user->delete($where);
        $this->_redirect('/user/index');
    }
    
    protected function getDefultForm(){
        
        $request = $this->getRequest();
        $id = $request->uno;
        
        $db = Zend_Registry::get('db');
        $user = new Application_Model_User($db);
        $select = $user->select()->where('id = ?', $id);
        $userdata = $user->fetchRow($select)->toArray();
        
        $defaults = $userdata;
        return $defaults;
    }
}