<?php
class CategoryController
{
    function index()
    {
        $categoryRepository = new CategoryRepository();
        $search = $_GET['search'] ?? '';
        if ($search) {
            $categories = $categoryRepository->getByPattern($search);
        } else {
            $categories = $categoryRepository->getAll();
        }

        require "view/category/index.php";
    }
    function add()
    {
        $data = $_POST;
        $categoryRepository = new CategoryRepository();
        $categoryName = $data['name'];
        $isSaved = $categoryRepository->add($categoryName);
        if ($isSaved) {
            $_SESSION['success'] = 'Đã tạo danh mục thành công!';
        } else {
            $_SESSION['error'] = 'Không thể tạo danh mục!';
        }

        header('location: ?c=category');
    }

    function edit()
    {
        $categoryRepository = new CategoryRepository();
        $data = $_POST;
        $id = $data['id'];
        $categoryName = $data['name'];

        $isSaved = $categoryRepository->update($id, $categoryName);
        if ($isSaved) {
            $_SESSION['success'] = 'Đã cập nhật danh mục thành công!';
        } else {
            $_SESSION['error'] = 'Không thể cập nhật danh mục!';
        }

        header('location: ?c=category');
    }

    function delete()
    {
        $data = $_POST;
        $id = $data['id'];
        $productRepository =  new ProductRepository();
        $categoryRepository = new CategoryRepository();

        $cond = " product.CategoryID = {$id}";
        $fetchProductResult = $productRepository->fetch($cond);
        if ($fetchProductResult["total"] != 0) {
            $_SESSION['error'] = 'Không thể xóa danh mục này vì vẫn còn sản phẩm!!';
        } else {
            $deleted = $categoryRepository->delete($id);
            if ($deleted) {
                $_SESSION['success'] = 'Đã xóa danh mục thành công!';
            } else {
                $_SESSION['error'] = 'lỗi';
            }
        }

        header('location: ?c=category');
    }
}