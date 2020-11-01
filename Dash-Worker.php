<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Worker Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="JS/bootstrap.min.js"></script>
    <link href="CSS/Dash-worker.css" rel="stylesheet" type="text/css">
    <style>
        * {
            margin: 0;
            padding: 0;

        }

    </style>

    <!--=-=-=Ajax Request for Ratings-=-=-=-->
    <script>
        $(document).ready(function() {
            $("#btnSendRequest").click(function() {
                var cid = $("#txtCid").val();
                var wid = $("#txtWid").val();
                var url = "Ajax-Rating-Process.php?cid=" + cid + "&wid=" + wid;
                $.get(url, function(response) {
                    alert(response);
                });
            });
        });

    </script>
</head>

<body>
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
                        <a class="nav-link" href="Dash-Citizen.php" style="font-size:20px; font-weight:500; color:white;"><i class="fa fa-tachometer" style="font-size:20px; "></i>&nbsp;My Dashboard</a>
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
        <!--=-=-=-=-=Navbar Ends Here-=-=-=-=-=--->

        <!--=-=-=-=-=-=-=-Cards=-=-=-=-=-=-=--->
        <center>
            <div class="card-deck  mt-lg-5" style="width:70%;">
                <!--=-=-Profile Card=-=-=-->

                <div class="card">
                    <a href="Profile-worker-front.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_social_user_lff0.svg">
                        </div>
                        <center>
                            <div class="card-body">
                                <h5 class="card-title">Profile</h5>
                                <p class="card-text">Edit Your Profile Information Here .</p>
                            </div>
                        </center>
                    </a>
                </div>

                <!--=-=-Work Post Card=-=-=-->


                <div class="card">
                    <a href="#" data-toggle="modal" data-target="#RatingsModal">
                        <div class="cardimage">
                            <img src="Pics/undraw_personal_goals_edgd.svg">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Request Ratings</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eligendi.</p>
                        </div>
                    </a>
                </div>

                <!--=-=-Find Work Card=-=-=-->

                <div class="card">
                    <a href="List-Products-byseller.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_people_search_wctu.svg">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Add Products</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eligendi.</p>
                        </div>
                    </a>
                </div>

                <!--=-=-Product Manager Card=-=-=-->

                <div class="card">
                    <a href="show%20products.php">
                        <div class="cardimage">
                            <img src="Pics/undraw_people_search_wctu.svg">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Show Products</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eligendi.</p>
                        </div>
                    </a>
                </div>
            </div>
        </center>

        <!-- Modal -->
        <div class="modal fade" id="RatingsModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Get Ratings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Citizen ID</label>
                                <input type="text" class="form-control" id="txtCid" name="txtCid">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Worker ID</label>
                                <input type="text" class="form-control" id="txtWid" name="txtWid" value="<?php echo $_SESSION['activeuser'];?>" readonly>
                            </div>
                            <input type="button" class=" btn btn-primary" value="Send Request" id="btnSendRequest">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
    <script src="JS/app.js" type="text/javascript"></script>
    <script src="JS/particles.js" type="text/javascript"></script>
    <br>
</body>

</html>
