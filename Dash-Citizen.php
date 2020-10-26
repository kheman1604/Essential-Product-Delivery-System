<!DOCTYPE html>
<?php
    session_start();
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="CSS/Dash-citizen.css" rel="stylesheet" type="text/css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>

    <!--=-=-=-Ajax Request=-=-=-=--->
    <script>
        $(document).ready(function() {
            $("#btnpostwork").click(function() {
                var uid = $("#txtUid").val();
                var Category = $("#txtCategory").val();
                var workinfo = $("#txtWorkinfo").val();
                var Location = $("#txtLocation").val();
                var City = $("#txtCity").val();
                var url = "Ajax-citizen-postwork.php?uid=" + uid + "&Category=" + Category + "&workinfo=" + workinfo + "&Location=" + Location + "&City=" + City;
                $.get(url, function(response) {
                    alert(response);
                });

            });
        });

    </script>

    <!---=-=-=-=-Angular=-=-=-=-=-->
    <script>
        var Module = angular.module("RequirementModule", []);
        Module.controller("RequirementController", function($scope, $http) {
            $scope.jsonArray;
            $scope.doloadRequirements = function() {
                var activeuid = angular.element(document.getElementById("activeuid"));
                var uidvalue = activeuid.val();
                /*alert(uidvalue);*/
                $http.get("Json-Fetchall_Requirements.php?uid=" + uidvalue).then(okFx, notokFx);

                function okFx(response) {
                    /*alert(JSON.stringify(response.data));*/
                    $scope.jsonArray = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }

            }

            $scope.doDel = function(rid) {
                /*alert(rid);*/
                $http.get("Delete-Record-from-Requirement-Manager.php?rid=" + rid).then(okFx, notokFx);

                function okFx(response) {
                    alert(response);
                }

                function notokFx(response) {
                    alert(response);
                }
            }

        });

    </script>
</head>

<body ng-app="RequirementModule" ng-controller="RequirementController" ng-model="uid1">
    <svg id="top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#6C63FF" fill-opacity="0.93" d="M0,0L30,21.3C60,43,120,85,180,90.7C240,96,300,64,360,64C420,64,480,96,540,128C600,160,660,192,720,170.7C780,149,840,75,900,69.3C960,64,1020,128,1080,160C1140,192,1200,192,1260,176C1320,160,1380,128,1410,112L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
    </svg>
    <div id="overall-container">
        <!--=-=-=-=-=Navbar Start Here-=-=-=-=-=--->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="Dash-Citizen.php" style="font-size:40px; font-weight:500;">
                Mps.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="#" style="font-size:20px; font-weight:500; color:white;"><i class="fa fa-tachometer" style="font-size:20px; "></i> &nbsp;My Dashboard</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="#" style="font-size:20px; font-weight:500; color:white; float:right">Home</a>
                    </li>
                    <li class="nav-item active  mr-5">
                        <a class="nav-link" href="logout-process.php" style="font-size:20px; font-weight:500; color:white; float:right">Logout</a>
                    </li>
                    
                </ul>
            </div>

        </nav>
        <!--=-=-=-=-=Navbar Ends Here-=-=-=-=-=--->

        <!--=-=-=-=-=-=-=-Cards=-=-=-=-=-=-=--->
        <center>
            <div class="card-deck  mt-lg-5" style="width:70%;">
                <!--=-=-Profile Card=-=-=-->
                <div class="card">
                    <a href="Profile-citizen-front.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_profile_details_f8b7.svg">
                        </div>
                        <center>
                            <div class="card-body">
                                <h5 class="card-title">Profile</h5>
                                <p class="card-text">Edit Your Profile Information Here</p>
                            </div>
                        </center>

                    </a>
                </div>
                <!--=-=-=-Requirement Manager Card=-=-=-=--->
                <div class="card">
                    <a href="#" data-toggle="modal" data-target="#RequirementModal" ng-click="doloadRequirements();">
                        <div class="cardimage">
                            <img src="Pics/undraw_file_manager_j85s.svg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Order Manager</h5>
                            <input type="hidden" value='<?php echo $_SESSION["activeuser"];?>' id="activeuid">
                            <p class="card-text">Manage All Your Orders Here </p>
                        </div>

                    </a>
                </div>
                <!--=-=-Search Worker Card=-=-=-->

                <div class="card">
                    <a href="Worker-search-bycitizen.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_people_search_wctu.svg" class="card-img-top1" alt="...">
                        </div>
                        <center>
                            <div class="card-body">
                                <h5 class="card-title">Search Sellers</h5>
                                <p class="card-text">Find Nearby Sellers</p>
                            </div>
                        </center>

                    </a>
                </div>
            </div>
        </center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--=-=-=-=Modal For Work Post Card-=-=--==-->
        <div class="modal fade " id="PostworkModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post Work Here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="txtUid" name="txtUid" value='<?php echo $_SESSION["activeuser"];?>' disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Category of Work</label>
                                    <select id="txtCategory" name="txtCategory" class="form-control" tabindex="5">
                                        <option selected>Choose...</option>
                                        <option value="Plumber">Plumber</option>
                                        <option value="Wood Work">Wood Work</option>
                                        <option value="AC Repair">AC Repair</option>
                                        <option value="Appliance Repair">Appliance Repair</option>
                                        <option value="Electrician">Electrician</option>
                                        <option value="Carpenter">Carpenter</option>
                                        <option value="Dry Cleaning">Dry Cleaning</option>
                                        <option value="Disinfection">Disinfection</option>
                                        <option value="Cleaning Services">Cleaning Services</option>
                                        <option value="Car Repair">Car Repair</option>
                                        <option value="Bricks Man">Bricks Man</option>
                                        <option value="Painter">Painter</option>
                                        <option value="Flooring Services">Flooring Services</option>
                                        <option value="Metal Framing">Metal Framing</option>
                                        <option value="Wooden Flooring">Wooden Flooring</option>
                                        <option value="Tiling Services">Tiling Services</option>
                                        <option value="Kitchen Repair">Kitchen Repair</option>
                                        <option value="Sofa Cleaning">Sofa Cleaning</option>
                                        <option value="Computer Repair">Computer Repair</option>
                                        <option value="Metal Work">Metal Work</option>
                                        <option value="Wooden Framing">Wooden Framing</option>
                                        <option value="Glass Door Services">Glass Door Services</option>
                                        <option value="Other">Others…</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Details of Work</label>
                                <input type="text" class="form-control" id="txtWorkinfo" name="txtWorkinfo">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Location of Task</label>
                                        <input type="text" class="form-control" id="txtLocation" name="txtLocation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="txtCity" name="txtCity">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <input type="button" value="Post Work" class="btn btn-success cen" id="btnpostwork">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--=-=-=-=-Requirement Manager Modal=-=-=-=--->
        <div class="modal fade" id="RequirementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Past Posts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <table width="100%" border="1">
                                <tr>
                                    <td width="10%" align="center">
                                        Category
                                    </td>
                                    <td width="20%" align="center">
                                        Problem
                                    </td>
                                    <td width="20%" align="center">
                                        Location
                                    </td>
                                    <td width="20%" align="center">
                                        City
                                    </td>
                                    <td width="20%" align="center">
                                        Date of Post
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr ng-repeat="obj in jsonArray">
                                    <td width="10%" align="center">
                                        {{obj.category}}
                                        <input type="hidden" value={{obj.rid}}>
                                    </td>
                                    <td width="20%" align="center">
                                        {{obj.problem}}
                                    </td>
                                    <td width="20%" align="center">
                                        {{obj.location}}
                                    </td>
                                    <td width="20%" align="center">
                                        {{obj.city}}
                                    </td>
                                    <td width="20%" align="center">
                                        {{obj.dop}}
                                    </td>
                                    <td>
                                        <input value="Delete Record" type="button" ng-click="doDel(obj.rid);">
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
