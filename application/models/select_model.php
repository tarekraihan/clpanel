<?php

class Select_Model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
	
	public function Select_State_With_Country()
	{
		$sql="SELECT a.states_id,a.state_name,b.country_name FROM tbl_states AS a INNER JOIN tbl_country AS b ON a.country_id=b.country_id ORDER BY a.states_id DESC";
		$query=$this->db->query($sql);
		return $query;
		
	}
	
	public function Select_Area_With_State_With_Country()
	{
		$sql="SELECT a.area_id,a.area_name,b.state_name,c.country_name FROM tbl_area as a inner join tbl_states as b on a.state_id=b.states_id inner join tbl_country as c on b.country_id=c.country_id ORDER BY a.area_id DESC";
		$query=$this->db->query($sql);
		return $query;
		
	}
	
	public function Select_Single_Property_Info($property_id)
	{
		$sql="SELECT a.*, b.customer_id, b.first_name, b.last_name,b.area_code, b.phone_start,b.phone_end,c.property_type_name,d.property_used_name,e.state_name FROM `tbl_property` as a inner join customer_profile as b on a.property_owner_id=b.customer_id inner join tbl_property_type as c on a.property_type_id=c.property_type_id inner join tbl_property_used as d on a.property_use_id=d.property_used_id inner join tbl_states as e on a.states_id=e.states_id where a.property_id='$property_id'";
		$query=$this->db->query($sql);
		return $query;
		
	}
	
	public function Select_Country_Info($id)
	{
		
		$sql="SELECT * From";
		
	}
	
	
	// Count all record of table "contact_info" in database.
      public function record_count() {
        return $this->db->count_all("tbl_area");
    }
    
    // Fetch data according to per_page limit.
    public function fetch_data($limit, $offset) {
		$sql="SELECT a.area_id,a.area_name,b.state_name,c.country_name FROM tbl_area as a inner join tbl_states as b on a.state_id=b.states_id inner join tbl_country as c on b.country_id=c.country_id  ORDER BY a.area_id ASC LIMIT $offset, $limit";
		$query=$this->db->query($sql);
		
        //$this->db->limit($limit);
        //$this->db->where('area_id', $id);
        //$query = $this->db->get("tbl_area");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
         
            return $data;
        }
        return false;
   }
   
  /* public function Select_Single_Row($id,$table,$id_field){
	   $sql="SELECT * FROM customer_profile WHERE $id_field='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
	   
	   }*/
	 public function  Select_Single_Row($id,$table,$id_field)
    {
        $result=mysql_query("SELECT * FROM `$table` WHERE `$id_field`='$id'");
        $data=mysql_fetch_array($result);
        return $data;
    }
	public function Select_Single_Property_Info1($property_id)
	{
		$sql="SELECT a.*, b.customer_id,b.email_address, b.first_name, b.last_name,b.area_code, b.phone_start,b.phone_end,c.property_type_name,d.property_used_name,e.state_name,b.image_name FROM `tbl_property` as a inner join customer_profile as b on a.property_owner_id=b.customer_id inner join tbl_property_type as c on a.property_type_id=c.property_type_id inner join tbl_property_used as d on a.property_use_id=d.property_used_id inner join tbl_states as e on a.states_id=e.states_id where a.property_id='$property_id'";
		
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
        return $data;
		
	}
	
	public function select_bookmark_property($customer_id)
	{
		$sql="SELECT a.*,b.* from tbl_bookmark_property as a inner join tbl_property as b on a.property_id=b.property_id where a.customer_id='$customer_id' and a.status='1'";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function select_change_property($customer_id)
	{
		$sql="SELECT a.*,b.* from tbl_save_change as a inner join tbl_property as b on a.property_id=b.property_id where a.customer_id='$customer_id' and a.status='1'";
		$query=$this->db->query($sql);
		return $query;
		
	}
	
	public function customize_search($parameter)
	{
		$sql='SELECT a.property_id, a.price, a.property_address,a.bathroom_no,a.bedroom_no,a.states_id,a.feature_image,b.state_name,a.area_id,c.area_name FROM tbl_property AS a INNER JOIN tbl_states AS b ON a.states_id=b.states_id INNER JOIN tbl_area AS c ON a.area_id=c.area_id WHERE '.$parameter.'';
		$query=$this->db->query($sql);
		return $query;
	}
	
	
	public function select_alert_list($customer_id)
	{
		$sql='SELECT announcements,messages,offer_maker,price_watch FROM customer_profile WHERE customer_id='.$customer_id.'';
		$query=$this->db->query($sql);
		$result=$query->row();
		return $result;
	}
	public function select_price_watch($property_id)
	{
		$sql='SELECT * FROM tbl_save_change WHERE property_id='.$property_id.'';
		$query=$this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$data='1';
		}else{
			$data='0';	
		}
		return $data;
	}
	
	public function select_price_watch_message()
	{
		$sql="SELECT a.change_amount,a.present_price,b.property_id,b.sign,b.property_address,b.price,c.email_address,c.first_name,c.last_name,c.price_watch FROM `tbl_save_change` AS a INNER JOIN `tbl_property` AS b ON a.property_id=b.property_id INNER JOIN `customer_profile` AS c ON a.customer_id=c.customer_id";	
		$query=$this->db->query($sql);
		return $query;
	}
	
	public function select_pro_customer($id = null)
	{
		$sql="SELECT a.pro_customer_id,a.customer_id,a.package,a.price,a.status,a.created,b.email_address,b.first_name,b.last_name,b.area_code,b.phone_start,b.phone_end,b.mobile_no FROM tbl_pro_customer AS a INNER JOIN customer_profile AS b ON a.customer_id=b.customer_id ";
        if($id != null)
        {
            $sql.=" WHERE a.pro_customer_id = $id";
        }
        if($id == null){
            $sql.=" ORDER By a.pro_customer_id";
        }

		$query=$this->db->query($sql);
		return $query;
	}
   

	
}