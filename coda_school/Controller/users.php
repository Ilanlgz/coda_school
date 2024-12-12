<?php
    require "Model/users.php";
    /**
     * @var PDO $pdo
     */

    if(
        isset($_GET['action']) &&
        isset($_GET['id']) &&
        is_numeric($_GET['id'])
    ){
        $id = cleanString($_GET['id']);

        switch($_GET['action']){
            case 'toggle_enabled':
                toggleEnabled($pdo, $id);
                header('Location: index.php?component=users');
                break;

            case 'delete':
                $delete = delete($pdo, $id);
                if(!empty($delete)) {
                    $errors[] = 'Impossible de supprimer l\'utilisateur il est encore lié à une personne ';
                } else {
                    header('Location: index.php?component=users');
                }
                break;
        }
		$action = cleanString($_GET['id']);
    	toggleEnabled($pdo, $id);
    	header(header:'Location: index.php?component=users');
    }
    $search = isset($_POST['search']) ? ($_POST['search']): null;
    $orderby = isset($_POST['orderby']) ? ($_POST['orderby']): null;
    $users = getAll($pdo);
    require "View/users.php";
?>
