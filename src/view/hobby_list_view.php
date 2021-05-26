<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>



<div class="container">
<div class="border p-3 my-3">
<a class="btn btn-primary" href="#">add new hobby</a>
<a class="btn btn-primary" href="./list_users.php">Lista User</a>

</div>
<table class="table">
    <tr>
        <th>id</th>
        <th>Attività</th>
        <th width="1%" >action</th>
    </tr>
    <?php foreach($model->readHobby() as $hobby ){ ?>
        <tr>
        <td width="1%"><?= $hobby->getInteressiId() ?></td>
        <td><?= $hobby->getInteresse()?></td>
        <td class="text-nowrap">
        </td>
        </tr>
    <?php } ?>
        
</table>


</div>