<?php

class ContactController{
    public $request = null;
    public $layout = array();
    
    
    public function __construct(){
        
    }
    public function index(){
        return $this->view->render('contact');
              
        
    }
}