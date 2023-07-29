<?php

class Mutasi_model extends CI_Model
{

    private $table = 'tb_mutasi';

    public function read($select, $where, $order = '', $limit = '', $start = '')
    {
        $this->db->select($select);
        $this->db->join('tb_jabatan b', 'b.id_jabatan = a.id_jabatan_lama', 'left');
        $this->db->join('tb_jabatan c', 'c.id_jabatan = a.id_jabatan_baru', 'left');
        $this->db->join('tb_divisi d', 'd.id_divisi = a.id_divisi_lama', 'left');
        $this->db->join('tb_divisi e', 'e.id_divisi = a.id_divisi_baru', 'left');
        $this->db->join('tb_pegawai f', 'f.id_pegawai = a.id_pegawai', 'left');
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
