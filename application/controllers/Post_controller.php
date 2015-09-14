<?php
class Post_controller extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('user_id'))
            redirect(base_url());
     }
        
    public function index()
    {  
        $this->display_main_page();
    }

/**
 * Show Home Page which contains 3 views (Header, Main, Footer)
 * the Home Page Display All posts
 *
 */
    public function display_main_page()
    {
       $this->load->view("header");
       $this->load->model("Post");
       $data["posts"] = $this->Post->get_posts();
       $this->load->view("Main",$data);
       $this->load->view("footer");
    }

/**

*/

/**
 * Display a single Post Page which contains 5 views (Header, Show_Post, Show_comments, Add_Edit_Comment, Footer)
 * This Page show : (Post information) / (All Comments about this page) / (form to add or edit a comment)
 *
 * @param    integer  $id    Post ID
 *       
 */
    public function show_post($id)
    {
            $this->load->view("header");
            $this->load->model("Post");
            $this->load->model("Comment");
            $data['post'] =  $this->Post->get_posts($id);
            $this->load->view('Show_Post',$data);
            $x['comments'] = $this->Post->get_post_comments($id);
            $x['id'] =$id;
            $this->load->view('Show_comments',$x);
            $d['id'] =$id;
            $this->load->view('Add_Edit_Comment',$d);
            $this->load->view("footer");
    }

/**

*/

/**
 *  Display a Page that contain form to add a new post 
 *   this page contains 3 views (Header, Add_Edit_Post, Footer)
 * This Page show : (Post information) / (All Comments about this page) / (form to add or edit a comment)
 *       
 *  @param  integer    $id    Post Id   WHEN IT IS NULL THEN WE ARE IN ADDING NEW POST  , WHEN IT HAS VALUE THEN WE ARE EDITTING AN EXISTING POST
 *
 */
    public function add_edit_post($id=NULL)
    {
                $this->load->view('header');
                $this->form_validation->set_rules('title','Post Title','required|min_length[3]|max_length[100]');
                $this->form_validation->set_rules('description','Post Description','required|min_length[3]|max_length[500]');
                $this->form_validation->set_rules('content','Post Content','required|min_length[3]');
                $this->load->model("Post");
                $data="";
                if ($id !== Null)  //Updating an existing Post then we should get info from db
                        $data['post'] = $this->Post->get_posts($id);

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('Add_Edit_Post',$data);
                        $this->load->view("footer");
                }
                else //validation true
                {
                        $config['upload_path'] = './img';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $this->load->library('upload', $config);
                        if (  $this->upload->do_upload('fileToUpload')) //upload success
                        { 
                               $image_name = 'img/'.$this->upload->data('file_name');
                               $data = array ('title'      => $this->input->post('title'),
                                             'description' => $this->input->post('description'),
                                             'content'     => $this->input->post('content'),
                                             'image'       => $image_name,
                                             'user_id'     => $this->session->userdata('user_id')); 
                               ($id === Null)?$this->Post->add_post($data): $this->Post->update_post($data,$id);
                               redirect(base_url("Post_controller"));  
                        }
                        else //faild upload
                        {
                                if ($id === NULL ) //when adding post
                                {
                                      $error = array('error' => $this->upload->display_errors());
                                      $this->load->view('Add_Edit_Post', $error);
                                      $this->load->view('footer');
                                }
                                else //update post
                                {
                                      $image_name = $this->input->post('image'); 
                                      date_default_timezone_set('Africa/Nairobi');
                                      $data = array ('title'         => $this->input->post('title'),
                                                     'description'   => $this->input->post('description'),
                                                     'content'       => $this->input->post('content'),
                                                     'image'         => $image_name,
                                                     'last_modified' => date('Y-m-d- h:i:s')); // when uploading   
                                      $this->Post->update_post($data,$id);
                                      redirect(base_url("Post_controller"));                
                                 }
                        }
                }
    }

/**

*/

/**
 *  Deleting a Post given Its id 
 *  it will first delete all comments for this post then delete post then remove picture from system directory
 * if one deleteing faild all transactions will be rollback
 *  No Page will be shown here ... we will redirect to HOME PAGE
 *       
 *  @param  integer    $id    Post Id   id for the post who will be
 *
 */
    public function delete_post($id)
    {
            $this->db->trans_start();
            $this->load->model("Post");
            $this->load->model("Comment");
            $this->Comment->delete_post_comment($id);
            $post = $this->Post->get_posts($id);
            $this->Post->Delete_post($id);
            $this->db->trans_complete();
            unlink($post->image);
            redirect(base_url("Post_controller"));
    }
    
}