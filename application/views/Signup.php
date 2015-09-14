        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                                <a id="signinlink" href="<?php echo base_url("User_controller/signin");?>" onclick="$('#signupbox').hide(); $('#loginbox').show()">
                                    Sign In
                                </a>
                            </div>
                        </div>  
                        
                        <div class="panel-body" >
<?php
                                echo form_open(base_url("User_controller/add_user"),array('class' => 'form-horizontal',
                                                     'role'  => 'form',
                                                     'id'    => 'signupform') );
?>                                

                                <!-- ***************************** User Name ********************************-->
                                <div class="form-group">
<?php
                                         echo form_label('User Name ','username',array('class'=>'col-md-3 control-label'));
?>                                
                                         <div class="col-md-9">
<?php
                                                  $data = array('name'        => 'username',
                                                                'value'       => set_value('username',"",false),                                     
                                                                'class'       => 'form-control',
                                                                'placeholder' => 'Enter User Name' );
                                                  echo form_input($data); 
?>
                                         </div>
                                </div>   

                                <!-- ***************************** Passsword ********************************-->
                                <div class="form-group">
<?php
                                        echo form_label('Password ','password',array('class'=>'col-md-3 control-label'));?>
                                        <div class="col-md-9">
<?php
                                               $data = array('name'        => 'passwd',                                            
                                                             'class'       => 'form-control',
                                                             'placeholder' => 'Enter Your Password');
                                               echo form_password($data); 
?>
                                        </div>
                                </div>

                                 <!-- ***************************** Confirm Passsword ********************************-->
                                 <div class="form-group">
<?php
                                      echo form_label('Confirm Password ','passwd_conferm',array('class'=>'col-md-3 control-label'));?>
                                      <div class="col-md-9">
<?php
                                                $data = array('name'        => 'passwd_conferm',                                            
                                                              'class'       => 'form-control',
                                                              'placeholder' => 'Confirm Your Password');
                                                echo form_password($data); 
?>
                                      </div>
                                </div>

                                <!-- ***************************** First Name ********************************-->
                                <div class="form-group">
<?php
                                      echo form_label('First Name ','firstname',array('class'=>'col-md-3 control-label'));
?>
                                      <div class="col-md-9">
<?php
                                                 $data = array('name'        => 'firstname',
                                                               'value'       => set_value('firstname',"",false),                                             
                                                               'class'       => 'form-control',
                                                               'placeholder' => 'Enter Your First Name');
                                                 echo form_input($data); 
?>
                                     </div>
                                </div>

                                 <!-- ***************************** Last Name ********************************-->
                                <div class="form-group">
<?php
                                      echo form_label('Last Name ','lastname',array('class'=>'col-md-3 control-label'));
?>
                                      <div class="col-md-9">
<?php
                                                $data = array('name'        => 'lastname',  
                                                              'value'       => set_value('lastname',"",false),                                          
                                                              'class'       => 'form-control',
                                                              'placeholder' => 'Enter Your Last Name');
                                                echo form_input($data); 
?>
                                     </div>
                                </div>
                              
                                <!-- ***************************** Email ********************************-->
                                <div class="form-group">
<?php  
                                      echo form_label('Email  ','email',array('class'=>'col-md-3 control-label'));
?>                           
                                      <div class="col-md-9">
<?php
                                             $data = array('name'        => 'email',                                            
                                                           'class'       => 'form-control',
                                                           'value'       =>  set_value('email',"",false), 
                                                           'placeholder' => 'Enter Your Email Address');
                                             echo form_input($data); 
?>
                                      </div>
                               </div>
                                
                                <!-- ***************************** Sign Up Button ********************************-->
                                <div class="form-group">                                
                                       <div class="col-md-offset-3 col-md-9">
<?php
                                              $data = array('name'  => 'submit',
                                                            'value' => 'Sign Up',
                                                            'class' => 'btn btn-info',
                                                            'id' => 'btn-signup');  
                                              echo form_submit($data);
?>
                                       </div>
                                </div>  

                                <!-- ***************************** Display Form Errors ********************************-->
                                <div id="signupalert" style="class='alert alert-danger'">
                                    <p> 
<?php 
                                            echo validation_errors("<div class='alert alert-danger fade in' role='alert' >".
                                                                   "<a class='close' data-dismiss='alert' aria-label='close'>&times;</a>","</div>");
?>
                                    </p>
                                    <span></span>
                                </div>                        
<?php                          
                                form_close();
?>
                        </div> <!-- end of panel-body Div -->
                    </div> <!-- end of panel-info Div -->             
        </div> <!-- end of mainbox Div -->