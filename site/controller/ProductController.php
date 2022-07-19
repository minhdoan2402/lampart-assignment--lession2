<?php
class ProductController
{
    function index()
    {
        $productRepository = new ProductRepository();
        $search = $_GET['search'] ?? '';
        $page = $_GET['page'] ?? '1';
        $page = intval($page);

        $categoryRepository = new CategoryRepository();
        if ($search) {
            $result =  $productRepository->getByPattern($search, $page);
        } else {
            $result = $productRepository->getAll($page);
        }

        $categories = $categoryRepository->getAll();

        $products = $result["products"];
        $currentPage = $result["currentPage"];
        $nextPage = $result["nextPage"];
        $prevPage = $result["prevPage"];
        $total = $result["total"];
        $pageNumber = $result["pageNumber"];
        require 'view/product/index.php';
    }

    function add()
    {
        $data = $_POST;
        $imageService = new ImageService();
        $filename = $imageService->uploadImage($_FILES["image"]);

        $productRepository = new ProductRepository();
        $productName = $data['name'];
        $categoryID = $data['category_id'];
        $feturedImage = $filename;
        $isSaved = $productRepository->add($productName, $categoryID, $feturedImage);
        if ($isSaved) {
            $_SESSION['success'] = 'Đã tạo sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Không thể tạo sản phẩm!';
        }

        header('location: ?c=product');
    }

    function edit()
    {
        $productRepository = new ProductRepository();
        $data = $_POST;
        $id = $data['id'];
        $productName = $data['name'];
        $categoryID = $data['category_id'];
        $feturedImage = null;
        if (!empty($_FILES["image"]["size"] != 0)) {
            $imageService = new ImageService();
            $filename = $imageService->uploadImage($_FILES["image"]);
            $feturedImage = $filename;
        }
        // $feturedImage = $filename;
        $isSaved = $productRepository->update($id, $productName, $categoryID, $feturedImage);
        if ($isSaved) {
            $_SESSION['success'] = 'Đã cập nhật sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Không thể cập nhật sản phẩm!';
        }

        header('location: ?c=product');
    }

    function delete()
    {
        $productRepository = new ProductRepository();
        $data = $_POST;
        $id = $data['id'];

        $isDelete = $productRepository->delete($id);
        if ($isDelete) {
            $_SESSION['success'] = 'Đã xóa sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Không thể xóa sản phẩm!';
        }

        header('location: ?c=product');
    }

    function copy()
    {
        $productRepository = new ProductRepository();
        $data = $_POST;
        $id = $data['id'];

        $copyProduct = $productRepository->copyProduct($id);
        if ($copyProduct) {
            $_SESSION['success'] = 'Đã copy sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Không thể copy sản phẩm!';
        }

        header('location: ?c=product');
    }
}