<?php

class UserController extends View{
    public $request = null;
    public $layout = array();
    private $user = null;
    
    
    public function __construct(){
     
    }
    public function index(){
        //return $this->view->render('index');
              
        
    }
    public function signup(){
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            //var_dump($_POST);
            
            //check if is form filled
            
            if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordRepeat'])){
                
                
                //echo('is set');
                
                
            
            
                
                
                // validate values
                
                //set user values to DB and object
                
            $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $passwordRepeat = mysqli_real_escape_string($conn, $_POST['passwordRepeat']);
                
                echo($email);
                
            }
            
            
            $user = new User();
       //     $this->view->user = 
            
            
        
        
      
        
        
      
    }
          return $this->view->render('signup');
    }
    public function login(){
         return $this->view->render('login');
        
    }
}