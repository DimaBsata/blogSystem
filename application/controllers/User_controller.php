  <?php
  class User_controller extends CI_Controller
  {
    
    public function __construct()
    {
          parent::__construct(); 
          if ( ( $this->router->fetch_method() != "log_out" ) && $this->session->has_userdata('user_id') )
                redirect(base_url("Post_Controller"));
    }

/**
 * Display a Home Page which contains 3 views (Header, Login, Footer)
 * This Page enable user to enter his user name and password in order to login in to our website
 *   
 */
    public function index()
    {  
          $this->signin();        
    }

/**

*/
    public function signin()
    {  
          $this->load->view("header");
          $this->load->view("Login");
          $this->load->view("footer");
    }

/**

*/    
    public function signup()
    {  
          $this->load->view("header");
          $this->load->view("Signup");
          $this->load->view("footer");
    }

/**

*/

    public function log_out()
    {
          $array_items = array('user_id', 'firstname','lastname');
          $this->session->unset_userdata($array_items);
          $this->session->sess_destroy();
          redirect(base_url("User_Controller"));
    }

/**

*/

/**
 * Display a Login Form validation  
 * if validation success it will show posts
 * if validation faild it will stay in the same page and display validation erros
 *   
 */
    public function check_user()
    {  
           $this->form_validation->set_rules('username',' User Name','required');
           $this->form_validation->set_rules('password',' Password','required|callback_CheckUserExist',array('CheckUserExist' => 'Invalid User Name or Password' ));
           if ($this->form_validation->run() !== FALSE) // validation success
           {
                  
                  redirect(base_url('Post_Controller/index'));
           }
           else
           {
                  $this->signin();
           }
    }

/**

*/

/**
 * This is a definition for callback_CheckUserExist validation in the login form 
 * it checks if the user name and password is exist in the database
 * 
 *  @return       boolean     
 *                TRUE login success
 *                FALSE login faild
 */
    public function CheckUserExist()
    {
           $this->load->model("User");
           $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
           $row = $this->User->get_user($this->input->post('username'));

           if (($row  === NULL) || (empty($row))) 
           {
                      return false;
           }
           else if ( $hasher->CheckPassword($this->input->post('password'),$row->password))
           {
                      $data =  array('user_id' => $row->id, 'firstname'=> $row->firstname , 'lastname' => $row->lastname);
                      $this->session->set_userdata($data);
                      return true;
           }
           else
           {
                      return false;
           }
}

/**

*/

/**
 * This function do the Sign Up Proccess
 * it check user information validation 
 * if validation success it hash password and add user to database then redirect to the login form to enable user to login
 * else if validation faild it stay in the same sign up page and display validation error
 *   
 */
    public function add_user()
    {  
            $this->form_validation->set_rules('username',' User Name','required|min_length[3]|max_length[10]|is_unique[User.username]',
                                               array('is_unique' => 'User Name Existed, please change.'));
            $this->form_validation->set_rules('passwd',' Password','required|min_length[4]|max_length[10]');
            $this->form_validation->set_rules('passwd_conferm',' Confirmed Password','required|matches[passwd]');    
            $this->form_validation->set_rules('firstname',' First Name','required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('lastname',' Last Name','required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('email',' Email','required|valid_email');
        
            if ($this->form_validation->run() !== FALSE)
            {
                  $this->load->model("User");
                  $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
                  $hash_password = $hasher->HashPassword($this->input->post('passwd'));
                  $data = array 
                  (
                           'username'  => html_escape( $this->input->post('username')  ),
                           'password'  => $hash_password,
                           'firstname' => html_escape( $this->input->post('firstname') ),
                           'lastname'  => html_escape( $this->input->post('lastname')  ),
                           'email'     => html_escape( $this->input->post('email')     ) 
                  );
                  $this->User->add_user($data);
                  $this->load->view("header");
                  $data['sign_up_success'] = "true";
                  $this->load->view("Login",$data);
                  $this->load->view("footer");
            }
            else
            {
                  $this->signup();            
            }
    }

}