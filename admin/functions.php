<?php

    /////////////
    // CATEGORIES
    /////////////
    function insert_categories(){
        if(isset($_POST["submit"])){
            global $connection;
            $cat_title = $_POST["cat_title"];

            if($cat_title == "" || empty($cat_title)){
                echo "This field can't be empty";
            } else {
                    $queryInsert = "INSERT INTO categories (cat_title) VALUE ('$cat_title')";
                    mysqli_query($connection,$queryInsert) or die ("problem with the query ".mysqli_error($connection)); 
            }
        }
    };

    function find_all_categories(){
         // find all categories  
         global $connection; 
         $query = "SELECT * FROM categories";
         $select_categories = mysqli_query($connection, $query) or die ("problem with the query ".mysqli_error($connection));     

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
 
    };

    function delete_categories(){
          // delete category
          global $connection; 
          
          if(isset($_GET["delete"])){
            $catId = $_GET["delete"];

            $queryDelete = "DELETE FROM categories WHERE cat_id = $catId";
            mysqli_query($connection,$queryDelete) or die ("problem with the query ".mysqli_error($connection));
            // page refresh
            header("Location: categories.php");
        };
    };



    /////////////
    // POSTS
    /////////////

    function find_all_posts(){ 
        global $connection; 
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query) or die ("problem with the query ".mysqli_error($connection));     

        while($row = mysqli_fetch_assoc($select_posts)){
            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_category_id = $row["post_category_id"];
            $post_status = $row["post_status"];
            $post_image = $row["post_image"];
            $post_tags = $row["post_tags"];
            $post_comment_count = $row["post_comment_count"];
            $post_date = $row["post_date"];
            echo "
                <tr>
                <td>$post_id</td>
                <td>$post_author</td>
                <td>$post_title</td>
                <td>$post_category_id</td>
                <td>$post_status</td>
                <td><img src='../images/$post_image' alt='image' width='100' /></td>
                <td>$post_tags</td>
                <td>$post_comment_count</td>
                <td>$post_date</td>
                </tr>  
            ";
        }

   };
?>