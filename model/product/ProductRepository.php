<?php
class ProductRepository
{
    function fetch($cond = null, $page = 1)
    {
        global $conn;
        $limit = 10;
        $page = $page;
        $offset = ($page - 1) * $limit;
        $total = 0;

        $countSql = "SELECT COUNT(*) as total FROM product INNER JOIN category 
        on product.CategoryID = category.CategoryID";
        $sql = "SELECT * FROM product INNER JOIN category 
            on product.CategoryID = category.CategoryID";
        if ($cond) {
            $countSql .= " WHERE $cond";
            $sql .= " WHERE $cond";
        }
        $sql .= " ORDER BY product.ProductID DESC LIMIT {$limit} OFFSET {$offset}";

        $countResult = $conn->query($countSql);
        $total = $countResult->fetch_assoc();
        $total = $total['total'];

        $pageNumber = ceil($total / $limit);

        $products = [];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ProductID = $row['ProductID'];
                $ProductName = $row['ProductName'];
                $Featured_image = $row['Featured_image'];
                $CategoryID = $row['CategoryID'];
                $CategoryName = $row['CategoryName'];
                $product = new Product($ProductID, $ProductName, $Featured_image, $CategoryID);
                $product->Category = new Category($CategoryID, $CategoryName);
                $products[] = $product;
            }
        }
        return [
            "products" => $products,
            "currentPage" => $page,
            "nextPage" => $page + 1,
            "prevPage" => $page - 1,
            "total" => $total,
            "pageNumber" => $pageNumber,
        ];
    }

    function getAll($page)
    {
        return $this->fetch(null, $page);
    }

    function getByPattern($search, $page)
    {
        $cond = " product.ProductName LIKE '%$search%' OR category.CategoryName LIKE '%$search%'";
        return $this->fetch($cond, $page);
    }

    function add($productName, $categoryID, $feturedImage)
    {

        global $conn;
        $sql = "INSERT INTO product(ProductName, Featured_image, CategoryID) 
            VALUES ('$productName', '$feturedImage', '$categoryID')";

        if ($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function update($id, $productName, $categoryID, $feturedImage)
    {
        global $conn;

        if ($feturedImage) {
            $sql = "UPDATE product 
        SET ProductName = '$productName', CategoryID = '$categoryID', Featured_image = '$feturedImage' 
        WHERE product.ProductID = $id";
        } else {
            $sql = "UPDATE product 
            SET ProductName = '$productName', CategoryID = '$categoryID' 
            WHERE product.ProductID = $id";
        }

        if ($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM product WHERE ProductID =$id";
        if ($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function copyProduct($id)
    {
        $cond = " product.ProductID={$id}";
        $products = $this->fetch($cond);
        $product = current($products)[0];

        return $this->add($product->ProductName, $product->CategoryID, $product->Featured_image);
    }
}