<?php

    function getall(PDO $pdo, string | null $search = null)
    {

        $query = 'SELECT * FROM `users`';

        if (null !== $search) { 

            $query .= 'Where id LIKE :search OR username LIKE :search OR email LIKE :search';
        }

        if (null !== $orderby) {
            $query .= 'ORDER BY $orderBy';
        try {
        $res = $pdo->prepare($query);

        if (null !== $search) {
            $res->bindValue(':search', "%$search%");
        }

        $res->execute();
        return $res->fetchAll();
    }
}
    }
    function toggleEnabled(PDO $pdo, int $id): void
    {
        $res = $pdo->prepare(query:'UPDATE users SET enabled = NOT enabled WHERE id = :id');
        $res->bindParam(param: ':id', var: $id, type: PDO::PARAM_INT);
        $res->execute();

    }

    function delete(PDO $pdo, int $id): void
    {
        try {
            $res = $pdo->prepare(query: 'DELETE FROM users WHERE id = :id');
            $res->bindParam(param: ':id', var: $id, type: PDO::PARAM_INT);
            $res->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
}
    