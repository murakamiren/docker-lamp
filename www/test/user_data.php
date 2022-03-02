<?php
    require_once("../assets/php/dbInfo.php");

    try {
        $dbh = new PDO(dsn, user, ps);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM tbl_user";
        $prepareFetch = $dbh->prepare($sql);
        $prepareFetch->execute();

        $data = $prepareFetch->fetchAll(PDO::FETCH_ASSOC);

        $json_data = json_encode($data);

        echo $json_data;

    } catch (PDOException $e) {
        exit($e->getMessage());
    } finally {
        $dbh = null;
    }
?>