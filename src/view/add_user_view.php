
    <?php include './src/view/head.php' ?> 
    <?php include './src/view/header.php' ?>
    
    <div class="container">
        <!-- <form action="add_user_form.php" method="POST"> -->
        <form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input value="<?= $firstName ?>" 
                      class="form-control <?= $firstNameClass ?>"  
                      name="firstName"  
                      type="text">

               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div> 
            </div>

            <div class="form-group">
               <label for="">Cognome</label>
               <!-- is-invalid  -->
               <input
                value="<?= $lastName ?>" 
                class="form-control <?= $lastNameClass ?>"  
                name="lastName"  
                type="text">
               <div class="<?= $lastNameClassMessage ?>">
                  <?= $lastNameMessage ?>
               </div> 
            </div>


            <div class="form-group">
               <label for="">email</label>
               <!-- is-invalid  -->
               <input
                value="<?= $email ?>" 
                class="form-control <?= $emailClass ?>"  
                name="email"  
                type="text">
               <div class="<?= $emailClassMessage ?>">
                  <?= $emailMessage ?>
               </div> 
            </div>


             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control <?= $birthdayClass ?>"
                 value="<?= $birthday ?>"
                 name="birthday" 
                 type="date">
                <div class="<?= $birthdayClassMessage ?>">
                  <?= $birthdayMessage ?>
               </div> 
             </div>

             <div class="form-group">
                <label for="">password</label>
                <input class="form-control <?= $passwordClass ?>" 
                 value="<?= $password ?>" 
                 name="password" 
                 type="text">
                <div class="<?= $passwordClassMessage ?>">
                  <?= $passwordMessage ?>
               </div> 
             </div>


             


            <!-- quando gli utenti vengono creati non hanno ancora un id, quindi non ha bisogno del campo nascosto -->
             <?php if(!isset($userId)) { ?>

               <div class="form-group">
                <label for="">interesse</label>
                <select name="interessi">
                   <option value = "">--scegli interesse--</option>
                   <?php foreach ($hobbyModel->readHobby() as $interesse){
                      $output=$interesse->getInteresse();
                      $id=$interesse->getInteressiId()?>
                     <option value="<?=$id?>"><?=$output?></option>
                   <?php } ?>    
                </select>
             </div>

             <?php } else { ?>
               <!-- invece quando sono in modifica di un utente
               <div class="form-group mt-4 p-4 border border-danger">
               <label class="text-danger">
                  Questo campo è visibile motivi didattici in realtà dovrebbe essere un <b>input[type=hidden]</b> <br> 
                  serve a inviare via POST, il valore dello <b>userId</b> dell'istanza di User da aggiornare sul database<br>
               </label>
               <label class="d-block text-bold">id dell'utente che sto modificando</label>-->
               <input type="hidden" name="userId" value="<?= $userId ?>" class="form-control">
             <!--</div>-->

             <a class="btn btn-primary" href="./add_user_hobby.php">add new hobby</a>
             <?php } ?>
             
             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>
        </form>
    </div>
    
</body>
</html>