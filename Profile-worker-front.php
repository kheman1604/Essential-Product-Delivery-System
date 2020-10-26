<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Seller Profile</title>
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
                $('#PrevProfilePic').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

          }
        
        function showpreview1(file) 
        {

        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (ev) {
                $('#PrevAadhar').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

          }
    </script>
    <!--=-=-=-=-=-Json Fetch Profile Request=-=-=-=-=-=-->
    <script>
        $(document).ready(function(){
                var uid=$("#txtUid").val();
                var url="Json-Fetch-Worker-Profile.php?uid="+uid;
                $.getJSON(url,function(JsonAryResponse){
                   /* alert(JSON.stringify(JsonAryResponse));*/
                    if(JsonAryResponse.length==0)
                        {
                            $("#errUid").html("Invalid Id");
                        }
                    else
                        {
                            $("#txtEmail").val(JsonAryResponse[0].email);
                            $("#txtName").val(JsonAryResponse[0].sellername);
                            $("#txtContact").val(JsonAryResponse[0].contact);
                            $("#txtfirm").val(JsonAryResponse[0].firmshop);
                            $("#txtAddress").val(JsonAryResponse[0].address);
                            $("#txtCity").val(JsonAryResponse[0].city);
                            $("#txtState").val(JsonAryResponse[0].states);
                            $("#txtPincode").val(JsonAryResponse[0].pincode);
                            $("#txtotherinfo").val(JsonAryResponse[0].otherinfo);
                            $("#PrevProfilePic").attr("src","Uploads/"+JsonAryResponse[0].profilepic);
                            $("#PrevAadhar").attr("src","Uploads/"+JsonAryResponse[0].aadharpic);
                            $("#hdn1").val(JsonAryResponse[0].profilepic)
                            $("#hdn2").val(JsonAryResponse[0].aadharpic)
                        }
                });
        });
    
    </script>
</head>

<body>
    <div id="container">
       <center><h1>|--Worker Profile--|</h1></center>
       <br>
        <form action="Profile-worker-process.php" method="post" enctype="multipart/form-data">
           <input type="hidden" id="hdn1" name="hdn1">
           <input type="hidden" id="hdn2" name="hdn2">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" id="txtUid" name="txtUid"  value='<?php echo $_SESSION["activeuser"];?>'>
                    <span id="errUid">*</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                </div>
               <!-- <div class="col-md-3">
                   <label>&nbsp;</label>
                    <input type="button" class="form-control btn-outline-primary" id="btnFetchProfileWorker" value="Fetch Profile">
                </div>-->
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" id="txtName" name="txtName">
                </div>
                <div class="form-group col-md-6">
                    <label>Contact</label>
                    <input type="text" class="form-control" id="txtContact" name="txtContact">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Firm/Shop</label>
                    <input type="text" class="form-control" id="txtfirm" name="txtfirm">
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="1234 Main St">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" id="txtCity" name="txtCity">
                </div>
                <div class="form-group col-md-4">
                    <label>State</label>
                    <select id="txtState" name="txtState" class="form-control" tabindex="5">
                        <option selected>Choose...</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Pincode</label>
                    <input type="text" class="form-control" id="txtPincode" name="txtPincode">
                </div>
            </div>
            <div class="form-row">
               <div class="col-md-12">
                <label>Other Information</label>
                <br>
                <textarea class="col-md-12" rows="10" cols="30" id="txtotherinfo" name="txtotherinfo"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <center><img src="Pics/Profile-Illustration.jpg" style="width:200px; height:200px; border:1px solid black;" id="PrevProfilePic"></center>
                </div>
                 <div class="col-md-6">
                    <center><img src="Pics/Profile-Illustration.jpg" style="width:200px; height:200px; border:1px solid black;" id="PrevAadhar"></center> 
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-6">
                   <center>
                    <label>Upload Profile Pic : </label>
                    <input type="file" id="ProfilePic" name="ProfilePic" onchange="showpreview(this)">
                    </center>
                </div>
                 <div class="col-md-6">
                   <center>
                    <label>Upload Aadhar Card : </label>
                    <input type="file" id="Aadhar" name="Aadhar" onchange="showpreview1(this)">
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
