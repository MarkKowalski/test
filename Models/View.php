
<?php
class View{
        public $data = array();
    
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }
    
        public function render($tplname, $data = null)
    {
        // get the path to file
        $path = 'views/' . $tplname . '.php';
        // get data variables if supplied
               if($data != null)
        {
            extract($data);
        }
      
            ob_start();
            include $path;
             $content = ob_get_contents();
            
            ob_end_clean();
        return $content;
    }
    
    
}