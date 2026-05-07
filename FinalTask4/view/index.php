<!DOCTYPE html>
<html>
<head>

    <title>Library Management System</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="../assets/script.js"></script>

</head>

<body>

    <h1>Library Management System</h1>

    <input type="hidden" id="bookId">

    <input type="text" id="title" placeholder="Book Title">

    <input type="text" id="author" placeholder="Author Name">

    <input type="text" id="category" placeholder="Category">

    <select id="status">
        <option value="Available">Available</option>
        <option value="Not Available">Not Available</option>
    </select>

    <button id="addBtn">Add Book</button>

    <button id="updateBtn"
            onclick="updateBook()"
            style="display:none;">
        Update Book
    </button>

    <br><br>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody id="bookData">

        </tbody>

    </table>

</body>
</html>