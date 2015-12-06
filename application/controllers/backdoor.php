<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backdoor extends CI_Controller
{
    /**********************************************
     * Developer : Tarek Raihan                   *
     * Developer Email : tarekraihan@yahoo.com    *
     * Project : TSTJAPAN.CO.JP                   *
     * Script : Main  controler                   *
     * Start Date : 10-11-2015                    *
     * Last Update : 10-11-2015                   *
     **********************************************/

    public function index()
    {
        if($this->session->userdata('admin_email')){
            redirect('backdoor/dashboard');
        }else{
            $data['title']="Login";
            $this->load->view('login');

        }
    }

    public function dashboard()
    {
        if($this->session->userdata('admin_email')) {
            $this->load->view('includes/admin_header');
            $this->load->view('index');
            $this->load->view('includes/admin_footer');
        }else{
            redirect('backdoor/index');
        }
    }

    public function admin_user_role($msg='')
    {
        if(!$this->session->userdata('admin_email')){
            redirect('backdoor');
        }else{

            if($msg == 'success'){
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Save !!</div>';
            }else if($msg == 'error')
            {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtAdminRole','Admin Role','trim|required|callback_alpha_dash_space|min_length[4]|max_length[20]|xss_clean|is_unique[admin_user_role.role_name]');
            if ($this->form_validation->run() == FALSE)
            {
                $data['title']="Admin User Role";
                $this->load->view('includes/admin_header',$data);
                $this->load->view('admin_user_role');
                $this->load->view('includes/admin_footer');
            }else
            {
                $date = date('Y-m-d h:i:s');

                $this->common_model->data=array('role_name'=>$this->input->post('txtAdminRole'),'created'=>$date);
                $this->common_model->table_name='admin_user_role';
                $result=$this->common_model->insert();

                if($result)
                {
                    redirect('backdoor/admin_user_role/success');
                }
                else
                {
                    redirect('backdoor/admin_user_role/error');
                }

            }
        }

    }

    function alpha_dash_space($str){
        return ( ! preg_match("/^([-a-zA-Z_ .-])+$/i", $str)) ? FALSE : TRUE;
    }

    public function edit_admin_user_role($msg='')
    {
        if(!$this->session->userdata('admin_email')){
            redirect('backdoor');
        }else{

            if($msg == 'success'){
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Update !!</div>';
            }else if($msg == 'error')
            {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Update !!</div>';
            }
            $this->form_validation->set_rules('txtEditAdminRole','Admin Role','trim|required|callback_alpha_dash_space|min_length[4]|max_length[20]|xss_clean');
            if ($this->form_validation->run() == FALSE)
            {
                $data['title']="Edit Admin User Role";
                $this->load->view('includes/admin_header',$data);
                $this->load->view('edit_admin_user_role');
                $this->load->view('includes/admin_footer');
            }else
            {
                $date = date('Y-m-d h:i:s');

                $this->common_model->data=array('role_name'=>$this->input->post('txtEditAdminRole'),'modified'=>$date);
                $this->common_model->table_name='admin_user_role';
                $this->common_model->where=array('role_id'=>$this->input->post('txtRoleId'));
                $result=$this->common_model->update();

                if($result)
                {
                    redirect('backdoor/edit_admin_user_role/success');
                }
                else
                {
                    redirect('backdoor/edit_admin_user_role/error');
                }

            }
        }

    }

    public function adb_business_plan()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('adb_business_plan');
        $this->load->view('includes/admin_footer');
    }

    public function adb_strategy_program()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('adb_strategy_prog');
        $this->load->view('includes/admin_footer');
    }

    public function five_years_plan()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('five_years_plan');
        $this->load->view('includes/admin_footer');
    }

    public function create_user()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('create_user');
        $this->load->view('includes/admin_footer');
    }

    public function blog_post()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('blog_post');
        $this->load->view('includes/admin_footer');
    }

    public function development_initiative()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('development_initiative');
        $this->load->view('includes/admin_footer');
    }

    public function country_info()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('country_info');
        $this->load->view('includes/admin_footer');
    }

    public function economic_scenarios()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('economic_scenarios');
        $this->load->view('includes/admin_footer');
    }
}
