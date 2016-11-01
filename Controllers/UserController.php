<?php

class UserController extends View{
    public $email, $password, $passwordRepeat = '';
    public $request = null;
    public $layout = array();
    private $user = null;   
    public $conn = null;
    public $data = [];
        private $dbConfig = array(
        'host'      =>  'localhost',
        'dbName'    =>  'test',
        'user'      =>  'root',
        'password'  =>  ''
    );
    public function __construct(){}
    public function index(){
      //this can return user acvcount details in future development
        //return $this->view->render('index');        
    }
    
    public function clean_input($var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
    public function signup(){
        
        
        
        $conn = new mysqli($this->dbConfig['host'], $this->dbConfig['user'], $this->dbConfig['password'], $this->dbConfig['dbName']);
          // Create connection
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data = null;
            $email = $password = $passwordRepeat = '';
             
            empty($_POST['email']) ? $data['emailError'] = 'Email is required' : $email = $this->clean_input($_POST["email"]);
            
            empty($_POST['password']) ? $data['passwordError'] = 'Password is required' :  $password = $this->clean_input($_POST["password"]);
            
            empty($_POST['passwordRepeat']) ? $data['passwordRepeatError'] = 'Password repeat is required' : $passwordRepeat = $this->clean_input($_POST["passwordRepeat"]);
           
            if(empty($data)){
                $data['email'] = $email;
                
                 //check if passwords are the same
                if($password === $passwordRepeat){
                    
                    //see if email already exists
                    $data['email'] = $email;
                    $sql  = "SELECT * FROM users WHERE email = '$email'";
  
                    $results = $conn->query($sql);
                    if($results->num_rows == 0){
                        $passwordHash = md5($password);
                        $verifyToken = md5(date(DATE_RSS) . rand(0, 1000));
                        //$verifyToken = 'rrr';
                        $sql = "INSERT INTO users (email, passwordHash, name, isVerified, verifyToken) VALUES ('$email', '$passwordHash', null, null, '$verifyToken')";
                        
                        
                        if ($conn->query($sql) === TRUE) {
                            // send email on success of DB insert
                            
                           
                            
                            //$to = $data['email'];
                            $to = "root@localhost.com";
                            $subject = "Erasmus confirmation email.";
                           
                            $msg = "Please click following link to confirm sign up process.\n http://test.dev/user/confirmation?token=$verifyToken&email=$email";
                            $header = "From: info@test.dev";                    
                            $sentEmail = mail($to, $subject, $msg, $header);
                            // check if the email was sent
                            if($sentEmail){
                                $data['userConfirmation'] = 'Email with confirmation link has been sent to your email. Please confirm your account before Log In.';
                                return $this->view->render('login', $data);
                            }else{
                                $data['userConfirmation'] = "There was a problem with sending an Email.";
                                return $this->view->render('signup', $data);
                            }
                            
                            
                            
                            
                            
                            
                        } else {
                            //////evaluate and remove the message
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                        
                        
                        
                    }else{
                        $data['userError'] = 'Login Error';
                        return $this->view->render('signup', $data);
                    }
                    
                   
                }else{
                    $data['passwordsError'] = 'Passwords are not matching';
                    return $this->view->render('signup', $data);
                }
                
            }else{
                
                return $this->view->render('signup', $data);
            }
            
        }else{
            $data['postError'] = 'Form submitted with invalid method.';
        }
            
    
        

       
            
            
    
    
  
  

  








  
    return $this->view->render('signup');
  }
  public function login(){
      
       $conn = new mysqli($this->dbConfig['host'], $this->dbConfig['user'], $this->dbConfig['password'], $this->dbConfig['dbName']);
          // Create connection
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data = null;
            $email = $password = '';
             
            empty($_POST['email']) ? $data['emailError'] = 'Email is required' : $email = $this->clean_input($_POST["email"]);
            
            empty($_POST['password']) ? $data['passwordError'] = 'Password is required' :  $password = $this->clean_input($_POST["password"]);
               var_dump($data); 
            if(empty($data)){
                $data['email'] = $email;
         
                $sql  = "SELECT passwordHash FROM users WHERE email = '$email'";

                    $results = $conn->query($sql);
                //var_dump($row);

                
                    if($results->num_rows == 1){
                        $row = $results->fetch_assoc();
                       
                        
                        if($row['passwordHash'] = md5($password)){
                            //echo $row['passwordHash'];
                            //echo $password;
                            //$data
                            // here display welcome page + session
                            //return $this->view->render('index');
                            session_start();
                            $_SESSION['email'] = $email;
                            
                            Response::redirect('/', $data);
                            
                        }else{
                            $data['userError'] = 'Login Error';
                            return $this->view->render('login', $data);
                        }
                        
                        
                        
                   

                        $conn->close();
                        
                        
                        
                    }else{
                        $data['userError'] = 'Login Error';
                        return $this->view->render('login', $data);
                    }
                    
                   
              
                
            }else{
                 Response::redirect('/user/login');
                //return $this->view->render('login', $data);
            }
            
            
            
            
            
            
            
        }
      
      
      
      
    return $this->view->render('login', $data=null);
        
  }
    
    public function logout(){
        session_start();
        session_unset();

        // destroy the session
        session_destroy(); 
        Response::redirect('/user/login');
        
    }
    
    public function confirmation(){
          $conn = new mysqli($this->dbConfig['host'], $this->dbConfig['user'], $this->dbConfig['password'], $this->dbConfig['dbName']);
          // Create connection
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
      
        //check token validity with user's one saved in DB
        if(isset($_GET['token']) && !empty($_GET['token']) && isset($_GET['email']) && !empty($_GET['email'])){
            
            $token = $this->clean_input($_GET['token']);
            $email = $this->clean_input($_GET['email']);
                        
            $sql = "SELECT  verifyToken FROM users WHERE email = '$email'";
            
            $results = $conn->query($sql);
            if($results->num_rows == 1){
               
                $row = $results->fetch_assoc();
               
            
               
                if($token == $row['verifyToken']){
                    $sql = "UPDATE users SET isVerified = 1, verifyToken = null WHERE email = '$email'";
                      //$sql = "INSERT INTO users (email, passwordHash, name, isVerified, verifyToken) VALUES ('$email', '$passwordHash', null, null, '$verifyToken')";
                      if($conn->query($sql)){echo 'true';}else{echo 'false';}
                     if ($conn->query($sql) === TRUE) {
                         $data['verificationMsg'] = 'Verification completed.';
                          Response::redirect('/user/login');
                         //return $this->view->render('login', $data);
                     }else{
                         $data['verificationMsg'] = "Veryfication process failed on clearing is verified.";
                         return $this->view->render('signup', $data);
                     }
                    
                    
                }
            }else{
                echo 'outside results';
                $data['verificationMsg'] = "Veryfication process failed.";
                return $this->view->render('signup', $data);
            }
            
            
        }
             $conn->close();
    }
  
  
 
}