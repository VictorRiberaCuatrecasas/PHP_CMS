<form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Update Category</label>
    <?php 
        if(isset($_GET["edit"])){
            $catId = $_GET["edit"];
            $query = "SELECT * FROM categories WHERE cat_id = $catId";
            $select_categories_id = mysqli_query($connection, $query) or die ("problem with the query ".mysqli_error($connection));     
            
            while($row = mysqli_fetch_assoc($select_categories_id)){
                $category_title = $row["cat_title"];
                $category_id = $row["cat_id"];
            ?>

            <input value="<?php if(isset($category_title)){echo $category_title;} ?>" class="form-control" type="text" name="cat_title">

        <?php   }
        } 
    ?>
    <?php 
        if(isset($_POST["update_category"])){
            $cat_title_update = $_POST["cat_title"];

            $queryUpdate = "UPDATE categories SET cat_title = '$cat_title_update' WHERE cat_id = $catId";
            mysqli_query($connection,$queryUpdate) or die ("problem with the query ".mysqli_error($connection));
        };
    ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>