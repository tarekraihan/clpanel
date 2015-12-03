<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**********************************************
     * Developer : Tarek Raihan                   *
     * Developer Email : tarekraihan@yahoo.com    *
     * Project : TSTJAPAN.CO.JP                   *
     * Script : Login Validation controler        *
     * Start Date : 10-11-2015                    *
     * Last Update : 10-11-2015                   *
     **********************************************/

    public function login_validation()
    {
        $this->form_validation->set_rules('username','User Name','trim|required|min_length[5]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('txtPassword','Password','trim|required|min_length[6]|max_length[12]|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('backdoor/index');
        }
        else
        {
            $data['email_address']=htmlentities($this->input->post('username'));
            $data['password']=$this->input->post('txtPassword');
            /*print_r($data);
            die;*/
            $result=$this->registration_model->check_admin_user($data);

            if($result)
            {
                $sdata['admin_user_id']=$result->admin_user_id;
                $sdata['admin_first_name']=$result->admin_first_name;
                $sdata['admin_last_name']=$result->admin_last_name;
                $sdata['admin_email']=$result->admin_email;
                $sdata['admin_role']=$result->admin_role;
                $sdata['current_password']=$result->current_password;
                $this->session->set_userdata($sdata);
                redirect('backdoor/dashboard');
            }
            else
            {
                $sdata['error']="User Name and Password Not Correct!!";
                $this->session->set_userdata($sdata);
                redirect('backdoor/index');
            }
        }
    }

    public function admin_log_out()
    {

        $this->session->unset_userdata();
        $this->session->sess_destroy();

        redirect('backdoor');
    }
}