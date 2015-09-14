<?php
class Post extends CI_Model
{     
        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

/**

 */

/**
* This Add a Post to the database
* @param  object  $data contain post information
*
*/
        public function add_post($data)
        {
             return $this->db->insert('Post',$data);
        }
 
/**

 */

/**
* This Update a Post with a specific Post id
* @param  object  $post         contain post information
* @param  int     $post_id      Post Id 
*
*/
        public function update_post($post,$post_id)
        {
             return $this->db->update('Post',$post,array ('id' => $post_id));
        }
/**

 */

/**
* This Delete a post which specific id
* @param  int $id contain post ID
*
*/
        public function delete_post($id)
        {
             return $this->db->delete('Post',array('id' => $id));
        }    
/**

 */

/**
* This get a post whith specific id
* @param   int     $id    contain Post ID
* @return  object (row)   contain Post information
*/
        public function get_posts($id = NULL)
        {
            if ( $id === NULL)
            {
                  $query =  $this->db->query('SELECT  post.id, title , content , date ,  last_modified , description , image , username
                                              FROM post, user 
                                              WHERE user_id = user.id'); 
                  return $query->result();
            }
            else
            {
                  $query = $this->db->query('SELECT  post.id, title , content , date ,  last_modified , description , image , username
                                             FROM post, user 
                                             WHERE post.id = '.$id. ' and user_id = user.id'); 
                  return $query->row();
            }
        }
/**

 */

/**
* This get comments for a specific post
* @param  int     $id         Post ID
*
*/
        public function get_post_comments($id)
        {
             $query = $this->db->query('SELECT comment.id, content, date, last_modified,post_id, user_id,username 
                                        FROM comment,user
                                        WHERE user_id = user.id and post_id = '.$id);
             return $query->result();
        }
}