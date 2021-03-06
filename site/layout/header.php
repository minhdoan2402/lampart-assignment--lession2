<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../upload/favicon.ico" type="image/x-icon" class="ico">
    <link rel="stylesheet" href="public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/vendor/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Quản lý sản phẩm</title>
</head>

<body>
    <?php global $c; ?>
    <div class="container" style="margin-top:20px;">
        <a href="?c=product" class="<?= $c == 'product' ? 'active' : '' ?> btn btn-info">Products</a>
        <a href="?c=category" class="<?= $c == 'category' ? 'active' : '' ?> btn btn-info">Category</a>
        <div style="height:40px; margin-top:20px">
            <div class="error bg-danger container-fluid text-center"></div>
            <div class="message bg-primary container-fluid text-center"></div>
        </div>

        <?php
        $message = "";
        $message_type = "";
        if (!empty($_SESSION['success'])) :
            $message = $_SESSION['success'];
            unset($_SESSION['success']);
            $message_type = "success";
        elseif (!empty($_SESSION['error'])) :
            $message = $_SESSION['error'];
            unset($_SESSION['error']);
            $message_type = "danger";
        endif
        ?>
        <div class="alert alert-<?= $message_type ?>" role="alert"><?= $message ?></div>