<?php

class Group_m extends CI_Model {   

    function __construct()
    {
        parent::__construct();
        $this->load->library('datagrid');
    }


    public function all()
    {
    	$groups = $this->db->get('groups')->result();
		return $groups;
    }


    public function get_group($id)
    {
        $query = $this->db->from('groups g')
                        ->select('g.*')
                        ->where('g.id', $id)
                        ->get();

        return $query->row();
    }


    public function getJson($input)
    {
        $table  = 'mng_role as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'group_name', 'new_name' => 'a.group_name']
        ];

        $param = [
            'input'     => $input,
            'select'    => $select,
            'table'     => $table,
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data;
        });

        return $data;
    }
      public function getJsonDepartment($input)
    {
        $table  = 'user_department as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'name', 'new_name' => 'a.name']
        ];

        $param = [
            'input'     => $input,
            'select'    => $select,
            'table'     => $table,
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data;
        });

        return $data;
    }
     public function getJsonPresenter($input)
    {
        $table  = 'actors as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'actor_name', 'new_name' => 'a.actor_name']
        ];

        $param = [
            'input'     => $input,
            'select'    => $select,
            'table'     => $table,
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data->order_by('actor_name');
        });

        return $data;
    }
     public function getJsonCategory($input)
    {

        $param = [
            'input'     => $input,
            'select'    => "*",
            'table'     => 'category',
            'replace_field' => []
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data->order_by('order');
        });

        return $data;
    }
 public function getJsonTheme($input)
    {

        $param = [
            'input'     => $input,
            'select'    => "*",
            'table'     => 'theme_list',
            'replace_field' => []
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data;
        });

        return $data;
    }
public function getJsonChannel($input)
    {

        $param = [
            'input'     => $input,
            'select'    => "channel_list.*",
            'table'     => 'channel_list',
            'replace_field' => []
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data->join('categorychannel', 'categorychannel.Id = channel_list.category', 'left');
        });

        return $data;
    }


}