<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Worker Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="JS/bootstrap.min.js"></script>
    <style>
         #container {
            width: 70%;
            margin: auto;
            margin-top: 100px;
        }
        #overall
        {
            background-image: url(Pics/wave.png);
            background-repeat: no-repeat;
            width: 100px;
        }
    </style>
    <!--=-=-=-=-=-Preview of the Pic=-=-=-=-=-=-=-->
    <script>
        function showpreview(file) 
        {

        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (ev) {
                $('#PrevProductPic').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

        }
    
    </script>
</head>

<body>
    <div id="container">
       <center><h1><b>List Products</b></h1></center>
       <br>
        <form action="List-Products-Process.php" method="post" enctype="multipart/form-data">
           <input type="hidden" id="hdn1" name="hdn1">
           <input type="hidden" id="hdn2" name="hdn2">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Seller Username</label>
                    <input type="text" class="form-control" id="txtUid" name="txtUid" value='<?php echo $_SESSION["activeuser"];?>' readonly>
                    <span id="errUid"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Product Name</label>
                    <input type="text" class="form-control" id="txtProductName" name="txtProductName">
                </div>
                <div class="form-group col-md-6">
                    <label>Product Category</label>
                    <input type="text" class="form-control" id="txtCategory" name="txtCategory">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Product ID</label>
                    <input type="text" class="form-control" id="txtProductId" name="txtProductId">
                </div>
                <div class="form-group col-md-6">
                    <label>Product Price</label>
                    <input type="number" class="form-control" id="txtPrice" name="txtPrice">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <center><img src="Pics/download.png" style="width:200px; height:200px; border:1px solid black; padding: 20px; border-radius: 10px;" id="PrevProductPic"></center>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12">
                   <center>
                    <label>Upload Product Image:</label>
                    <input type="file" id="ProductPic" name="ProductPic" onchange="showpreview(this)">
                    </center>
                </div>
            </div>
            <br>
            <br>
            <center>
            <button type="submit" name="btn" value="save" class="btn btn-primary" id="btnSave">Save</button>
            <button type="submit" name="btn" value="update" class="btn btn-primary" id="btnUpdate">Update</button>
            </center>
            <br>
            <br>
        </form>
    </div>
</body>

</html>
