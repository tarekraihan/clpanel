<?php
/**********************************************
 * Developer : Tarek Raihan                   *
 * Developer Email : tarekraihan@yahoo.com    *
 * Project : TSTJAPAN.CO.JP                   *
 * Script : Login Model                       *
 * Start Date : 10-11-2015                    *
 * Last Update : 10-11-2015                   *
 **********************************************/
class Registration_Model extends CI_Model {
    public function check_admin_user($data)
    {

        $email_address=html_escape($data['email_address']);
        $password=htmlentities(md5($data['password']));

        $sql="select * from `tst_admin_user` where `admin_email`='$email_address' and `password`='$password'";
        $select_result=$this->db->query($sql);
        $result=$select_result->row();
        return $result;
    }
}