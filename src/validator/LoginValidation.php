<?php

namespace sarassoroberto\usm\validator;

use sarassoroberto\usm\model\UserModel;

class LoginValidation{
   
    public const EMAIL_CORRECT_MSG = "Email giusta";
    public const EMAIL_ERROR_MSG = "Email non esistente";
    public const PASSWORD_CORRECT = "password corretta";
    public const PASSWORD_ERROR_MSG = "password sbagliata";


    private $email;
    private $password;
    private $errors = [];

    public function __construct($email,$password){
        $this->email = $email;
        $this->password = $password;
        $this->validate();

    }
    
    public function validate(){
        $this->errors['email']  = $this->validateEmail();
        $this->errors['password'] = $this->validatePassword();
    }
    

    private function validateEmail():?ValidationResult
    {
        $usermodel = new UserModel;
        $email = trim($this->email);
        if ($usermodel->checkEmail($email)){
            return new ValidationResult(self::EMAIL_CORRECT_MSG,true,$email);
        }
        else{
            return new ValidationResult(self::EMAIL_ERROR_MSG,false,$email);
        }
    } 
    
    private function validatePassword(){
        $usermodel = new UserModel;
        $password = trim($this->password);
        $email = trim($this->email);
        if ($usermodel->checkLogin($email,$password)){
            return new ValidationResult(self::PASSWORD_CORRECT,true,$password);
        }
        else{
            return new ValidationResult(self::PASSWORD_ERROR_MSG,false,$password);
        }
    }


    public function getIsValid(){
        $this->isValid = true;
        foreach ($this->errors as $validationResult) {
            $this->isValid = $this->isValid && $validationResult->getIsValid();
        }
        return $this->isValid;
    }

    public function getErrors()
    {
        return $this->errors; 
    }

    
    /**
     * $userValidation->getError('lastName');
     * @var ValidationResult $errorKey Chiave associativa che contiene un ValidationResult corrispondente
     */
    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }

}