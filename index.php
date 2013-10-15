<link href="/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bootstrap/assets/js/jquery.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>
<!-- Modal -->
<div class="modal fade" id="regForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Registration</h4>
            </div>
            <div id="user-registration-form" class="modal-body">
                <form name="register" action="user_register.php" method="post" class="form-horizontal" role="form" >

                   
					<div class="form-group">
                        <label for="reg-first-name" class="col-lg-2 control-label">First Name</label>
                        <div class="col-lg-6">
                            <input name="user_first_name" type="text" class="form-control" id="reg-first-name" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-last-name" class="col-lg-2 control-label">Last Name</label>
                        <div class="col-lg-6">
                            <input name="user_last_name" type="text" class="form-control" id="reg-last-name" placeholder="Last Name">
                        </div>
                    </div>

                    <!-- File Upload Picture ##REMOVED FILE UPLOAD NICK MIERS
                    <div class="form-group">
                        <label for="reg-picture" class="col-lg-2 control-label">Picture</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="reg-picture" >
                        </div>
                    </div>-->
					
					<div class="form-group">
                        <label for="reg-user-login" class="col-lg-2 control-label">User Login</label>
                        <div class="col-lg-6">
                            <input name="user_login" type="text" class="form-control" id="reg-first-name" placeholder="Login Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-email" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-6">
                            <input name="user_email" type="email" class="form-control" id="reg-email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-6">
                            <input name="pass1" type="password" class="form-control" id="reg-password" placeholder="Password">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="reg-password" class="col-lg-2 control-label">Confirm Password</label>
                        <div class="col-lg-6">
                            <input name="pass2" type="password" class="form-control" id="reg-password" placeholder="Password">
                        </div>
                    </div>

                    <!-- Email address : <input type="text" name="email" /> <br> -->
                    <!--Password :      <input type="password" name="password" /> -->


                    <br>

                <!--</form> moved to include button-->
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitReg" class="btn btn-large btn-primary" >Register</button>
				</div>
			</form> <!-- moved form tag to include register button-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: C207-8a
 * Date: 10/1/13
 * Time: 5:09 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<style>
    body{
        padding-top: 50px;
    }
    #password_holder{
        width: 300px;
        padding:10px;
        border:1px solid #404040;
        border-radius: 5px;
        display: block;
        background-color: #CCC;

    }
    .center
    {
        margin-left:auto;
        margin-right:auto;
        width:70%;
        background-color:#b0e0e6;
    }
</style>

<div  id="password_holder" class="center" >
    <form name="register" action="user_login.php" method="post" class="form-horizontal" role="form" >
        <h1>Please Login</h1>

        <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-6">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-6">
                <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
            </div>
        </div>

        <!-- Email address : <input type="text" name="email" /> <br> -->
        <!--Password :      <input type="password" name="password" /> -->

        <button type="submit" class="btn btn-large btn-primary" >Login</button>
        <br>
        <a  class='btn  btn-link' id="regButton" >Need to register? Click Here!</a>
    </form>
</div>
<script>
    $("#regButton").click(function(){
        console.log('test');
        $('#regForm').modal('toggle');
    });
</script>