        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                     <!-- ****************************** Log In Title ********************************-->          
                    <div class="panel-heading">
                          <div class="panel-title"> 
<?php
                                 echo  (!empty($sign_up_success))?"Your Inforamtion has been registered, Please Sign In ...":"Sign In";
?>
                          </div>
                    </div>     
                    
                    <div style="padding-top:30px" class="panel-body" >
<?php
                            echo form_open(base_url("User_controller/check_user"),
                                           array('class' => 'form-horizontal',
                                                 'role'  => 'form',
                                                 'id'    => 'loginform') );
 ?>                                
                            <!-- ***************************** User  Name ********************************-->
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                        </span>
<?php
                                        $data = array('name'        => 'username',
                                                      'value'       => set_value('username',"",false),                                     
                                                      'class'       => 'form-control',
                                                      'placeholder' => 'Enter your User Name' ,
                                                      'id'          => 'login-username' );
                                        echo form_input($data); 
?>
                            </div>
                                
                            <!-- ***************************** Password ********************************-->   
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<?php
                                                   $data = array('name'        => 'password', 
                                                                 'id'          => 'login-password',                                           
                                                                 'class'       => 'form-control',
                                                                 'placeholder' => 'Enter your Password' );
                                                   echo form_password($data); 
?>
                            </div>

                            <!-- ***************************** Log IN Button ********************************-->
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                                                      <?php
                                              $data = array('name'  => 'submit',
                                                            'value' => 'Login',
                                                            'class' => 'btn btn-success',
                                                            'id'    => 'btn-login');  
                                              echo form_submit($data);
?> 
                                    </div>
                            </div>
     
                            <!-- ***************************** Sign Up Link ********************************-->
                            <div class="form-group">
                                   <div class="col-md-12 control">
                                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                                         Don't have an account! 
                                                        <a href="<?php echo base_url("User_controller/signup");?>" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                                                 Sign Up Here
                                                       </a>
                                            </div>
                                   </div>
                            </div>  
<?php
                            echo validation_errors("<div class='alert alert-danger fade in' role='alert'>".
                                                   "<a class='close' data-dismiss='alert' aria-label='close'>&times;</a>","</div>");                    
                            echo form_close();     
?>
                    </div> <!-- End Of Panel-Body Div -->                     
            </div> <!-- End Of Panel-Info Div -->  
        </div> <!-- End Of mainbox Div --> 