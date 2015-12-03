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

    public function adb_fact_sheet()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('adb_fact_sheet');
        $this->load->view('includes/admin_footer');
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
