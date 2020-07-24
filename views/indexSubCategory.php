<?php
require("../logic/connection.php");
$connection = Connect();
$db = mysqli_select_db($connection, 'eshop_project');
$sql = "SELECT * FROM sub_categories";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <!-- Add Category Pop Up Form -->
    <div class="modal fade" id="subCategoryAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub-Category Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../logic/createSubCategory.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="subCategoryNameCreate" id="subCategorynameCreate" class="form-control" placeholder="Enter category name">
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <label> <select name="categoryIdCreate" id="categoryIdCreate" class="form-control">
                                    <?php
                                    $conn = Connect();
                                    $consulta = "SELECT * FROM categories";
                                    $ejecutar = mysqli_query($conn, $consulta);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php
                                                        echo $opciones['id'] ?>"> <?php echo $opciones['name'] ?> </option>
                                    <?php endforeach ?>
                                </select></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertData" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Final Add Category Modal -->

    <!-- Edit Category Pop Up Form-->
    <div class="modal fade" id="subCategoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub-Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../logic/editSubCategory.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="subCategoryNameEdit" id="subCategoryNameEdit" class="form-control" placeholder="Enter category name">
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <label> <select name="categoryIdEdit" id="categoryIdEdit" class="form-control">
                                    <?php
                                    $conn = Connect();
                                    $consulta = "SELECT * FROM categories";
                                    $ejecutar = mysqli_query($conn, $consulta);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php
                                                        echo $opciones['id'] ?>"> <?php echo $opciones['name'] ?> </option>
                                    <?php endforeach ?>
                                </select></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updateData" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Final Edit Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="subCategoryDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Sub-Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../logic/deleteSubCategory.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> ¿Do you sure to want to delete this data? </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="deleteData" class="btn btn-primary">Delete it!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Final Delete Modal-->

    <!-- Categories Datatable -->
    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> CRUD Sub-Categories </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subCategoryAddModal">
                        Add Sub-Category
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">ID Category</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <?php
                        if ($result) {
                            foreach ($result as $row) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $row['id'] ?> </td>
                                        <td> <?php echo $row['name'] ?> </td>
                                        <td> <?php echo $row['id_category'] ?> </td>

                                        <td>
                                            <button type="button" class="btn btn-success editBtn"> Edit </button>
                                            <button type="button" class="btn btn-danger deleteBtn"> Delete </button>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        } else {
                            echo "No record found";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Final Categories Datatable -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $(".editBtn").on("click", function() {

                $("#subCategoryEditModal").modal("show");

                $tr = $(this).closest("tr");

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $("#update_id").val(data[0]);
                $("#subCategoryNameEdit").val(data[1]);
                $("#categoryIdCreate").val(data[2]);

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.deleteBtn').on('click', function() {

                $('#subCategoryDeleteModal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <!-- Final scripts -->

</body>

</html>