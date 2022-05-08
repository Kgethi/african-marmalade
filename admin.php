<!DOCTYPE html>
<html lang="en">

<?php

include('includes/head.php');
include('includes/navigation.php');


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {
    $itemName  = test_input($_POST['itemName']);
    $itemDescription  = test_input($_POST['itemDescription']);
    $itemImage  = $_FILES["itemImage"]["name"];
    $stock  = test_input($_POST['stock']);
    $itemPrice  = test_input($_POST['itemPrice']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["itemImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["itemImage"]["tmp_name"]);

    if (($check == false) || (file_exists($target_file)) || ($_FILES["itemImage"]["size"] > 500000) ||
        ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) || ($uploadOk == 0) || empty($itemName)  || empty($itemDescription)  || empty($stock)  || empty($itemPrice)
    ) {

        if ($check == false) {

            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["itemImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        }
    } else {
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["itemImage"]["name"])) . " has been uploaded.";

            $sql = "INSERT INTO africanmarmaladeitems(itemID, itemName, itemDescription, itemImage, stock, itemPrice, dateAdded, dateUpdated) VALUES (null,'$itemName','$itemDescription','$itemImage','$stock','$itemPrice',NOW(),NOW())";

            if ($conn->query($sql)) {
                echo "Input written";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


?>



<body>





    <div id="main-page-content">

        <div class="container mb-6">


            <div class="row">

                <div class="col-lg-12 align-self-center">

                    <h1>Add Item</h1>

                    <form method="post" enctype="multipart/form-data">
                        <div class="row mb-6">
                            <div class="form-group col-lg-6">
                                <label for="itemName">Item name</label>
                                <input type="text" class="form-control" name="itemName" id="itemName" placeholder="Enter item name">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="itemDescription" class="d-block">Description</label>
                                <textarea name="itemDescription" id="itemDescription" class="w-100" rows="5" placeholder="Enter item description"></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group col-lg-4">
                                <label for="itemImage" class="d-block">Select image to upload:</label>
                                <input type="file" name="itemImage" id="itemImage">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock number">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="itemPrice">Price</label>
                                <input type="number" class="form-control" id="itemPrice" name="itemPrice" placeholder="Enter item price" step=".01">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                </div>


                </form>

            </div>


        </div>






    </div>

    </div>


</body>
<script src="js/main.js"></script>

</html>