<?php
  //classes....class data type. A class a blueprint for an object, a blue print for a datatype that describes what properties and what functions and object of that property will have based on that class and this is called INSTANTIATING A CLASS 
  //the class function is used to change the value of a private value stored in the object because the value cannot be accessed outside the property unlike the Public property.
    //best practice to update values in the claas is to make them private, and using of special calss functions to inform some form of validations using the getter and settetr function
    class User {
        // public $email; //public property called email
        // public $name; //public property called name

        private $email;
        private $name;
        //the constuctor function can access the differnt values and set it equal to something. The $this property creates a new user based of the above class.
        public function  __construct($name, $email){
            // $this ->email = "maryam@gmail.com";
            // $this ->name = "Maryam";
            $this ->email = $email;
            $this ->name = $name;
        } 

        public function login(){
            echo $this ->email.'the user logged in';
        }

        public function getName(){
            return $this ->name;
        }

        public function setName($name){
            if(is_string($name) && strlen($name) >2){
                 $this->name = $name;
            return "name has been updated to $name";
            } else {
                return "not a valid name";
            }
        }
    }

    // $userOne = new User();//creating a new object based on the user class created above i.e the $userOne variable can access the class User created above. This is called instantiating a class
    //     //to access the different properties and functions
    // $userOne -> login();
    // echo $userOne -> name;

    $userTwo = new User('Maryam', "maryam@gmail.com");
     echo $userTwo ->setName("mario");
        echo $userTwo ->getName();
    //  echo $userTwo->name;
    //  $userTwo -> login(); //to echo function, use the variable object to access the value and function in the class  
?> 