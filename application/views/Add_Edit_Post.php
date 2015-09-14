 <div class="container">
      <div class="panel panel-default">
               <div class="panel-heading">
                   <h2> <!-- ***** Echo Page Title ***** -->
<?php
                         echo (empty($post))?"Adding New Post..":"Editting Post...";
?>
                    </h2>
               </div>
               <div class="panel-body">
                    <div class="container">
<?php
                          echo br();
                          $x = 'Post_controller/add_edit_post/'.(empty($post)?"":$post->id);
                          echo form_open_multipart(base_url($x),array('role'=>'form'));?>

                          <!-- *************************** Post Title ********************************* -->
                          <div class="form-group">
<?php
                              echo form_label('Post Title:','title');

                              $data = array('name'        => 'title',
                                            'value'       => set_value('title',(empty($post))?"":$post->title,false),
                                            'style'       => 'width:50%',
                                            'class'       => 'form-control',
                                            'placeholder' => 'Enter Post Title');
                              echo form_input($data); ?>
                          </div>

                          <!-- *************************** Post Description ********************************* -->
                          <div class="form-group">
<?php
                                echo form_label('Post Description:','description');

                                $data = array('name'        => 'description',
                                              'value'       => set_value('description',empty($post)?"":$post->description,false),
                                              'rows'        => '4',
                                              'cols'        => '10',
                                              'style'       => 'width:50%',
                                              'class'       => 'form-control',
                                              'placeholder' => 'Enter Post Description' );
                                echo form_textarea($data); ?>
                          </div>

                          <!-- *************************** Post Content ********************************* -->
                          <div class="form-group">
<?php
                                echo form_label('Post Content:','content');

                                $data = array('name'        => 'content',
                                              'value'       => set_value('content',empty($post)?"":$post->content,false),
                                              'rows'        => '10',
                                              'cols'        => '10',
                                              'style'       => 'width:50%',
                                              'class'       => 'form-control',
                                              'placeholder' => 'Enter Post content' );
                                echo form_textarea($data); ?>
                          </div>

                          <!-- *************************** Post Image ********************************* -->
                          <div class="form-group" >
<?php
                                     echo form_label('Post Image:','fileToUpload');                               
                                     echo br();
                                     $imgurl ="";
                                     if ( !empty($post) )
                                     {
                                           echo form_hidden('image',$post->image);       
                                           $imgurl= $post->image;
                                     }
                                     $data = array('src'    => $imgurl,
                                                   'class'  => 'img-rounded  img-responsive',
                                                   'id'     => 'img',
                                                   'width'  => '304',
                                                   'height' => '236' );
                                     echo img($data);
                              
                                     if (!empty($post))
                                      echo "<p> To upload Another File click below:</p>";
?>
                              </div>

                             <!-- ************************* Post Upload Button **********************************-->
                                <div class="form-group"  enctype="multipart/form-data">   
<?php                      
                                $data = array('type'     => 'file',
                                              'name'     => 'fileToUpload',
                                              'value'    => set_value('fileToUpload',empty($post)?"":$post->image,false),
                                              'style'    => 'width:30%',
                                              'class'    => 'btn btn-default',
                                              'onchange' => 'loadFile(event)',
                                              'accept'   => 'image/jpeg,        image/pjpeg, image/png,   image/x-png,
                                                             image/tiff,        image/bmp, image/x-bmp,   image/x-bitmap,
                                                             image/x-xbitmap,   image/x-win-bitmap,       image/x-windows-bmp,
                                                             image/ms-bmp,      image/x-ms-bmp,           application/bmp,
                                                             application/x-bmp, application/x-win-bitmap, image/gif' );
?>
                                <p>
<?php
                                 echo form_input($data);
?>
                                </p>
                          </div> 

                          <!-- ******************* Button Add Or Edit Post ********************* -->
<?php         
                          $data = array('name'  => 'submit',
                                        'value' => empty($post)?"Add Post":"Edit Post",
                                        'class' => 'btn btn-info btn-lg' );  
                          echo form_submit($data);
                          echo form_close();
                          echo br();
                          echo validation_errors("<div class='alert alert-danger fade in' role='alert' style='width:50%'>".
                        "<a class='close' data-dismiss='alert' aria-label='close'>&times;</a>","</div>");
                          
                          if (isset($error)) //file uploading errors
                          {
?>
                                <div class="alert alert-danger" role="alert">
<?php 
                                      echo $error; 
?>
                                </div> 
<?php 
                          }
?>
                    </div>  <!--close div container-->
            </div> <!--close div panel body-->
      </div> <!--close div panel primary-->
    </div>
<script>
    function loadFile(event)
    {
          document.getElementById('img').src  = URL.createObjectURL(event.target.files[0]);
    };
</script>