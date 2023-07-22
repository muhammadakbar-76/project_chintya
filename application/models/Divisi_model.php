<?php

class Divisi_model extends CI_Model
{

    private $table = 'tb_divisi';

    public function read($select, $where, $order = '', $limit = '', $start = '')
    {
        $this->db->select($select);
        if (!empty($where)) $this->db->where($where);
        $this->db->order_by($order);
        return $this->db->get($this->table, $limit, $start);
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        return $this->db->update($this->table, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->table);
    }
}
