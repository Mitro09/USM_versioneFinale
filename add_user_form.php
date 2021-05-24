<?php 
use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\HobbyModel;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './add_user_form.php';
$submit = 'aggiungi nuovo utente';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    /** Il form viene compilato "vuoto" */
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault();
    list($lastName,$lastNameClass,$lastNameClassMessage,$lastNameMessage) = ValidationFormHelper::getDefault();
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault();  
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();
    $hobbyModel = new HobbyModel();
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday'], $_POST['password']);
    $val = new UserValidation($user,'');
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');
    $emailValidation = $val->getError('email');
    $birthdayValidation = $val->getError('birthday');
    $passwordValidation = $val->getError('password');
    $hobby = $hobbyModel->readOneHobby($_POST['interessi']);


    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);
    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage) = ValidationFormHelper::getValidationClass($birthdayValidation);
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getValidationClass($passwordValidation);


    $user->setBirthday($birthday);

    if ($val->getIsValid()) {
        // TODO
        $userModel = new UserModel();
        $userModel->create($user);
        $hobbyModel->addHobby($user,$hobby);
        header('location: ./list_users.php');
    }
}

include 'src/view/add_user_view.php';
?>
