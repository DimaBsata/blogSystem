<?php
class Comment_controller extends CI_Controller 
{
	   public function __construct()
        {
               parent::__construct();
               if (!$this->session->has_userdata('user_id'))
                     redirect(base_url());
        }

		/**
		 *  Deleting a comment given Its id 
		 *  No Page will be shown here ... we will redirect to Post PAGE
		 *       
		 *  @param  integer    $comment_id    Comment Id   id for the comment who will delete
		 *  @param  integer    $post_id       Post Id      id for the Post that This comment is for, this parameter help us redirect to post page
		 *
		 */
		public function delete_comment($comment_id,$post_id)
		{
				$this->load->model("Comment");
				$this->Comment->delete_comment($comment_id);
		        redirect(base_url("Post_controller/show_post/".$post_id));
		}

		/**

		*/

		/**
		*  Show Comment Information in Comment Form  that is exist in the Post Page
		*  this page contains 5 views (Header, Show_Post, Show_comments, Add_Edit_Comment, Footer)
		*  Add_Edit_Comment View Will Fill Comment Data in the comment  form in order to edit it
		* 
		*  @param  integer    $comment_id    Comment Id   id for the comment which will be edited
		*  @param  integer    $post_id       Post Id      id for the Post that This comment is for.
		*
		*/

		public function show_edit_comment($comment_id=NULL,$post_id)
		{
					$this->load->view('header');
					$this->load->model('Post');
					$this->load->model('Comment');

		     		$data['post'] = $this->Post->get_posts($post_id);
		            $this->load->view('Show_Post',$data);

		            $x['comments'] = $this->Post->get_post_comments($post_id);
		            $x['id'] =$post_id;
		            $this->load->view('Show_comments',$x);

		            $d['id'] =$post_id;
		            $d['comment'] = $this->Comment->get_comment($comment_id);

		            $this->load->view('Add_Edit_Comment',$d);
		            $this->load->view('footer');
		}

		/**

		*/

		/**
		 *  this will Add or Edit  comment then redirect to the Show Post Page Showing the Added/Edited comment with all other comments
		 *  
		 *
		 *  @param  integer    $comment_id    Comment Id   id for the comment who will edited // if ($comment_id === Null) We ARE ADDING NEW COMMENT
		 *
		 */
		public function add_edit_comment($comment_id = Null)
		{
					$this->form_validation->set_rules('content','Your Comment','required|min_length[3]|max_length[200]');
					$post_id = $this->input->post('post_id');
					if ($this->form_validation->run() !== FALSE)
					{
						$this->load->model("Comment");
						$data = array ('content'=>html_escape($this->input->post('content')),
								'post_id'=> $post_id,
								'user_id'=> $this->session->userdata('user_id'));
						if ($comment_id === NULL)
						{
							$this->Comment->add_comment($data);
						}
						else
						{
							date_default_timezone_set('Africa/Nairobi');
							$now = date('Y-m-d- h:i:s');
							$data = array_merge($data,array('last_modified'=> $now));
							$this->Comment->update_comment($data,$comment_id);
						}
						redirect('Post_controller/show_post/'.$post_id);
					}
			        else
			        {
			        	$this->Show_edit_comment($comment_id,$post_id); 
			    	}
		}
		
}