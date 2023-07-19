<?php

include "database.php";


$prepare = $db->prepare("INSERT INTO category  SET title=?,parent_id=?");
$insert = $prepare->execute(array($_POST["title"], $_POST["parent_id"]));
if ($insert) {
    header("Location:../index.php?status=ok");
} else {
    header("Location:../index.php?status=no");
}
