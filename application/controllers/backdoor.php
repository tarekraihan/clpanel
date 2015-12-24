<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backdoor extends CI_Controller
{
    /**********************************************
     * Developer : Tarek Raihan                   *
     * Developer Email : tarekraihan@yahoo.com    *
     * Project : TSTJAPAN.CO.JP                   *
     * Script : Main  controller                   *
     * Start Date : 10-11-2015                    *
     * Last Update : 10-11-2015                   *
     **********************************************/

    public function index()
    {
        if ($this->session->userdata('admin_email')) {
            redirect('backdoor/dashboard');
        } else {
            $data['title'] = "Login";
            $this->load->view('login', $data);

        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('admin_email')) {
            $data['title'] = "TST - Dashboard";
            $this->load->view('includes/admin_header', $data);
            $this->load->view('index');
            $this->load->view('includes/admin_footer');
        } else {
            redirect('backdoor/index');
        }
    }

    public function admin_user_role($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtAdminRole', 'Admin Role', 'trim|required|callback_alpha_dash_space|min_length[4]|max_length[20]|xss_clean|is_unique[admin_user_role.role_name]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Admin User Role";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('admin_user_role');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');

                $this->common_model->data = array('role_name' => $this->input->post('txtAdminRole'), 'created' => $date);
                $this->common_model->table_name = 'admin_user_role';
                $result = $this->common_model->insert();

                if ($result) {
                    redirect('backdoor/admin_user_role/success');
                } else {
                    redirect('backdoor/admin_user_role/error');
                }

            }
        }

    }

    function alpha_dash_space($str)
    {
        return (!preg_match("/^([-a-zA-Z_ .-])+$/i", $str)) ? FALSE : TRUE;
    }

    function phone_number($str)
    {
        return (!preg_match("/^([+0-9])+$/i", $str)) ? FALSE : TRUE;
    }

    public function edit_admin_user_role($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfully Update !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Update !!</div>';
            }
            $this->form_validation->set_rules('txtEditAdminRole', 'Admin Role', 'trim|required|callback_alpha_dash_space|min_length[4]|max_length[20]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Edit Admin User Role";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('edit_admin_user_role');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');

                $this->common_model->data = array('role_name' => $this->input->post('txtEditAdminRole'), 'modified' => $date);
                $this->common_model->table_name = 'admin_user_role';
                $this->common_model->where = array('role_id' => $this->input->post('txtRoleId'));
                $result = $this->common_model->update();

                if ($result) {
                    redirect('backdoor/edit_admin_user_role/success');
                } else {
                    redirect('backdoor/edit_admin_user_role/error');
                }

            }
        }

    }

    public function admin_user($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtFirstName', 'First Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('username', 'username', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('txtLastName', 'Last Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('txtEmailAddress', 'Email Address', 'trim|valid_email|required|min_length[5]|max_length[80]|xss_clean|is_unique[tst_admin_user.admin_email]');
            $this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]|max_length[15]|xss_clean|is_unique[tst_admin_user.username]');
            $this->form_validation->set_rules('txtAddress', 'Address', 'trim|required|min_length[5]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('txtPhone', 'Phone', 'trim|required|callback_phone_number|min_length[4]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|min_length[4]|max_length[15]|xss_clean|matches[txtRePassword]');
            $this->form_validation->set_rules('txtRePassword', 'Re Password', 'trim|required|min_length[4]|max_length[15]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Admin User";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('create_admin_user');
                $this->load->view('includes/admin_footer');
            } else {
                $upload_result = $this->do_upload('./resource/images/admin/', 'txtProfilePicture');
                /* print_r($upload_result);
                 die;*/
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'admin_first_name' => htmlentities($this->input->post('txtFirstName')),
                    'admin_last_name' => htmlentities($this->input->post('txtLastName')),
                    'admin_email' => htmlentities($this->input->post('txtEmailAddress')),
                    'username' => htmlentities($this->input->post('username')),
                    'admin_address' => htmlentities($this->input->post('txtAddress')),
                    'admin_phone' => $this->input->post('txtPhone'),
                    'admin_role' => $this->input->post('txtAdminRole'),
                    'current_password' => md5($this->input->post('txtPassword')),
                    'status' => $this->input->post('txtIsActive'),
                    'profile_picture' => $upload_result['file_name'],
                    'created' => $date
                );
                $this->common_model->table_name = 'tst_admin_user';
                $result = $this->common_model->insert();

                if ($result) {
                    redirect('backdoor/admin_user/success');
                } else {
                    redirect('backdoor/admin_user/error');
                }

            }
        }

    }

    public function edit_admin_user($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfully Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtFirstName', 'First Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('username', 'username', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('txtLastName', 'Last Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('txtEmailAddress', 'Email Address', 'trim|valid_email|required|min_length[5]|max_length[80]|xss_clean|is_unique[tst_admin_user.admin_email]');
            $this->form_validation->set_rules('txtAddress', 'Address', 'trim|required|min_length[5]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('txtPhone', 'Phone', 'trim|required|callback_phone_number|min_length[4]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|min_length[4]|max_length[15]|xss_clean|matches[txtRePassword]');
            $this->form_validation->set_rules('txtRePassword', 'Re Password', 'trim|required|min_length[4]|max_length[15]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Admin User";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('edit_admin_user');
                $this->load->view('includes/admin_footer');
            } else {
                $upload_result = $this->do_upload('./resource/images/admin/', 'txtProfilePicture');
                /* print_r($upload_result);
                 die;*/
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'admin_first_name' => htmlentities($this->input->post('txtFirstName')),
                    'admin_last_name' => htmlentities($this->input->post('txtLastName')),
                    'admin_email' => htmlentities($this->input->post('txtEmailAddress')),
                    'admin_address' => htmlentities($this->input->post('txtAddress')),
                    'admin_phone' => $this->input->post('txtPhone'),
                    'admin_role' => $this->input->post('txtAdminRole'),
                    'current_password' => md5($this->input->post('txtPassword')),
                    'status' => $this->input->post('txtIsActive'),
                    'profile_picture' => $upload_result['file_name'],
                    'modified' => $date
                );
                $this->common_model->table_name = 'tst_admin_user';
                $this->common_model->where = array('admin_user_id' => $this->input->post('admin_user_id'));
                $result = $this->common_model->update();
                if ($result) {
                    redirect('backdoor/edit_admin_user/success');
                } else {
                    redirect('backdoor/edit_admin_user/error');
                }

            }
        }

    }

    public function do_upload($path, $field = '')
    {
        $this->load->library('upload');
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '4096';
        $config['file_name'] = '1';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field)) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

    public function make($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtManufacturar', 'Manufacturar Name', 'trim|required|alpha|min_length[2]|max_length[20]|xss_clean|is_unique[tbl_make.name]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Manufacturar";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('make');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'name' => $this->input->post('txtManufacturar'),
                    'remarks' => $this->input->post('txtRemarks'),
                    'created' => $date
                );
                $this->common_model->table_name = 'tbl_make';
                $result = $this->common_model->insert();

                if ($result) {
                    redirect('backdoor/make/success');
                } else {
                    redirect('backdoor/make/error');
                }

            }
        }

    }

    public function edit_make($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Update !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Update !!</div>';
            }
            $this->form_validation->set_rules('txtManufacturar', 'Manufacturar Name', 'trim|required|alpha|min_length[2]|max_length[20]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Edit Manufacturar";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('edit_make');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'name' => $this->input->post('txtManufacturar'),
                    'remarks' => $this->input->post('txtRemarks'),
                    'modified' => $date
                );
                $this->common_model->table_name = 'tbl_make';
                $this->common_model->where = array('make_id' => $this->input->post('txtMakeId'));
                $result = $this->common_model->update();
                if ($result) {
                    redirect('backdoor/edit_make/success');
                } else {
                    redirect('backdoor/edit_make/error');
                }

            }
        }

    }

    public function model($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtModelName', 'Model Name', 'trim|required|min_length[2]|max_length[70]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Model";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('model');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'model_name' => htmlentities($this->input->post('txtModelName')),
                    'make_id' => $this->input->post('txtMakeId'),
                    'created_by' => $this->session->userdata('admin_user_id'),
                    'created' => $date,
                );
                $this->common_model->table_name = 'tbl_model';
                $result = $this->common_model->insert();

                if ($result) {
                    redirect('backdoor/model/success');
                } else {
                    redirect('backdoor/model/error');
                }

            }
        }

    }

    public function edit_model($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfully Updated !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Update !!' . mysql_error() . '</div>';
            }
            $this->form_validation->set_rules('txtModelName', 'Model Name', 'trim|required|min_length[2]|max_length[70]|xss_clean');
            $this->form_validation->set_rules('txtMakeId', 'Select Manufacturar', 'trim|required|is_natural_no_zero|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Update Model";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('edit_model');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'model_name' => htmlentities($this->input->post('txtModelName')),
                    'make_id' => $this->input->post('txtMakeId'),
                    'created_by' => $this->session->userdata('admin_user_id'),
                    'modified' => $date,
                );
                $this->common_model->table_name = 'tbl_model';
                $this->common_model->where = array('model_id' => $this->input->post('txtModelId'));
                $result = $this->common_model->update();

                if ($result) {
                    redirect('backdoor/edit_model/success');
                } else {
                    redirect('backdoor/edit_model/error');
                }

            }
        }

    }

    public function admin_details()
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {
            $data['admin_id'] = $this->uri->segment(3);
            $data['title'] = "Admin Details";
            $this->load->view('includes/admin_header', $data);
            $this->load->view('admin_details');
            $this->load->view('includes/admin_footer');
        }
    }

    public function vehicle_category($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfully Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtVehicleCategory', 'Vehicle Category', 'trim|required|min_length[2]|max_length[25]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Vehicle Category";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('vehicle_category');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'name' => htmlentities($this->input->post('txtVehicleCategory')),
                    'remarks' => htmlentities($this->input->post('txtRemarks')),
                    'created_by' => $this->session->userdata('admin_user_id'),
                    'created' => $date,
                );

                $this->common_model->table_name = 'tbl_category';
                $result = $this->common_model->insert();

                if ($result) {
                    redirect('backdoor/vehicle_category/success');
                } else {
                    redirect('backdoor/vehicle_category/error');
                }

            }
        }

    }

    public function edit_vehicle_category($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfully Update !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Update !!</div>';
            }
            $this->form_validation->set_rules('txtVehicleCategory', 'Vehicle Category', 'trim|required|min_length[2]|max_length[25]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Vehicle Category";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('edit_vehicle_category');
                $this->load->view('includes/admin_footer');
            } else {
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'name' => htmlentities($this->input->post('txtVehicleCategory')),
                    'remarks' => htmlentities($this->input->post('txtRemarks')),
                    'modified' => $date,
                );

                $this->common_model->table_name = 'tbl_category';
                $this->common_model->where = array('category_id' => $this->input->post('txtVehicleCategoryId'));
                $result = $this->common_model->update();

                /* $this->common_model->table_name='tbl_category';
                 $result=$this->common_model->insert();*/

                if ($result) {
                    redirect('backdoor/edit_vehicle_category/success');
                } else {
                    redirect('backdoor/edit_vehicle_category/error');
                }

            }
        }

    }

    public function create_product($msg = '')
    {
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfully Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }
            $this->form_validation->set_rules('txtMakeId', 'Manufacture ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('txtModel', 'Model', 'trim|required|xss_clean');
            $this->form_validation->set_rules('txtCategory', 'Category', 'trim|required|xss_clean');
            $this->form_validation->set_rules('manufactureYear', 'Manufacture Year', 'trim|required');
            $this->form_validation->set_rules('manufactureMonth', 'Manufacture Month', 'trim|required|xss_clean');
            $this->form_validation->set_rules('txtPrice', 'Price', 'trim|required|min_length[2]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('txtDisplacement', 'Displacement', 'trim|min_length[4]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('txtSteering', 'Steering', 'trim|min_length[4]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('txtCondition', 'Condition', 'trim|min_length[4]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('txtMadeIn', 'Made In', 'trim|min_length[4]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('txtFuel', 'Fuel', 'trim|min_length[2]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('txtBodyStyle', 'Body Style', 'trim|min_length[5]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('txtDoor', 'Door', 'trim|is_natural|xss_clean');
            $this->form_validation->set_rules('txtPassenger', 'Passenger', 'trim|is_natural|xss_clean');
            $this->form_validation->set_rules('txtDimension', 'Dimension', 'trim|xss_clean');
            $this->form_validation->set_rules('txtExterior', 'Exterior', 'trim|min_length[4]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('txtInterior', 'Interior', 'trim|min_length[4]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('txtExpireDate', 'Expire Date', 'trim|exact_length[10]|xss_clean');
            $this->form_validation->set_rules('txtReferenceNo', 'Reference No', 'trim|min_length[4]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('txtOptions', 'Options', 'trim|min_length[4]|max_length[25]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Product";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('create_product');
                $this->load->view('includes/admin_footer');
            } else {
                $upload_result = $this->do_upload('./resource/images/car/', 'txtImages');
                /* print_r($upload_result);
                 die;*/
                $date = date('Y-m-d h:i:s');
                $this->common_model->data = array(
                    'make_id' =>$this->input->post('txtMakeId'),
                    'model_id' =>$this->input->post('txtModel'),
                    'category_id' =>$this->input->post('txtCategory'),
                    'manufacture_year' => htmlentities($this->input->post('manufactureYear')),
                    'manufacture_month' => htmlentities($this->input->post('manufactureMonth')),
                    'desplacement' => htmlentities($this->input->post('txtSteering')),
                    'condition' => htmlentities($this->input->post('txtCondition')),
                    'steering' => htmlentities($this->input->post('txtDisplacement')),
                    'price' => htmlentities($this->input->post('txtPrice')),
                    'made_in' => htmlentities($this->input->post('txtMadeIn')),
                    'fuel' => htmlentities($this->input->post('txtFuel')),
                    'body_style' => htmlentities($this->input->post('txtBodyStyle')),
                    'door' => htmlentities($this->input->post('txtDoor')),
                    'no_of_passenger' => $this->input->post('txtPassenger'),
                    'dimension' => htmlentities($this->input->post('txtDimension')),
                    'exterior_color' => htmlentities($this->input->post('txtExterior')),
                    'interior_color' => htmlentities($this->input->post('txtInterior')),
                    'expiry_date' => date( "Y-m-d", strtotime($this->input->post('txtExpireDate'))),
                    'reference_no' => htmlentities($this->input->post('txtReferenceNo')),
                    'options' => htmlentities($this->input->post('txtOptions')),
                    'status' => $this->input->post('txtIsAvailable'),
                    'feature_image' => $upload_result['file_name'],
                    'created' => $date
                );
                $this->common_model->table_name = 'tbl_product';
                $result = $this->common_model->insert();

                if ($result) {
                    redirect('backdoor/create_product/success');
                } else {
                    redirect('backdoor/create_product/error');
                }

            }
        }

    }

    function get_model(){
        $make_id=$this->input->post('make_id');
        //$query = $this->db->query("SELECT * FROM tbl_states WHERE country_id=".$country_id);

        $this->common_model->order_column = 'model_id';
        $this->common_model->table_name = 'tbl_model';
        $this->common_model->where = array('make_id'=>$make_id);
        $query=$this->common_model->select_all();

        $option = "<option value=''> Select One</option>";
        foreach($query->result() as $model){
            $option .= "<option value='".$model->model_id."'>".$model->model_name."</option>";
        }
        echo $option;

    }

    public function vehicle_list($msg=''){
        if (!$this->session->userdata('admin_email')) {
            redirect('backdoor');
        } else {

            if ($msg == 'success') {
                $data['feedback'] = '<div class="text-center alert alert-success">Successfull Save !!</div>';
            } else if ($msg == 'error') {
                $data['feedback'] = '<div class=" text-center alert alert-danger">Problem to Insert !!</div>';
            }

                $data['title'] = "Vehicle List";
                $this->load->view('includes/admin_header', $data);
                $this->load->view('vehicle_list');
                $this->load->view('includes/admin_footer');
            }
        }

}//--End of Controller