<?php 
use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './edit_user.php';
$submit = 'salva modifiche';

if($_SERVER['REQUEST_METHOD']==='GET'){

    // ottengo l'utente dal suo userId servirà anche per valorizzare il campo nascosto nella view
    $userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    $userModel = new UserModel();
    $user = $userModel->readOne($userId);
    
    /** Il form viene compilato "con le informazioni dell'utente" */
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault($user->getFirstName());
    list($lastName,$lastNameClass,$lastNameClassMessage,$lastNameMessage) = ValidationFormHelper::getDefault($user->getLastName());
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault($user->getEmail());
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault($user->getBirthday());    
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault($user->getPassword());
    
  
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $emailGet = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $userId = filter_input(INPUT_POST,'userId',FILTER_SANITIZE_NUMBER_INT);
    $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday'],$_POST['password']);
    // Imposto anche l'id che deve corrispondere a quello dell'utente che sto modificando
    $user->setUserId($userId);

    print_r($emailGet);
    //die();
    $val = new UserValidation($user,$emailGet);
    
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');
    $emailValidation = $val->getError('email');
    $birthdayValidation = $val->getError('birthday');
    $passwordValidation = $val->getError('password');
   

    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);
    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage) = ValidationFormHelper::getValidationClass($birthdayValidation);
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getValidationClass($passwordValidation);

    $user->setBirthday($birthday);

    if ($val->getIsValid()) {
        // TODO
        $userModel = new UserModel();
        $userModel->update($user);
        header('location: ./list_users.php');
    }

}

include 'src/view/add_user_view.php';
?>
