<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>
    
    <div class="container">
        <!-- <form action="add_user_form.php" method="POST"> -->
        <form class="mt-4" action="<?= $action ?>" method="POST">
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

            <?php if(isset($userId)) {?>
             <div class="form-group mt-4 p-4 border border-danger">
               <label class="text-danger">
                  Questo campo è visibile motivi didattici in realtà dovrebbe essere un <b>input[type=hidden]</b> <br> 
                  serve a inviare via POST, il valore dello <b>userId</b> dell'istanza di User da aggiornare sul database<br>
               </label>
               <label class="d-block text-bold">id dell'utente che sto modificando</label>
               <input type="text" name="userId" value="<?= $userId ?>" class="form-control">
             </div>
               <?php } ?>
             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>   
        </form>