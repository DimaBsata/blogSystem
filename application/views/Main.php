  <div class="row">
  <?php 
        /******* No Posts to Show *****/
        if (empty($posts))  //
        {
?>
               <div class="col-xs-10 col-sm-6 col-md-5 col-lg-4">
<?php 
                    echo heading('No Posts ...', 2,array('margin' => '50px'));
?> 
               </div>
<?php 
         }
         /******* There are Posts to Show *****/
         else 
         {    
              foreach ($posts as $post)
              {
?>
                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <a href="<?php echo base_url('Post_controller/show_post/'.$post->id);?>" >

                      <!-- ************  Post Title  ************ -->
                          <?php echo heading($post->title,2); ?> 
                    </a>
  
                      <!-- ************  Post Ceated Date  ************ -->
                      <p> 
                           <span class="badge">                          
<?php                             echo "Created: ".$post->date ; 
?>                         </span>
                      </p>

                      <!-- ************  Post Last Modified Date  ************ -->
<?php 
                      if (!empty($post->last_modified) )
                      {
?>
                         <p> 
                              <span class="badge">                              
<?php   
                                        echo "Lat Modified: ".$post->last_modified ; 
?>  
                              </span>
                         </p>
<?php
                      }
?>               
                      <p> <!-- ************  Post Image  ************ -->
                        <a href="<?php echo base_url('Post_controller/show_post/'.$post->id);?>" >
<?php
                            $imgurl= $post->image; 
                            $data = array('src'    => $imgurl,
                                          'class'  => 'img-rounded img-responsive',
                                          'alt'    => $post->title,
                                          'width'  => '304',
                                          'height' => '236' );
                            echo img($data);?>
                        </a>
                      </p>

                      <!-- ************  Post Writter  ************ -->
                      <p style="color:gray;">
<?php
                             echo  'Written By: '.$post->username;                
?>
                      </p>

                      <!-- ************  Post Description  ************ -->
                      <p> 
                         <a href="<?php echo base_url('Post_controller/show_post/'.$post->id);?>" >
<?php   
                            echo $post->description; 
?>      
                        </a>
                      </p>
 
                      <!-- ************  Read More Button  ************ -->
                      <p> 
<?php     
                            $data = array('class'          => 'btn btn-success',
                                          'target'         => '_blank' ,
                                          'data-toggle'    => 'tooltip',
                                          'title'          => 'Read more About this post',
                                          'data-placement' => 'bottom' );
                            echo anchor(base_url('Post_controller/show_post/'.$post->id),"Read More &raquo",$data);
?>
                            <!-- ************  Edit This Post Button  ************ -->

<?php                       $data = array('class'          => 'btn btn-primary',
                                          'target'         => '_blank' ,
                                          'data-toggle'    => 'tooltip',
                                          'title'          => 'Edit all post details',
                                          'data-placement' => 'bottom' );
                            echo anchor(base_url('Post_controller/add_edit_post/'.$post->id),"Edit <span class='glyphicon glyphicon-cog'></span>",$data);
?> 
                            <!-- ************  Delete This Post Button  ************ -->
<?php 
                            $data = array('class'          => 'btn btn-danger',
                                         'target'          => '_self' ,
                                          'data-toggle'    => 'tooltip',
                                          'title'          => 'Delete this Post',
                                          'data-placement' => 'bottom' );
                            echo anchor(base_url('Post_controller/delete_post/'.$post->id),"Delete <span class='glyphicon glyphicon-trash'></span>",$data);
?>
                      </p>
                      <hr>
                 </div> <!-- end of col Div -->
<?php
              }// foreach close
         } //close else statement
?>
          <!--*************  Div For Adding New Post  ************-->
         <div class="col-xs-10 col-sm-6 col-md-5 col-lg-4 text-center" style="padding:50px">
<?php
                echo heading('To Add More Posts ...', 2);
                echo br();
                echo heading('Click Link below ...', 4);
                echo br();
                $x= base_url("Post_controller/add_edit_post");
                $data = array('class'          => 'btn btn-info',
                              'target'         => '_self' ,
                              'data-toggle'    => 'tooltip',
                              'title'          => 'Here you can add a new Post ',
                              'data-placement' => 'bottom');
                echo anchor("$x","Add Post <span class='glyphicon glyphicon-plus'></span>",$data);
?>
         </div>
</div><!-- Close row Div -->
<style type="text/css">
    .row > div
    {
           height:550px;
    }
</style>