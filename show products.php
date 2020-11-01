<!DOCTYPE html>
<?php
session_start();
$uid=$_SESSION["activeuser"]
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Manager</title>
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="CSS/Dash-citizen.css" rel="stylesheet" type="text/css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
            font-family: poppins;
        }
        body 
        {
            background-image: url("Pics/Background%20Subtle.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
        svg{
            z-index: -100;
        }
        #content{
            margin: auto;
            margin-top: 10%;
            width: 90%;
            
        }
    </style>
    <script>
         var Module=angular.module("Adminmodule",[]);
        Module.controller("Admincontroller",function($scope,$http){
            $scope.category;
            $scope.jsonarray;
            $scope.check;
            $scope.doFetch=function(){
                
                $http.get("Json-Fetch-Products-for-Seller.php?uid="+"<?php echo $uid; ?>").then(okFx,notokFx);
                function okFx(response)
                {
                   /* alert(JSON.stringify(response.data));*/
                    $scope.jsonarray=response.data;
                }
                function notokFx(response)
                {
                    alert(response.data);
                    
                }
            };
            $scope.doDelete=function(uid){
                $scope.check="Delete";
                $http.get("Ajax-Remove-Product.php?uid="+uid).then(okFx,notokFx);
                function okFx(response)
                {
                    alert((response.data));
                    location.reload();
                }
                function notokFx(response)
                {
                    alert(response.data);
                }
            };
        });
    </script>
</head>

<body ng-app="Adminmodule" ng-controller="Admincontroller" ng-init="doFetch();">
    <svg id="top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#6C63FF" fill-opacity="0.93" d="M0,0L30,21.3C60,43,120,85,180,90.7C240,96,300,64,360,64C420,64,480,96,540,128C600,160,660,192,720,170.7C780,149,840,75,900,69.3C960,64,1020,128,1080,160C1140,192,1200,192,1260,176C1320,160,1380,128,1410,112L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
    </svg>
    <div id="overall-container">
        <!--=-=-=-=-=Navbar Start Here-=-=-=-=-=--->
       <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="Dash-Citizen.php" style="font-size:40px; font-weight:500;">
                EasyEssentials.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="Dash-Worker.php" style="font-size:20px; font-weight:500; color:white;"><i class="fa fa-tachometer" style="font-size:20px; "></i>&nbsp;My Dashboard</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="index.php" style="font-size:20px; font-weight:500; color:white; float:right">Home</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="logout-process.php" style="font-size:20px; font-weight:500; color:white; float:right">Logout</a>
                    </li>

                </ul>
            </div>

        </nav>
        
        <div id="content" class="container table-responsive">
        <center>
        <!--=-=-=Repeat table-=-=-=-=-->
        <table width="90%" class="table table-striped" class="table">
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                    Category
                </td>
                <td>
                    Product Id
                </td>
                <td>
                    Price
                </td>
                <td>Remove Product</td>
            </tr>
            <tr ng-repeat="obj in jsonarray">
                <td>
                    {{obj.productname}}
                </td>
                 <td>
                    {{obj.productcategory}}
                </td>
                 <td>
                    {{obj.productid}}
                </td>
                <td>
                    {{obj.productprice}}
                </td>
                <td>
                    <div class="btn btn-danger" ng-click="doDelete(obj.productid);">Remove</div>
                </td>
            </tr>
        </table>
       </center>
       </div>
    </div>
</body>

</html>
