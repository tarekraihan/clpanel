<?php

class Common_Model extends CI_Model
{
    var $select = '*';
    # Example : $this->mhs_model->select = '*';
    var $table_name;
    # Example : $this->mhs_model->table_name = 'mytable';
    var $field_name;
    # Example : $this->mhs_model->field_name = 'age';
    var $data = array();
    # Example : $this->mhs_model->data = array('title'=>$title,'name'=>$name,'date'=>$date);
    var $join = array();
    # Example : $this->mhs_model->join = array('comments','comments.id=blogs.id');
    var $where = array();
    # Example : $this->mhs_model->where = array('name'=>$name,'title'=>$title,'status'=>$status);
    var $order_column = '';
    # Example : $this->mhs_model->order_column = 'id';
    var $order_type = 'desc';
    # Example : $this->mhs_model->order_type = 'desc';
    var $offset = 0;
    # Example : $this->mhs_model->offset = 0;
    var $limit;
    # Example : $this->mhs_model->limit = 20;

    public function __construct()
    {
        parent::__construct();
    }

    # Use for normal query. For deep query, please create another function in another class
    public function select_all()
    {
        $this->db->select($this->select);
        $this->db->from($this->table_name);
        if(!empty($this->join))
            $this->db->join($this->join[0],$this->join[1]);
        if(!empty($this->where))
            $this->db->where($this->where);
        $this->db->order_by($this->order_column,$this->order_type);
        if(isset($this->limit))
            $this->db->limit($this->limit,$this->offset);
        return $this->db->get();
    }

    # Use to get maximum value of a single field
    public function select_max()
    {
        $this->db->select_max($this->field_name,'maximum');
        $this->db->from($this->table_name);
        $max = $this->db->get()->row();
        return $max->maximum;

        /*
         * Example :
         * $this->mhs_model->table_name = 'mytable';
         * $this->mhs_model->field_name = 'myfield';
         * $max = $this->mhs_model->select_max();
         * echo $max;
         */
    }

    # Use to get minimum value of a single field
    public function select_min()
    {
        $this->db->select_min($this->field_name,'minimum');
        $this->db->from($this->table_name);
        $min = $this->db->get()->row();
        return $min->minimum;

        /*
         * Example :
         * $this->mhs_model->table_name = 'mytable';
         * $this->mhs_model->field_name = 'myfield';
         * $min = $this->mhs_model->select_min();
         * echo $min;
         */

    }

    # Use to get average value of a single field
    public function select_avg()
    {
        $this->db->select_avg($this->field_name,'average');
        $this->db->from($this->table_name);
        $avg = $this->db->get()->row();
        return $avg->average;

        /*
         * Example :
         * $this->mhs_model->table_name = 'mytable';
         * $this->mhs_model->field_name = 'myfield';
         * $avg = $this->mhs_model->select_avg();
         * echo $avg;
         */

    }

    # Use to get summation of a single field
    public function select_sum()
    {
        $this->db->select_sum($this->field_name,'score');
        $this->db->from($this->table_name);
        if(!empty($this->where))
            $this->db->where($this->where);
        $query = $this->db->get();
        $score = $query->result();
        return $score[0]->score;

        /*
         * Example :
         * $this->mhs_model->table_name = 'mytable';
         * $this->mhs_model->field_name = 'myfield';
         * $sum = $this->mhs_model->select_sum();
         * echo $sum;
         */

    }

    # Use to check existence of a single value
    public function check_existence()
    {
        $this->db->from($this->table_name);
        if(!empty($this->where))
            $this->db->where($this->where);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows()==1)
            return TRUE;
        else
            return FALSE;
    }

    # Use to count all row or specific row of a table
    public function count_all()
    {
        $this->db->select($this->select);
        $this->db->from($this->table_name);
        if(!empty($this->where))
            $this->db->where($this->where);
        return $this->db->count_all_results();
    }

    # Use to insert data in a table
    public function insert()
    {
       /* print_r($this->data);
        die;*/
        $this->db->set($this->data);
        $this->db->insert($this->table_name);
        return $this->db->insert_id();
    }

    # Use to update data of a table
    public function update()
    {
        $this->db->where($this->where);
        return $this->db->update($this->table_name,$this->data);
    }

    # Use to delete data of a table
    public function delete()
    {
        $this->db->where($this->where);
        $this->db->delete($this->table_name);
    }

    # Use to reset variable at the top
    public function do_reset()
    {
        $this->select = '*';
        unset($this->table_name);
        unset($this->field_name);
        unset($this->data);
        unset($this->join);
        unset($this->where);
        $this->order_column = 'id';
        $this->order_type = 'desc';
        $this->offset = 0;
        unset($this->limit);
    }



    # Get horijontal menu icon array
    function horijontal_menu_icon(){
        $menu_icon = array(
            '<i class="fa fa-tachometer"></i>',
            '<i class="fa fa-suitcase"></i>',
            '<i class="fa fa-users"></i>',
            '<i class="fa fa-calendar"></i>',
            '<i class="fa fa-file-text-o"></i>',
            '<i class="fa fa-credit-card"></i>',
            '<i class="fa fa-book"></i>',
            '<i class="fa fa-connectdevelop"></i>',
            '<i class="fa fa-rocket"></i>',
            '<i class="fa fa-cog fa-spin"></i>'
        );
        return $menu_icon;
    }
}

