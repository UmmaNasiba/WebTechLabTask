$(document).ready(function(){

    loadBooks();

    // ADD BOOK
    $("#addBtn").click(function(){

        let title = $("#title").val();
        let author = $("#author").val();
        let category = $("#category").val();
        let status = $("#status").val();

        $.ajax({
            url: "../ajax/handler.php",
            type: "POST",

            data: {
                action: "add",
                title: title,
                author: author,
                category: category,
                status: status
            },

            success: function(response){
                alert(response);

                loadBooks();

                $("#title").val("");
                $("#author").val("");
                $("#category").val("");
                $("#status").val("");
            }
        });

    });

});

// LOAD BOOKS
function loadBooks(){

    $.ajax({
        url: "../ajax/handler.php",
        type: "POST",

        data: {
            action: "fetch"
        },

        success: function(data){
            $("#bookData").html(data);
        }
    });

}

// DELETE BOOK
function deleteBook(id){

    $.ajax({
        url: "../ajax/handler.php",
        type: "POST",

        data: {
            action: "delete",
            id: id
        },

        success: function(response){
            alert(response);
            loadBooks();
        }
    });

}

// EDIT BOOK
function editBook(id, title, author, category, status){

    $("#bookId").val(id);
    $("#title").val(title);
    $("#author").val(author);
    $("#category").val(category);
    $("#status").val(status);

    $("#addBtn").hide();
    $("#updateBtn").show();
}

// UPDATE BOOK
function updateBook(){

    let id = $("#bookId").val();
    let title = $("#title").val();
    let author = $("#author").val();
    let category = $("#category").val();
    let status = $("#status").val();

    $.ajax({
        url: "../ajax/handler.php",
        type: "POST",

        data: {
            action: "update",
            id: id,
            title: title,
            author: author,
            category: category,
            status: status
        },

        success: function(response){

            alert(response);

            loadBooks();

            $("#bookId").val("");
            $("#title").val("");
            $("#author").val("");
            $("#category").val("");
            $("#status").val("");

            $("#addBtn").show();
            $("#updateBtn").hide();
        }
    });

}