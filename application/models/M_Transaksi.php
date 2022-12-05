<?php

class M_Transaksi extends CI_Model{

    public function get_all_transaksi(){
        $this->db->select('a.id as id, b.nama as nama_pd, c.nama as nama_retribusi, a.tanggal_upload as tanggal, a.nominal as nominal, a.bukti as bukti, a.status as status');
        $this->db->from('transaksi a');
        $this->db->join('opd b', 'a.id_opd=b.id');
        $this->db->join('jenis_retribusi c', 'a.id_jenis_retribusi=c.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
                return $query->result();
            } else {
                return false;
        }
    }

    public function get_transaksi_pending(){
        $this->db->select('a.id as id, b.nama as nama_pd, c.nama as nama_retribusi, a.tanggal_upload as tanggal, a.nominal as nominal, a.bukti as bukti, a.status as status');
        $this->db->from('transaksi a');
        $this->db->join('opd b', 'a.id_opd=b.id');
        $this->db->join('jenis_retribusi c', 'a.id_jenis_retribusi=c.id');
        $this->db->where('a.status', '0');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
                return $query->result();
            } else {
                return false;
        }
    }
    
}

?>