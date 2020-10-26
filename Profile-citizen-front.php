<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Citizen Profile</title>
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
        #PreviewProfilePic
        {
            width: 170px;
            height: 170px;
            border: 2px solid grey;
            border-radius: 50%;
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
                $('#PreviewProfilePic').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

          }
    </script>
    <!--=-=-=-=-=-=Json Fetch Request-=-=-=-=-=-=-->
    <script>
          $(document).ready(function(){
            /*  $("#btnFetchProfile").click(function(){*/
                  var uid=$("#txtUid").val();
                  var url="Json-Fetch-Citizen-Profile.php?Uid="+uid;
                  $.getJSON(url,function(JsonAryResponse){
                      /*alert(JSON.stringify(JsonAryResponse));*/
                      if(JsonAryResponse.length==0)
                          $("#errUid").html("Invalid Id");
                      else
                          {
                              $("#txtName").val(JsonAryResponse[0].name);
                              $("#txtContact").val(JsonAryResponse[0].contact);
                              $("#txtAddress").val(JsonAryResponse[0].address);
                              $("#txtCity").val(JsonAryResponse[0].city);
                              $("#txtState").val(JsonAryResponse[0].state);
                              $("#txtPin").val(JsonAryResponse[0].pincode);
                              $("#txtEmail").val(JsonAryResponse[0].email);
                              $("#PreviewProfilePic").attr("src","Uploads/"+JsonAryResponse[0].picname);
                              $("#hdn").val(JsonAryResponse[0].picname);
                          }
                  });
              /*});*/
          });
    </script>
</head>

<body>
    <div id="container">
        <form action="Profile-citizen-process.php" enctype="multipart/form-data" method="post">
           <input type="hidden" id="hdn" name="hdn">
            <div class="form-row">
               <div class="form-group col-md-2">
                   <img src="Pics/Profile-Illustration.jpg" id="PreviewProfilePic">
               </div>
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control" id="txtUid" name="txtUid" value='<?php echo $_SESSION["activeuser"];?>' >
                    <span id="errUid">*</span>
                </div>
                <!--<div class="form-group col-md-4">
                    <label>&nbsp;</label>
                    <input type="button" class="form-control btn-primary" id="btnFetchProfile" value="Fetch Profile">
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
            <div class="form-group">
                <label for="txtAddress">Address</label>
                <input type="text" class="form-control" id="txtAddress" name="txtAddress">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCity">City</label>
                    <input type="text" class="form-control" id="txtCity" name="txtCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtState">State</label>
                    <select id="txtState" name="txtState" class="form-control selectpicker">
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
                    <label for="inputZip">Pin Code</label>
                    <input type="text" class="form-control" id="txtPin" name="txtPin">
                </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Profile Picture </label>
                    <br>
                    <input type="file" name="ProfilePic" id="ProfilePic" name="ProfilePic"  onchange="showpreview(this)">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                </div>
            </div>
            <button type="submit" name="btn" value="save" class="btn btn-primary" id="btnSave">Save</button>
            <button type="submit" name="btn" value="update" class="btn btn-primary" id="btnUpdate">Update</button>
        </form>
    </div>
</body>

</html>
