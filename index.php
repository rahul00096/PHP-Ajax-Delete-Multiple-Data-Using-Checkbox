<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Delete Multiple Data</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>Delete Multiple Data with <br>PHP & Ajax CRUD</h1>
    </div>
    <div id="sub-header">
      <button id="delete-btn">Delete</button>
    </div>
    <div id="table-data"></div>
  </div>

  <div id="error-message"></div>
  <div id="success-message"></div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
      function loadData() {
        $.ajax({
          url: "multiple-delete.php",
          type: "POST",
          success: function (data) {
            $("#table-data").html(data);
          }
        });
      }
      loadData();

      $("#delete-btn").on("click", function () {
        var id = [];

        $(":checkbox:checked").each(function (key) {
          id.push($(this).val());
        });

        if (id.length === 0) {
          alert("Please Select at least one checkbox.");
        } else {
          if (confirm("Do you really want to delete these records?")) {
            $.ajax({
              url: "delete-data.php",
              type: "POST",
              data: { id: id },
              success: function (data) {
                if (data == 1) {
                  $("#success-message").html("Data deleted successfully.").slideDown();
                  $("#error-message").slideUp();
                  loadData();
                  setTimeout(function () {
                    $("#success-message").slideUp();
                  }, 4000);
                } else {
                  $("#error-message").html("Can't Delete Data.").slideDown();
                  $("#success-message").slideUp();
                  setTimeout(function () {
                    $("#error-message").slideUp();
                  }, 4000);
                }
              }
            });
          }
        }
      });
    });
  </script>
</body>
</html>
