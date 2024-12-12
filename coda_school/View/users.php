<div class="mt-2 mb-2">
<h1 class="texte-center">Liste des utilisateurs</h1>
</div>
<div class="row">
<table class="table">
    <thead>
    <tr>
        <th scope="col">
            <a href="index.php?component=users">   
                ID
            </a> 
        </th>
        <th scope="col">Username</th>
        <th scope="col">Actif</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>

         <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>

            <td>
                <a href="index.php?component=users=toggle_enabled&id=<?php echo $user['id']; ?> "
                >
                <i
                        class="fa-solid <?php echo ($user['enabled'])
                            ? 'fa-check text-success'
                            : 'fa-xmark text-danger';
                        ?>"
                >
                </i>
                </a>
            </td>
            <td>
            


                <a href="index.php?component=users&action=delete&id=<?php echo $user['id']; ?>"
                onclick="return confirm('Etes vous sur de vouloir supprimer ?');"
                >
                    
                    <i class="fa-solid fa-trash text-danger"></i>
    </a>
    <a href="index.php?component=user&action=edit&id=12">
        <i class="fa-solid fa-pen ms-2"></i>
        </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
    </div>