<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRegistry() {
        $registry = $this->getContainer();
        Zend_Registry::setInstance($registry);
    }
    
    protected function _initDb() {

        $resource = $this->getPluginResource('db');
        $db = $resource->getDbAdapter();
        return $db;
    }
}

