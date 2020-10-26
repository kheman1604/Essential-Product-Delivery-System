<!DOCTYPE html>
<?php
$uid=$_GET["uid"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <title>Shop Here</title>
    
    <script>
     var Module = angular.module("productsmodule", []);
    Module.controller("productscontroller", function($scope, $http){
        $scope.jsonarray;
        $scope.productid=document.getElementById("productid");
        $scope.doFetchProducts=function(){
            alert();
            $http.get("Json-Fetch-Products.php?uid=<?php echo $uid; ?>").then(okfx,notokfx);
            
            function okfx(response){
                /*alert(JSON.stringify(response.data));*/
                $scope.jsonarray=response.data;
            }
            function notokfx(response){
                alert(response.data);
            }
        };
        $scope.doAjaxRequest=function(){
            alert(productid);
        };
    });
    
    </script>
</head>
<body ng-app="productsmodule" ng-controller="productscontroller" ng-init="doFetchProducts();">
   <center>
    <h1>Products Avaliable from seller <?php echo $uid ; ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5" ng-repeat="obj in jsonarray">
                <div class="card">
                    <img src="Uploads/{{obj.productpic}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product Name : {{obj.productname}}</h5>
                        <p class="card-text">Product Category: {{obj.productcategory}}</p>
                        <p class="card-text">Product Price:&nbsp;&#x20B9;{{obj.productprice}}</p>
                        <input type="hidden" value="{{obj.productid}}" id="productid">
                        <div class="btn btn-primary" id="addbtn1" name="addbtn1" ng-click="doAjaxRequest();">
                        Add to Cart
                       <!-- <a href=# style="text-decoration:none; color:black;" type="submit" id="addbtn" name="addbtn">Add to Cart</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </center>
    
</body>
</html>