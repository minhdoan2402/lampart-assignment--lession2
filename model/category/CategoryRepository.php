<?php 
    class CategoryRepository {
        function getAll() {
            global $conn;
            $sql = "SELECT * FROM category ";
            $categories = [];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $CategoryID = $row['CategoryID'];
                    $CategoryName = $row['CategoryName'];
                    $category = new Category($CategoryID, $CategoryName);

                    $categories[] = $category;
                }
            }
            return $categories;
        }
    }
?>