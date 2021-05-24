<?php include './src/view/head.php' ?> 
    <?php include './src/view/header.php' ?>
    
    <div class="container">
        <!-- <form action="add_user_form.php" method="POST"> -->
        <form class="mt-4" action="<?= $action ?>" method="POST">
            
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
                <label for="">password</label>
                <input class="form-control <?= $passwordClass ?>" 
                 value="<?= $password ?>" 
                 name="password" 
                 type="text">
                <div class="<?= $passwordClassMessage ?>">
                  <?= $passwordMessage ?>
               </div> 
             </div>

             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>