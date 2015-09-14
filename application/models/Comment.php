<?php
class Comment extends CI_Model
{

       public function __construct()
       {
                // Call the CI_Model constructor
                parent::__construct();
       }

/**

 */

/**
* This Add a Comment to the database
* @param  object  $data contain Comment information
*
*/
       public function add_comment($data)
       {
        	   return $this->db->insert('Comment',$data);
       }

/**

 */

/**
* This Update a specific information in a Comment
* @param  object  $comment            contain comment information that we want to update
* @param  int     $comment_id         Comment Id ( this is the where statement)
*
*/
       public function update_comment($comment,$comment_id)
       { 
              return $this->db->update('Comment',$comment,array ('id' => $comment_id));
       }

/**

 */

/**
* This Delete a comment which specific id
* @param  int $id contain Comment ID
*
*/
       public function delete_comment($id)
       {
        	   return $this->db->delete('Comment',array('id' => $id));
       }

/**

 */

/**
* This Delete all comments related to a specific post given post id
* @param  int $id contain post ID
*
*/
       public function delete_post_comment($id)
       {
             return $this->db->delete('Comment',array('post_id' => $id));
       }

/**

 */

/**
* This get a Comment with a specific id
* @param  int $id contain Comment ID
*
*/
       public function get_comment($id)
       {   
              $query = $this->db->get_where('Comment',array('id' => $id)); 
              return $query->row();
       }
}