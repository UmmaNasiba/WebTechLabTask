<?php

require_once("../controller/bookController.php");

if(isset($_POST['action'])){

    // ADD BOOK
    if($_POST['action'] == "add"){

        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $status = $_POST['status'];

        if(addBookController($title, $author, $category, $status)){
            echo "Book Added Successfully";
        }
    }

    // FETCH BOOKS
    if($_POST['action'] == "fetch"){

        $result = showBooksController();

        while($row = mysqli_fetch_assoc($result)){

            echo "
            <tr>
                <td>".$row['id']."</td>
                <td>".$row['title']."</td>
                <td>".$row['author']."</td>
                <td>".$row['category']."</td>
                <td>".$row['status']."</td>

                <td>
                    <button onclick='deleteBook(".$row['id'].")'>
                        Delete
                    </button>
                </td>

                <td>
                    <button onclick='editBook(
                        ".$row['id'].",
                        \"".$row['title']."\",
                        \"".$row['author']."\",
                        \"".$row['category']."\",
                        \"".$row['status']."\"
                    )'>
                        Edit
                    </button>
                </td>
            </tr>
            ";
        }
    }

    // DELETE BOOK
    if($_POST['action'] == "delete"){

        $id = $_POST['id'];

        if(removeBookController($id)){
            echo "Deleted";
        }
    }

    // UPDATE BOOK
    if($_POST['action'] == "update"){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $status = $_POST['status'];

        if(editBookController($id, $title, $author, $category, $status)){
            echo "Updated";
        }
    }
}

?>