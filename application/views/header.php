<?php
    echo doctype('html5'); 
?>
	<html lang="en">
		<head>
				<title>Simple Blogging System</title>
<?php
				         echo meta('viewport','width=device-width, initial-scale=1; charset=utf-8');
			             echo link_tag('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"');
			             echo link_tag('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"');
?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</head>
		<body>
				<div class="container-fluid">
					<div class="jumbotron" style="background-color:pink; border:1px solid gray; border-top:none;">
						<h1  class="text-center"><span class="glyphicon glyphicon-hand-right"></span> Dima Simple Blog System <span class="glyphicon glyphicon-hand-left"></span></h1>
						<p class="text-center">This is simple task to assest my work.</p>
<?php			                
		                if ($this->session->has_userdata('user_id'))
					    {
					    	/*************** Home Page Anchor *************/
			                $data = array('class'          => 'label label-default',
			                	          'style'          => 'float :right',
			                	          'data-toggle'    => 'tooltip',
	                                      'title'          => 'Go to Home Page to show all Posts',
	                                      'data-placement' => 'bottom');
			                $home = ($this->session->has_userdata('user_id'))?"Post_Controller":"";            
			                echo heading(anchor(base_url($home)," Home Page <span class='glyphicon glyphicon-home'></span>",$data),2);

							/*************** Log Out Button *************/
							$data = array('data-toggle'    => 'modal',
							              'data-target'    => '#myModal',
							              'class'          => 'label label-default',
							              'style'          => 'float: right; margin-right:10px;');
			                echo heading(form_button("log_out"," log Out <span class='glyphicon glyphicon-log-out'></span>",$data),3);

				            /*************** Welcome Message *************/
				            $user_first_name =$this->session->userdata('firstname');
				            $user_last_name =$this->session->userdata('lastname');
				            $data = array('style'=>'color :gray; float:left;');
			                echo heading('Welcome '.$user_first_name.' '.$user_last_name,3,$data);
						}
?>
					</div>

					<!--******************************** Modal ***************************************-->
					<div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					          <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title"> Log Out </h4>
					          </div>
					          <div class="modal-body">
						          <p>Are you sure you Want to log out ?</p>
					          </div>
					          <div class="modal-footer">
					              <a href="<?php echo base_url('User_Controller/log_out');?>" class="btn btn-default" >Yes</a>
					              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					          </div>
					      </div>
					    </div>
					</div>
					<!--***************************End oF Modal Div ************************************-->  
					