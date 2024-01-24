<?php 
 require_once "../config.php";
 switch (isset($_GET['page'])) {
    case 'contact':
        if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['phone']) && isset($_POST['message'])) {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $message=$_POST['message'];
        
            
        
            $q = "INSERT INTO contact_us(name, email, phone, message )VALUES ('$name','$email','$phone','$message')";
        
            $ResultMsg= mysqli_query($conn, $q);
            
            
        if ($ResultMsg) {
          
            echo json_encode(['status'=>'success','message'=>'successfully Submitted.Thank you']);
        }else{
            echo json_encode(['status'=>'warning','message'=>'Something Went wrong!!']);
        }
        
        
        }else {
           
                echo json_encode(['status'=>'warning','message'=>'fill all fields']);
        }
        break;
    
    default:
        # code...
        break;
 }
?>