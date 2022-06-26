
<?php 



class User {
protected $name, $lastname, $email, $date, $gender, $password, $re_password;

public function __construct($name, $lastname, $email, $date, $gender, $password, $re_password)
{
    $this->name=$name;
    $this->lastname=$lastname;
    $this->email=$email;
    $this->gender=$gender;
    $this->password=$password;
    
    
}




}
    