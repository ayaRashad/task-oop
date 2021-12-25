<?php 
require 'dbClass.php';
require 'validationClass.php';

class blog{
    private $title;
    private $content;
    private $image;
    

    function __construct($title,$content,$image){
      
       $this->title     = $title;
       $this->content   = $content;
       $this->image     = $image; 

    }


    public function createBlog(){
        // logic ..... 

        $Validator = new Validator();
        
        $this->title     = $Validator->Clean($this->title);
        $this->content = $Validator->Clean($this->content);
        $this->image    = $Validator->Clean($this->image);
        
        $errors = [];

        # Validate title .... 
        if(!$Validator->validate($this->title,1)){
            $errors['title'] = "Field Required";
        }elseif(!$Validator->validate($this->content,2)){
            $errors['title'] = "Invalid > 6";
        }


        # Validate content .... 
        if(!$Validator->validate($this->content,1)){
            $errors['content'] = "Field Required";
        }elseif(!$Validator->validate($this->content,2,20)){
            $errors['content'] = "Invalid >20";
        }

       # Check Errors ..... 
       if(count($errors)>0){
           $_SESSION['Message'] = $errors;
       }else{
         $dbObj = new database;


         $sql = "insert into blog (title,content,image) values ('$this->title','$this->content','$this->image')";
        
         $result = $dbObj->doQuery($sql);

         if($result){
             $message = "Data Inserted";
         }else{
             $message = "Error Try Again";
         }

           $_SESSION['Message'] = ['message' => $message];

       }



    }


}


?>
