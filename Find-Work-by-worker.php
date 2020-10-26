<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <title>Find Work</title>
    <script>
        var Module=angular.module("findworkmodule",[]);
        Module.controller("findworkcontroller",function($scope,$http){
            $scope.jsonarray;
            $scope.jsonarray1;
            $scope.jsonarrayselected;
            $scope.jsonarraycitizendetail;
            $scope.doFetchCategory = function() {
                $http.get("Json-Fetch-worker-Category-byworker.php").then(okFx, NotokFx);

                function okFx(response) {
                    $scope.jsonarray = response.data;
                    $scope.selobject = $scope.jsonarray[0];
                }

                function NotokFx(response) {
                    alert(response.data);
                }
            };
            $scope.doFetchCity = function() {
                $http.get("Json-Fetch-worker-City-byworker.php").then(okFx, NotokFx);

                function okFx(response) {
                    $scope.jsonarray1 = response.data;
                    $scope.selobjectcity = $scope.jsonarray1[0];
                }

                function NotokFx(response) {
                    alert(response.data);
                }
            };
         $scope.doFetchSelected = function() {
                $http.get("Json-Fetch-Selected-byworker.php?category=" + $scope.selobject.category+"&city=" + $scope.selobjectcity.city).then(okFx, notokFx);

                function okFx(response) {
                    if (response.data == "") 
                    {
                        alert("No records Avaliable");
                    }
                    /*alert(JSON.stringify(response.data));*/
                    $scope.jsonarrayselected = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }
            };
            
        $scope.showDetails=function(cust_uid)
        {
            $http.get("Json-fetch-citizen-detail-for-searchbyworker.php?uid="+cust_uid).then(okFx,notokFx);
            
            function okFx(response)
            {
                /*alert(JSON.stringify(response.data));*/
                $scope.jsonarraycitizendetail=response.data;
               /* alert(JSON.stringify($scope.jsonarraycitizendetail));*/
            }
            function notokFx(response)
            {
                alert(response.data);
            }
        }
        });
    </script>
</head>
<body ng-app="findworkmodule" ng-controller="findworkcontroller" ng-init="doFetchCategory(); doFetchCity();">
    <!--=-=-=-Modal Starts Here=--=-=-=-->
    <div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    {{jsonarraycitizendetail[0].name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Contact
                                </td>
                                <td>
                                    {{jsonarraycitizendetail[0].contact}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    {{jsonarraycitizendetail[0].address}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    {{jsonarraycitizendetail[0].city}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    State
                                </td>
                                <td>
                                    {{jsonarraycitizendetail[0].state}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    {{jsonarraycitizendetail[0].email}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   Pincode
                                </td>
                                <td>
                                    {{jsonarraycitizendetail[0].pincode}}
                                </td>
                            </tr>

                            </table>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--=-=-=-Modal Ends Here=--=-=-=-->
<center>
       
 <h1>Search Workers</h1>
    
    Select Category:
    <select ng-model="selobject" ng-options="obj.category for obj in jsonarray"></select>
    <br>
    <br>
    <br>
    Select City:
    <select ng-model="selobjectcity" ng-options="obj.city for obj in jsonarray1"></select>
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
                    <!--<img src="Uploads/{{obj.profilepic}}" class="card-img-top" alt="...">-->
                    <div class="card-body">
                        <p class="card-text">Customer ID : {{obj.cust_uid}}</p>
                        <p class="card-text">Task : {{obj.problem}}</p>
                        <p class="card-text">Location : {{obj.location}}</p>

                        <div ng-click="showDetails(obj.cust_uid);" class="btn btn-primary" data-toggle="modal" data-target="#DetailsModal">Show Details</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
</body>

</html>