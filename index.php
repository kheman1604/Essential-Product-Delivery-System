<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="JS/bootstrap.min.js"></script>
    <link href="CSS/Myproject-front-css1.css" rel="stylesheet">

    <style>
        /*=-=-=-=-=Password Eye CSS Start-=-=-=-=-=-*/
        #passwordBlock {
            display: flex;
            width: 100%;
            align-items: center;
            border: 1px solid #d3d3d3;
            border-radius: 5px;
        }

        #txtPwdLogin {
            border: none;
            border-right: 1px solid #d3d3d3;
            border-radius: 0px;
        }

        #eye-show-hide {
            margin: 0px 10px;

        }

        /*=-=-=-=-=Password Eye CSS End-=-=-=-=-=-*/

    </style>
    <!--JQUERY FOR ALL PROCESSES-->
    <script>
        $(document).ready(function() {
            var jasus1;
            var jasus2;
            /*=-=-=-=-=-=-=-=-AJAX VALIDAION OF UID=-=-=-=-=-=-=-=-=-=-=*/
            $("#txtUid").blur(function() {
                var Uid = $("#txtUid").val();
                var check = "validateuid";
                var actionurl = "Ajax-Signup-Process.php?Uid=" + Uid + "&check=" + check;
                $.get(actionurl, function(response) {
                    if (response == "Avaliable") {
                        jasus1 = false;
                        $("#emailHelp").html(response).css("color", "Green");
                        $("#SignupSumbitbtn").removeAttr("disabled");
                    } else {
                        jasus1 = true;
                        $("#emailHelp").html(response).css("color", "Red");
                        $("#SignupSumbitbtn").attr("disabled", "disabled");
                    }
                });
            });

            /*=-=-=-=-=-=-=-=-AJAX VALIDAION OF MOBILE=-=-=-=-=-=-=-=-=-=-=*/
            $("#txtMob").blur(function() {
                var Mob = $("#txtMob").val();
                var check = "validatemob";
                var actionurl = "Ajax-Signup-Process.php?Mob=" + Mob + "&check=" + check;
                $.get(actionurl, function(response) {
                    if (response == "Avaliable") {
                        jasus2 = false;
                        $("#MobileHelp").html(response).css("color", "Green");
                        $("#SignupSumbitbtn").removeAttr("disabled");
                    } else {
                        jasus2 = true;
                        $("#MobileHelp").html(response).css("color", "Red");
                        $("#SignupSumbitbtn").attr("disabled", "disabled");
                    }
                });
            });

            /*=-=-=-=-=-=-=-=-PASSWORD REGULAR EXPRESSION=-=-=-=-=-=-=-=-=-=-=*/
            $("#txtPwd").blur(function() {
                var pass = $(this).val();
                var validpass = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                if (validpass.test(pass) == false)
                    $("#PassHelp").html("Password Must Have : <li>1 Special Charcter</li> <li> 1 Number</li> <li> 1 LowerCase Letter</li> <li> 1 UpperCase Letter</li>").css("color", "red");
                else
                    $("#PassHelp").html("Alright").css("color", "green");
            });

            /*=-=-=-=-=-=-=-=-AJAX FORM SUBMIT =-=-=-=-=-=-=-=-=-=-=*/
            $("#SignupSumbitbtn").click(function() {
                var Uid = $("#txtUid").val();
                var Pwd = $("#txtPwd").val();
                var Mob = $("#txtMob").val();
                var RadValue = $('input:radio[name=RadSignup]:checked').val(); // Taking Out VAlue of the Checked radio Button .
                if (jasus1 = true) {
                    $("#emailHelp").html("This User Id is Not avaliable").css("color", "red");
                }
                if (jasus2 = true) {
                    $("#MobileHelp").html("This Mobile Number is Already in Use").css("color", "red");
                }
                if (Uid == "" || Pwd == "" || Mob == "") {
                    $("#submitresponse").html("<i class='fa fa-exclamation-triangle'></i>Please Fill In All the Feilds");
                    return;
                }
                var check = "signup";
                var actionurl = "Ajax-Signup-Process.php?Uid=" + Uid + "&Mob=" + Mob + "&Pwd=" + Pwd + "&check=" + check + "&Category=" + RadValue;
                $.get(actionurl, function(Response) {
                    $("#submitresponse").html(Response);
                });
            });

            /*=-=-=-=-JSON LOGIN REQUEST=-=-=-=-=*/

            $("#btnLogin").click(function() {
                var uid = $("#txtUidLogin").val();
                var pwd = $("#txtPwdLogin").val();
                var url = "Login-Process.php?uid=" + uid + "&pwd=" + pwd;
                $.get(url, function(Response) {
                    /*alert(JSON.stringify(jsonAryResponse));*/
                    if (Response == "Buyer") {
                        location.href = "Dash-Citizen.php";
                    } else
                    if (Response == "Seller") {
                        location.href = "Dash-Worker.php";
                    } else if (Response == "Admin") {
                        location.href = "Admin-Dash.php";
                    }else{
                        $("#LoginResponse").html("&nbsp Invalid Username or Password");
                    }
                });
            });

            /*=-=-=-=-AJAX FORGOT PASS REQUEST=-=-=-=-=-=-=-=-=-=-*/

            $("#btnGetPass").click(function() {
                var uid = $("#txtUidForgot").val();
                if (uid == "") {
                    $("#UidForgotHelp").html("Please Enter Your Uid");
                    return;
                }
                var check = "forgotpass";
                var actionurl = "Ajax-Signup-Process.php?uid=" + uid + "&check=" + check;
                $.get(actionurl, function(response) {
                    if (response.length == 0) {
                        $("#ForgotpassResponse").html("<font style='font-size:30px;'>Invalid Id</font>");
                    } else
                        $("#ForgotpassResponse").html("Your Password is : <font style='font-size:30px;'>".concat(response).concat("</font>"));
                });

            });
        });

    </script>
    <!--JAVA SCRIPT FOR PASSWORD SHOW HIDE-->
    <script type="text/javascript">
        function doShowpwd() {
            var initial = document.getElementById("eye-show-hide");
            var pwd = document.getElementById("txtPwdLogin");
            if (pwd.type == "password") {
                pwd.type = "text";
                initial.className = "fa fa-fw fa-eye-slash";
            } else {
                pwd.type = "password";
                initial.className = "fa fa-fw fa-eye";
            }
        }

    </script>
</head>

<body>
    <div id="container">
            <!--=--=-=-=-=-NAVBAR START=-=-=-=-=-=-=--->
            <div id="overall-div">
                <div id="nav-top">
                    <nav class="navbar navbar-expand-lg navbar-light" id="NavBar" style="background-color:transparent;">
                        <a id="nav-logo" href="#" style="color:Black;">Essential Product Delivery System</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto" id="NavItems">
                                <!--<li class="nav-item active text-center mt-2">
                                    <a class="nav-link" href="#" style="color:black;">Home</a>
                                </li>-->
                                <li class="nav-item mt-2 text-center">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#SignupModal">
                                        SignUp
                                    </button>
                                </li>
                                <li class="nav-item text-center mt-2">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#LoginModal">
                                        Login
                                    </button>
                                </li>
                               <!-- <li class="nav-item dropdown text-center mt-2">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#ForgotModal">
                                        Forgot Password
                                    </button>
                                </li>-->
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--=--=-=-=-=-NAVBAR END=-=-=-=-=-=-=--->
                <!--=-=-=Carousel Div-=-=-=--->
                <div id="carousel-div">
                    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            
                               <div class="carousel-item active">
                                <img src="Pics/1585227854.jpg" class="d-block w-100" alt="...">
                            </div>
                               <div class="carousel-item">
                                <img src="Pics/CArousel%20New.jpg" class="d-block w-100" alt="...">
                            </div>
                            
                            <div class="carousel-item">
                                <img src="Pics/1586409155.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div id="cards-div">
                    <h3>Our Services</h3>
                    <div class="card-deck m-5">
                        <div class="card">
                            <div id="cardimage">
                                <img src="Pics/undraw_co-workers_ujs6%20(1).svg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">SHOP ESSENTIALS</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam provident delectus fugit placeat dolores necessitatibus mollitia soluta unde, similique neque.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div id="cardimage">
                                <img src="Pics/undraw_hire_te5y.svg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">TRUSTED SELLERS IN LOCALITY</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, animi? Obcaecati doloribus dicta corporis officia optio, eligendi accusantium, deleniti eius!</p>
                            </div>
                        </div>
                        <div class="card">
                            <div id="cardimage">
                                <img src="Pics/undraw_contract_uy56.svg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> 100% SAFE DELIVERY </h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime esse asperiores repellat molestiae dolorum nesciunt! Consectetur assumenda doloremque laboriosam nesciunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal SignUp-->
        <div class="modal fade" id="SignupModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Signup Here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="txtUid">User Id</label>
                                <input type="text" class="form-control" id="txtUid">
                                <small id="emailHelp" class="form-text">*</small>
                            </div>
                            <div class="form-group">
                                <label for="txtPwd">Password</label>
                                <input type="password" class="form-control" id="txtPwd" name="txtPwd">
                                <small id="PassHelp" class="form-text">*</small>
                            </div>
                            <div class="form-group">
                                <label for="txtMob">Mobile</label>
                                <input type="mobile" maxlength="10" class="form-control" id="txtMob" name="txtMob">
                                <small id="MobileHelp" class="form-text">*</small>
                            </div>
                            <div class="form-group">
                                <label for="txtMob">Signup As:</label><br>
                                <input type="radio" id="RadCitizen" name="RadSignup" value="Buyer"> Buyer
                                <input type="radio" id="RadWorker" name="RadSignup" value="Seller"> Seller
                            </div>
                            <button type="button" class="btn btn-primary" id="SignupSumbitbtn">Submit</button>
                            <span id="submitresponse" style="font-weight:bold;"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Login-->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="txtUidLogin">User Id</label>
                                <input type="text" class="form-control" id="txtUidLogin" name="txtUidLogin">
                                <small id="UidHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="txtPwdLogin">Password</label>
                                <div id="passwordBlock">
                                    <input type="password" class="form-control" id="txtPwdLogin" name="txtPwdLogin">
                                    <span id="eye-show-hide" class="fa fa-fw fa-eye" onclick="doShowpwd()" style="cursor:pointer;"></span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnLogin">Login</button>
                            <button type="button" class="btn" data-toggle="modal" data-target="#ForgotModal">
                                        Forgot Password
                            </button>
                            <span id="LoginResponse">*</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ForgotPassword-->
        <div class="modal fade modal-xl" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User ID</label>
                                <input type="text" class="form-control" id="txtUidForgot" url="txtUidForgot">
                                <small id="UidForgotHelp" class="form-text">*</small>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnGetPass">Get Password</button>
                            <span id="ForgotpassResponse">

                            </span>
                        </form>
                    </div>
                </div>
            </div>
      </div>
</body>

</html>
