<?php require 'layout/header.php' ?>
<form action="" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
            value="<?= $search ?>">
        <button class="btn btn-danger">Tìm</button>
    </label>
</form>
<div class="bg-white clearfix">
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newCategoryModal">
        <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>CategoryID</th>
            <th>Category Name</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $idx = 1;
        foreach ($categories as $category) : ?>
        <tr>
            <td><?= $idx ?></td>
            <td id="category-<?= $category->CategoryID ?>"><?= $category->CategoryID ?></td>
            <td id="category-name-<?= $category->CategoryID ?>"><?= $category->CategoryName ?></td>
            <td><button type="button" data-category-id="<?= $category->CategoryID ?>"
                    class="category-edit-button btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editCategoryModal">
                    <i class="fas fa-edit"></i>
                </button>
            </td>

            <td>
                <button type="button" data-category-id="<?= $category->CategoryID ?>"
                    class="category-delete-button btn-sm btn-primary" data-toggle="modal"
                    data-target="#deleteCategoryModal">
                    <i class="fa-solid fa-circle-minus"></i>
                </button>
            </td>
        </tr>
        <?php
            $idx += 1;
        endforeach
        ?>
    </tbody>
</table>
<?php require 'popup_category_delete.php' ?>
<?php require 'popup_category_new.php' ?>
<?php require 'popup_category_edit.php' ?>
<?php require 'layout/footer.php' ?>