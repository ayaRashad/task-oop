<?php 
session_start();
require 'blog.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $tmpPath = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageType = $_FILES['image']['type'];
    $exArray = explode('.', $imageName);
    $extension = end($exArray);
    $FinalName = rand() . time() . '.' . $extension;
    $allowedExtension = ['png', 'jpg'];
    $desPath = './uploads/' . $FinalName;

// CODE ...... 
$title     = $_POST['title'];
$content   = $_POST['content'];


$blog = new blog($title,$content,$desPath);
$blog->createBlog();
}





##############################################################################
// require '../helpers.php';
// require '../dbConnection.php';

// # Fetch Department Data .... 
// $sql = "select * from departments";
// $op  = mysqli_query($con,$sql);





// if($_SERVER['REQUEST_METHOD'] == "POST"){

// // CODE ...... 
// $name     = Clean($_POST['name']);
// $email    = Clean($_POST['email']);
// $password = Clean($_POST['password']);
// $dep_id   = $_POST['dep_id'];


// # Validation ...... 
// $errors = [];

// # Validate Name 
// if(!validate($name,1)){
//     $errors['Name'] = "Field Required";
// }


// # Validate Email 
// if(!validate($email,1)){
//     $errors['Email'] = "Field Required";
// }elseif(!validate($email,2)){
//    $errors['Email'] = "Invalid Email Format";
// }


//  # Validate Password 
//  if(!validate($password,1)){
//     $errors['password'] = "Field Required";
// }elseif(!validate($password,3)){
//    $errors['password'] = "Length Must >= 6 chs";
// }


// # Validate dep_id  
// if(!validate($dep_id,4)){
//   $errors['department'] = "Invalid Department";
// }




//  # Validate image 
//  if(!validate($_FILES['image']['name'],1)){
//     $errors['Image'] = "Field Required";
// }else{
    
// $tmpPath    =  $_FILES['image']['tmp_name'];
// $imageName  =  $_FILES['image']['name'];
// $imageSize  =  $_FILES['image']['size'];
// $imageType  =  $_FILES['image']['type'];

// $exArray   = explode('.',$imageName);
// $extension = end($exArray);

// $FinalName = rand().time().'.'.$extension;

// $allowedExtension = ["png",'jpg'];

//    if(!validate($extension,5)){
//      $errors['Image'] = "Error In Extension";
//    }

// }

//    if(count($errors) > 0){
//        foreach ($errors as $key => $value) {
//            # code...
//            echo '* '.$key.' : '.$value.'<br>';
//        }
//    }else{

//     // db .......... 

//     $desPath = './uploads/'.$FinalName;

//    if(move_uploaded_file($tmpPath,$desPath)){
   

//     $password = md5($password);   // e10adc3949ba59abbe56e057f20f883e

//     $sql = "insert into users (name,email,password,image,dep_id) values ('$name','$email','$password','$FinalName',$dep_id)";
//     $op  = mysqli_query($con,$sql);

//      if($op){
//          echo 'Data Inserted';
//      }else{
//          echo 'Error Try Again'.mysqli_error($con);                      
//      }
//    }else{
//    echo 'Error In Uploading file';
//    }

//    }






// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Register</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>blog</h2>


 <?php 
     if(isset($_SESSION['Message'])){
         foreach($_SESSION['Message'] as $key => $val){
             echo '* '.$key." : ".$val.'<br>';
         }
     unset($_SESSION['Message']);
        }
 
 ?>



 <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post"  enctype="multipart/form-data" >

 

 <div class="form-group">
   <label for="exampleInputName">Title</label>
   <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter Name">
 </div>


 <div class="form-group">
   <label for="exampleInputEmail">Content</label>
   <input type="text"   class="form-control" id="exampleInputEmail1" name="content" aria-describedby="emailHelp" placeholder="Enter email">
 </div>

 <div class="form-group">
   <label for="exampleInputPassword">image</label>
   <input type="file"   class="form-control" id="exampleInputPassword1" name="image" placeholder="Password">
 </div>

 
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>