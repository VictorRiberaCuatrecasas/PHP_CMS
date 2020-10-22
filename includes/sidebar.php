<div class="col-md-4">
    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" type="submit" class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php              
                        $query = "SELECT * FROM categories LIMIT 5";
                        $categories_sidebar = mysqli_query($connection, $query) or die ("problem with the query ".mysqli_error($connection)); ;  
                        
                        while($row = mysqli_fetch_assoc($categories_sidebar)){
                            $category = $row["cat_title"];
                            echo "<li><a href='#'>{$category}</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>