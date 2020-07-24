<?php
require("../logic/connection.php");
$conn = Connect();
$db = mysqli_select_db($conn, 'eshop_project');
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <!-- Add Product Pop Up Form -->
    <div class="modal fade" id="productAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../logic/createProduct.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> SKU </label>
                            <input type="text" name="skuCreate" id="skuCreate" class="form-control" placeholder="Enter product code" required>
                        </div>

                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="nameCreate" id="nameCreate" class="form-control" placeholder="Enter product name" required>
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="descriptionCreate" id="descriptionCreate" class="form-control" placeholder="Enter product description" required>
                        </div>

                        <div class="form-group">
                            <label> Image </label>
                            <input type="file" name="imageCreate" id="imageCreate" class="form-control" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <label> <select name="categoryCreate" id="categoryCreate" class="form-control">
                                    <?php
                                    $conn = Connect();
                                    $consulta = "SELECT * FROM categories";
                                    $ejecutar = mysqli_query($conn, $consulta);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php $id = $opciones['id'];
                                                        echo $opciones['id'] ?>"> <?php echo $opciones['name'] ?> </option>
                                    <?php endforeach ?>
                                </select></label>
                        </div>

                        <div class="form-group">
                            <label> Sub-Category </label>
                            <label> <select name="sub_categoryCreate" id="sub_categoryCreate" class="form-control">
                                    <?php
                                    $conn = Connect();
                                    $consulta = "SELECT * FROM sub_categories WHERE id_category = '$id'";
                                    $ejecutar = mysqli_query($conn, $consulta);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php echo $opciones['name'] ?>"> <?php echo $opciones['name'] ?> </option>
                                    <?php endforeach ?>
                                </select></label>
                        </div>

                        <div class="form-group">
                            <label> Stock </label>
                            <input type="text" name="stockCreate" id="stockCreate" class="form-control" placeholder="Enter product stock" required>
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="priceCreate" id="priceCreate" class="form-control" placeholder="Enter product price" required>
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
    <!-- Final Add Product Modal -->

    <!-- Edit Product Pop Up Form-->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../logic/editProduct.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class=" form-group">
                            <label> SKU </label>
                            <input type="text" name="skuEdit" id="skuEdit" class="form-control" placeholder="Enter SKU product">
                        </div>

                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="nameEdit" id="nameEdit" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="descriptionEdit" id="descriptionEdit" class="form-control" placeholder="Enter description">
                        </div>

                        <div class="form-group">
                            <label> Image </label>
                            <input type="file" name="imageEdit" id="imageEdit" class="form-control" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <label> <select name="categoryEdit" id="categoryEdit" class="form-control" placeholder="Select option">
                                    <?php
                                    $conn = Connect();
                                    $consulta = "SELECT * FROM categories";
                                    $ejecutar = mysqli_query($conn, $consulta);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php $id = $opciones['id'];
                                                        echo $opciones['id'] ?>"> <?php echo $opciones['name'] ?> </option>
                                    <?php endforeach ?>
                                </select></label>
                        </div>

                        <div class="form-group">
                            <label> Sub-Category </label>
                            <label> <select name="sub_categoryEdit" id="sub_categoryEdit" class="form-control">
                                    <?php
                                    $conn = Connect();
                                    $consulta = "SELECT * FROM sub_categories WHERE id_category = '$id'";
                                    $ejecutar = mysqli_query($conn, $consulta);
                                    ?>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php echo $opciones['id'] ?>"> <?php echo $opciones['name'] ?> </option>
                                    <?php endforeach ?>
                                </select></label>
                        </div>

                        <div class="form-group">
                            <label> Stock </label>
                            <input type="text" name="stockEdit" id="stockEdit" class="form-control" placeholder="Enter stock">
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="priceEdit" id="priceEdit" class="form-control" placeholder="Enter price">
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
    <!-- Final Product Edit Pop Up -->

    <!-- Delete Product Pop Up -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../logic/deleteProduct.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> ¿Do you want to delete this data? </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="deleteData" class="btn btn-primary">Delete it!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Final Product Delete Pop Up-->

    <!-- Products Datatable -->
    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> CRUD Products </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productAddModal">
                        Add Product
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="dataTableId" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub-Category</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <?php
                        if ($result) {
                            foreach ($result as $row) {
                        ?>
                                <tbody>
                                    <tr>
                                        <!-- Nombres a como están creados en la base de datos -->
                                        <td> <?php echo $row['id'] ?> </td>
                                        <td> <?php echo $row['sku'] ?> </td>
                                        <td> <?php echo $row['name'] ?> </td>
                                        <td> <?php echo $row['description'] ?> </td>
                                        <td> <img src=" <?php echo $row['image'] ?> " width="100"> </td>
                                        <td> <?php echo $row['category'] ?> </td>
                                        <td> <?php echo $row['sub_category'] ?> </td>
                                        <td> <?php echo $row['stock'] ?> </td>
                                        <td> <?php echo $row['price'] ?> </td>

                                        <td>
                                            <button type="button" class="btn btn-success editbtn"> Edit </button>&nbsp;
                                            <button type="button" class="btn btn-danger deletebtn"> Delete </button>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTableId').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive = true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#skuEdit').val(data[1]);
                $('#nameEdit').val(data[2]);
                $('#descriptionEdit').val(data[3]);
                $('#imageEdit').val(data[4]);
                $('#categoryEdit').val(data[5]);
                $('#sub_categoryEdit').val(data[6]);
                $('#stockEdit').val(data[7]);
                $('#priceEdit').val(data[8]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

</body>

</html>