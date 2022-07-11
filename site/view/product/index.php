<?php require 'layout/header.php' ?>
<form action="" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
            value="<?= $_GET['search'] ?? '' ?>">
        <button class="btn btn-danger">Tìm</button>
    </label>
</form>
<div class="bg-white clearfix">
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newProductModal">
        <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>ProductID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Image</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $idx = 1;
        foreach ($products as $product) : ?>
        <tr>
            <td><?= $idx ?></td>
            <td id="product-<?= $product->ProductID ?>"><?= $product->ProductID ?></td>
            <td id="product-name-<?= $product->ProductID ?>"><?= $product->ProductName ?></td>
            <td class="d-none" id="product-category-id-<?= $product->ProductID ?>"><?= $product->Category->CategoryID ?>
            </td>
            <td id="product-category-<?= $product->ProductID ?>"><?= $product->Category->CategoryName ?></td>
            <td id="product-image-<?= $product->ProductID ?>"><img class="img-product"
                    src="../upload/<?= $product->Featured_image ?>" alt="<?= $product->ProductName ?>"></td>
            <td><button type="button" data-product-id="<?= $product->ProductID ?>"
                    class="product-edit-button btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editProductModal">
                    <i class="fas fa-edit"></i>
                </button></td>

            <td>
                <button type="button" data-product-id="<?= $product->ProductID ?>"
                    class="product-delete-button btn-sm btn-primary" data-toggle="modal"
                    data-target="#deleteProductModal">
                    <i class="fa-solid fa-circle-minus"></i>
                </button>
            </td>
            <td>
                <button type="button" data-product-id="<?= $product->ProductID ?>"
                    class="product-copy-button btn-sm btn-primary" data-toggle="modal" data-target="#copyProductModal">
                    <i class="fa-solid fa-copy"></i>
                </button>
            </td>
            <td>
                <button type="button" data-product-id="<?= $product->ProductID ?>"
                    class="product-detail-button btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#productDetailModal">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>

        </tr>
        <?php
            $idx += 1;
        endforeach
        ?>
    </tbody>
</table>
<?php require 'layout/page.php' ?>
<?php require 'popup_product_new.php' ?>
<?php require 'popup_product_detail.php' ?>
<?php require 'popup_product_edit.php' ?>
<?php require 'popup_product_delete.php' ?>
<?php require 'popup_product_copy.php' ?>
<?php require 'layout/footer.php' ?>