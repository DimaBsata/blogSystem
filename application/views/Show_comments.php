	<div class="container">
		<h2>Comments:</h2>
			<table class="table">
				<tbody>
<?php 
					if ( empty($comments) )
						      echo " &nbsp&nbsp No Comments";
				    foreach ($comments as $comment)
					{
?>
			    		<tr class="<?php echo alternator('success','danger','info');?>"> <!-- one row for each comment -->

			    		    <!-- *************** Comment User Name ************** -->
							<td style="width:10%"> 
									<strong>
<?php
											 echo $comment->username;
?>
									</strong>
					        </td>

							<!-- **************** Comment Date ********************* -->

					        <td style="width:10%"> 
									<span class="label label-warning">
									<?php 	
									      	echo " Added: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$comment->date."&nbsp&nbsp";								
											if (!empty($comment->last_modified))
											{

													echo br();
													echo " Last Modified: &nbsp  ".$comment->last_modified;
											}
?>
									</span>
					        </td>

						    <!-- ******************* Comment Text ********************* -->
					        <td style="width:60%">  
<?php 
									echo $comment->content;
?>
							</td>

							<!-- ************ Button for editting the comment ************-->
					     	<td style="width:10%; align:right" >
<?php
								  $data = array('class'  => 'btn btn-info',
								  	            'target' => '_self');
								  $post_id = $id;
								  echo anchor(base_url('Comment_controller/show_edit_comment/'.$comment->id.'/'.$post_id),"Edit <span class='glyphicon glyphicon-edit'></span>",$data);
?>
							</td>

							<!-- ************ Button for deleting the comment ************ -->
					    	<td style="width:10%; align:right"> 
<?php 							  $data = array('class'  => 'btn btn-danger',
	             								'target' => '_self' );
								  echo anchor(base_url('Comment_controller/delete_comment/'.$comment->id.'/'.$post_id),"Delete <span class='glyphicon glyphicon-remove'></span>",$data);
?>
							</td>
						</tr>
				        <tr>
				        	<td>  </td>
				        	<td>  </td>
				        </tr>
<?php 
				    }//close foreach
?>
		        </tbody>
		    </table>
	</div> <!-- end of Container Div -->