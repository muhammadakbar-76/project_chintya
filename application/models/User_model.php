<?php

class User_model extends CI_Model
{

    private $table = 'user';

    public function read($select, $where, $order = '', $limit = '', $start = '')
    {
        $this->db->select($select);
        $this->db->join('tb_pegawai b', 'b.id_pegawai = a.id_pegawai', 'left');
        $this->db->join('tb_jabatan c', 'c.id_jabatan = b.id_jabatan', 'left');
        $this->db->join('tb_usertype d', 'd.id_usertype = c.id_usertype', 'left');
        if (!empty($where)) $this->db->where($where);
        $this->db->order_by($order);
        return $this->db->get("$this->table a", $limit, $start);
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
