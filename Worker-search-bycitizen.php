<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <title>Search Sellers</title>
    <script>
        var Module = angular.module("workermodule", []);
        Module.controller("workercontroller", function($scope, $http) {
            $scope.jsonarray;
            $scope.jsonarray1;
            $scope.jsonarrayselected;
            $scope.jsonarrayselectedDetails;
            $scope.doFetchCity = function() {
                $http.get("Json-Fetch-worker-City.php").then(okFx, NotokFx);

                function okFx(response) {
                    $scope.jsonarray1 = response.data;
                    $scope.selobjectcity = $scope.jsonarray1[0];
                }

                function NotokFx(response) {
                    alert(response.data);
                }
            };
            $scope.doFetchSelected = function() {
                $http.get("Json-Fetch-Selected.php?city=" + $scope.selobjectcity.city).then(okFx, notokFx);

                function okFx(response) {
                    if (response.data == "") {
                        alert("No records Avaliable");
                    }
                    /*alert(JSON.stringify(response.data));*/
                    $scope.jsonarrayselected = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }
            };
            $scope.showDetails = function(i) {
                $scope.jsonarrayselectedDetails = $scope.jsonarrayselected[i];
            };
        });

    </script>
</head>

<body ng-app="workermodule" ng-controller="workercontroller" ng-init="doFetchCategory(); doFetchCity();">
    <!--=-=-=-Modal Starts Here=--=-=-=-->
  <!--  <div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Worker Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <center>
                            <table class="table table-striped table-light" style="width:100%;">
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.sellername}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.address}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.city}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    State
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.states}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Contact
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.contact}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Firm/Shop
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.firmshop}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Experience
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.experience}} Years
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Specialization
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.specialization}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Other Information
                                </td>
                                <td>
                                    {{jsonarrayselectedDetails.otherinfo}}
                                </td>
                            </tr>
                            </table>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
    <!--=-=-=-Modal Ends Here=--=-=-=-->
<center>
       
 <h1 style="margin-top:50px; font-weight:700 ">SEARCH SELLERS </h1>
   <br>
    
    <h2>Select Your City:</h2>
    <select ng-model="selobjectcity" ng-options="obj.city for obj in jsonarray1" style="width:200px;"></select>
    <br>
    <br>
    <br>
    <button class="btn btn-primary" ng-click="doFetchSelected();">Search
    </button>
    <!--=-=-=-=Card Starts Here-=-=-=-=--->
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-5" ng-repeat="obj in jsonarrayselected">
                <div class="card">
                    <img src="Uploads/{{obj.profilepic}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Name of Shop : {{obj.firmshop}}</h5>
                        <p class="card-text">Contact: {{obj.contact}}</p>
                        <p class="card-text">Email : {{obj.email}}</p>
                        <p class="card-text">Category : {{obj.category}}</p>
                        <div class="btn btn-primary" >
                        <a href="TEST/Advance_Shopping_cart-master/index.php?uid={{obj.uid}}" style="text-decoration:none; color:black;">Shop Here</a>
                        </div>
                        <!--<div ng-click="showDetails($index);" class="btn btn-primary" data-toggle="modal" data-target="#DetailsModal">Show Details</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
</body>

</html>
