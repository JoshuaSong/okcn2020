<?php 
if($_POST){ 
   $name=$_POST['name']; 
   $email=$_POST['email']; 
   $text=$_POST['text']; 
   $subject=$_POST['subject']; 
   
   //send email 
   mail("wtxinc@gmail.com", "$subject || Send by: $name || Email: $email", 
   $text, "From:" . $email); 
} 
?>