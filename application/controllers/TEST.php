  <?php
  class TEST extends CI_Controller
  {
    
    public function __construct()
    {
          parent::__construct();      
    }

/**
 * Display a Home Page which contains 3 views (Header, Login, Footer)
 * This Page enable user to enter his user name and password in order to login in to our website
 *   
 */
    public function index()
    {  

           $this->load->view("test");
     
    }
}