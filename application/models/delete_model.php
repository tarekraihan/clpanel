<?php
/**********************************************
 * Developer : Tarek Raihan                   *
 * Project : hr tools                         *
 * Script : All Delete Query                  *
 * Start Date :   25-03-2015                  *
 * End Date : 25-03-2015                      *
 **********************************************/

class Delete_Model extends CI_Model {

    function Delete_Single_Row($id,$table,$id_field)
    {

        $query="DELETE FROM ".$table." WHERE ".$id_field."='$id'";
        $result=mysql_query($query);

        if($result)
        {
            $sdata=array();
            $sdata['success']="Item Deleted Successfully !!!";
            $this->session->set_userdata($sdata);

        }
        else
        {
            $sdata=array();
            $sdata['error']="Sorry Item not Deleted !!!";
            $this->session->set_userdata($sdata);
        }

    }

} 