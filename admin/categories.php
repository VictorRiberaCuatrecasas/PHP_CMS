<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to admin pannel
                        <small>Author</small>
                    </h1>
                    <!-- category form -->
                    <div class="col-xs-6">
                   
                        <!-- add category -->
                        <?php 
                            if(isset($_POST["submit"])){
                            $cat_title = $_POST["cat_title"];

                            if($cat_title == "" || empty($cat_title)){
                                echo "This field can't be empty";
                            } else {
                                    $queryInsert = "INSERT INTO categories (cat_title) VALUE ('$cat_title')";
                                    mysqli_query($connection,$queryInsert) or die ("problem with the query ".mysqli_error($connection)); 
                            }
                            }
                        ?>  
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- update category -->
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
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
                            </div>
                        </form>
                    </div>
                    <!-- category table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                        // find all categories   
                                        $query = "SELECT * FROM categories";
                                        $select_categories = mysqli_query($connection, $query) or die ("problem with the query ".mysqli_error($connection));     

                                        // delete category
                                        if(isset($_GET["delete"])){
                                            $catId = $_GET["delete"];
        
                                            $queryDelete = "DELETE FROM categories WHERE cat_id = $catId";
                                            mysqli_query($connection,$queryDelete) or die ("problem with the query ".mysqli_error($connection));
                                            // page refresh
                                            header("Location: categories.php");
                                        };
                                        
                                        while($row = mysqli_fetch_assoc($select_categories)){
                                            $category_title = $row["cat_title"];
                                            $category_id = $row["cat_id"];
                                            echo "
                                                <tr>
                                                    <td>{$category_id}</td>
                                                    <td>{$category_title}</td>
                                                    <td><a href='categories.php?delete={$category_id}'>Delete</a></td>
                                                    <td><a href='categories.php?edit={$category_id}'>Edit</a></td>
                                                </tr>  
                                            ";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>