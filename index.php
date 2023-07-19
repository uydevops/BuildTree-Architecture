<?php include('lib/database.php'); ?>
<?php include('lib/functions.php'); ?>




<?php



$categoryList = $db->query("SELECT * FROM category", PDO::FETCH_OBJ)->FetchAll();




?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sınırsız Kategori Mantığı</title>
</head>

<body>


    <div class="container">
        <h3 class="text-center mt-3">Kategori / Alt Kategori </h3>
        <div class="row">
            <div class="col-md-6  well">
                <h4 class="text-center">Kategori Ekle</h4>
                <hr>
                <form action="lib/category_db.php" method="post">
                    <div class="form-group">
                        <label for="">Kategori Adı</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Varsa Üst Kategori</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Yok</otpion>
                                <?php foreach ($categoryList as $Category) { ?>

                            <option value="<?php echo $Category->id; ?>"><?php echo $Category->title; ?></otpion>
                            <?php

                                } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary xl">Kaydet</button>
                    <button type="reset" class="btn btn-danger">İptal</button>
                </form>
            </div>

            <div class="col-md-6">
                <div class="col-md-11 well">
                    <h4 class="text-center">Kategori Listesi</h4>
                    <hr>
                    <?php
                    drawElements(buildTree($categoryList));
                    ?>
                </div>



            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>
<style>
    .well {
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 20px;
    }
</style>