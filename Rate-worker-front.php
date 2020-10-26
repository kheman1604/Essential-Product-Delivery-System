<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rate Worker</title>
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/angular.min.js"></script>
    
    <style>
        .hide {
            display: none;
        }

        label {
            font-size: 3rem;
        }

        .rating {
            direction: rtl;
        }

        .rating>label:hover::before,
        .rating>label:hover~label:before,
        .rating>input:checked~label:before {
            color: gold;
            content: "\2605";
            position: absolute;
        }
        .rating>label:hover::before,
        .rating>label:hover~label:before{
        }
    </style>
    
    <script>
        var Module = angular.module("Ratingsmodule", []);
        Module.controller("RatingsController", function($scope, $http) {
            $scope.uid;
            $scope.jsonarray;
            $scope.doFetch = function() {
                /*alert($scope.uid);*/
                var uid1=angular.element(document.getElementById("uid"));
                var uid=uid1.val();
                $http.get("Json-fetch-ratingdata.php?customeruid=" + uid).then(okFx, notokFx);

                function okFx(response) {
                   /* alert(JSON.stringify(response.data));*/
                    $scope.jsonarray = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }
            }


            $scope.dopost = function(rid, workerid, index) {
                console.log(rid);

                var ele = document.getElementsByName(rid);
                for (i = 0; i < ele.length; i++) {
                    if (ele[i].checked) {
                        $scope.ratingsValue = ele[i].value;
                        $http.get("citizen-updateRatings.php?uid=" + workerid + "&rating=" + $scope.ratingsValue + "&rid=" + rid).then(ok, notok);

                        function ok(response) 
                        {
                            alert(response.data);
                            if (response.data == "ok")
                            {
                                $scope.jsonarray.splice(index, 1);
                            }
                        }
                        function notok(response)
                        {
                            alert(response.data);

                        }
                    }
                }

            }


        });

    </script>
</head>

<body ng-app="Ratingsmodule" ng-controller="RatingsController" ng-init="doFetch()">
   <center>
    <h1>Rate The Worker</h1>
    </center>
    <input type="hidden" value="<?php echo $_SESSION['activeuser']; ?>" readonly id="uid">
   <!-- <div ng-click=doFetch() class="btn btn-primary">Fetch</div>-->
    <table width="90%" class="table table-striped">
        <tr>
            <td>
                Worker Id
            </td>
            <td>
                Rate
            </td>
            <td>
                Post
            </td>
        </tr>
        <tr ng-repeat="obj in jsonarray">
            <td>
                {{obj.workerid}}
            </td>
            <td>
                <form>
                    <div class="rating">
                        <input type="radio" name={{obj.rid}} class="hide" id="star5-{{obj.rid}}" value="5"><label for="star5-{{obj.rid}}">&#9734;</label>
                        <input type="radio" name={{obj.rid}} class="hide" id="star4-{{obj.rid}}" value="4"><label for="star4-{{obj.rid}}">&#9734;</label>
                        <input type="radio" name={{obj.rid}} class="hide" id="star3-{{obj.rid}}" value="3"><label for="star3-{{obj.rid}}">&#9734;</label>
                        <input type="radio" name={{obj.rid}} class="hide" id="star2-{{obj.rid}}" value="2"><label for="star2-{{obj.rid}}">&#9734;</label>
                        <input type="radio" name={{obj.rid}} class="hide" id="star1-{{obj.rid}}" value="1"><label for="star1-{{obj.rid}}">&#9734;</label>
                    </div>
                </form>

            </td>
            <td>
                <div ng-click=dopost(obj.rid,obj.workerid,$index) class="btn btn-primary">Post</div>
            </td>
        </tr>
    </table>
</body>

</html>
