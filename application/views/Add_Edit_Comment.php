
<?php 
        $x =base_url("Comment_controller/add_edit_comment/".(empty($comment)?"":$comment->id));
        echo form_open($x,array( 'class' => 'form-horizontal',
                                 'role'  => 'form' ) );
        echo form_hidden('post_id',$id);
?>
        <!-- *************************** Comment Text ********************************* -->      
        <div class="form-group">
<?php
             $data = array('class' => 'control-label col-xs-4 col-sm-4 col-md-3 col-lg-2');
             echo form_label('Your Comment:','content', $data);
?>
             <div class="col-xs-8 col-sm-8 col-md-9 col-lg-10">
<?php 
                   $data = array('name'        => 'content',
                                 'value'       => set_value('content',empty($comment)?"":$comment->content,false),
                                 'style'       => 'width:50%',
                                 'class'       => 'form-control',
                                 'placeholder' => 'What is on your mind');
                   echo form_input($data); ?>
             </div>
        </div>

        <!-- *************************** Comment Button For ADD or EDIT ********************************* -->
        <div class="form-group">
            <div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10 col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-success">
<?php
                      echo empty($comment)?"Add Comment ":"Edit Comment ";
?>
                      <span class="glyphicon glyphicon-comment"></span>
                </button>
            </div>
        </div>

         <!-- *************************** Error Display Div ********************************* -->
        <div class="form-group">
                 <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10 col-lg-offset-2 col-lg-10">
<?php 
                        echo validation_errors("<div class='alert alert-danger fade in' role='alert' style='width:50%'>".
                                               "<a class='close' data-dismiss='alert' aria-label='close'>&times;</a>","</div>");
                        echo form_close();
?>
                 </div>
        </div>
        