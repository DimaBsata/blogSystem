<div class="panel panel-default">
 
      <!-- ************  Post Title  ************ -->
      <div class="panel-heading">
          <h1>
<?php           echo $post->title ;
?>
          </h1>
      </div>
      <!-- ************************************** -->

      <div class="panel-body">
<?php
           $data = array('class' => 'btn btn-danger',
                         'style' => 'float: right' );
           echo heading(anchor(base_url('Post_controller/delete_post/'.$post->id),"Delete This Post <span class='glyphicon glyphicon-trash'></span>",$data),2);
?>
          <!-- ************  Post Created Date  ****************** -->
           <p>
                  <span class="label label-default">
<?php 
                        echo $post->date ; 
?>
                  </span> 
           </p>

          <!-- ************  Post Last Modified Date  ************ -->
<?php 
                      if (!empty($post->last_modified) )
                      {
?>
                         <p> 
                              <span class="label label-default">                              
<?php   
                                   echo "Lat Modified: ".$post->last_modified ; 
?>  
                              </span>
                         </p>
<?php
                      }
?>
          <!-- ***************  Post Image  *************** -->
<?php
           $imgurl =  $post->image;
           $data = array('src'    =>  $imgurl,
                         'class'  =>  'img-rounded  img-responsive',
                         'alt'    =>  'Cinque Terre',
                         'width'  =>  '500',
                         'height' =>  '400' );
           echo img($data);?>
           
           <!-- ***************  Post Description  *************** -->
           <p>
<?php 
                 echo heading($post->description,4);
                 echo $post->content ;
?>
           </p>
      </div> <!--end of panel-body Div -->
</div> <!--end of panel-default Div -->
