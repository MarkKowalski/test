<?php

class UserController extends View{
    public $request = null;
    public $layout = array();
    private $user = null;
    
    public function __construct(){
     
    }
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
    $data = [];
    if($_SERVER['REQUEST_METHOD']!=='POST'){
        $data['postError'] = 'Form submitted with invalid method.';
    }
      //check if is form filled
      
            
      if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['passwordRepeat'])){
          $data['inputError'] = 'There are missing values'; 
      }
      //check if passwords are the same
    if($password === $passwordRepeat){
      $data['passwordError'] = 'Passwords are not matching';
    }
    
    
    
    
if (empty($data)) {
        $email = $password = $passwordRepeat = "";

    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);
    $passwordRepeat = clean_input($_POST["passwordRepeat"]);
  
  
  //see if email already exists
  $sql  = "SELECT * FROM users WHERE email = '" . $email . "'";
  
  $results = $conn->query($sql);
  if($results->mum_rows == 0){
  
  
  $passwordHash = md5($password);
    $sql = "INSERT INTO users (email, passwordHash) VALUES ('$email', '$passwordHash')";
  
  
  }
  
  // Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 
 
  
  
  
  
}

  
    return $this->view->render('signup');
  }
  public function login(){
    return $this->view->render('login', $data);
        
  }
  
  
 
}