<?php
class CategoryRepository
{
    function fetch($cond = null)
    {
        global $conn;
        $sql = "SELECT * FROM category ";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $categories = [];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CategoryID = $row['CategoryID'];
                $CategoryName = $row['CategoryName'];
                $category = new Category($CategoryID, $CategoryName);

                $categories[] = $category;
            }
        }
        return $categories;
    }

    function getAll()
    {
        return $this->fetch();
    }

    function getByPattern($search)
    {
        $cond = " CategoryName LIKE '%$search%'";
        return $this->fetch($cond);
    }

    function add($categoryName)
    {
        global $conn;
        $sql = "INSERT INTO category(CategoryName) 
            VALUES ('$categoryName')";

        if ($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function update($id, $categoryName)
    {
        global $conn;
        $sql = "UPDATE category SET CategoryName = '$categoryName' 
        WHERE category.CategoryID = $id";
        if ($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM category WHERE CategoryID =$id";
        if ($conn->query($sql)) {
            return true;
        }
        return false;
    }
}