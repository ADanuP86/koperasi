<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Beranda extends CI_Model {
    public function get_all_count() {
        $anggota = $this->db->get('anggota')->num_rows();
            
        $count = [
        	'anggota' => $anggota,
        ];
            return $count;
        }

    public function hitungJumlahSimpanan() {
    	$this->db->select_sum('besar_simpanan');
    	$query = $this->db->get('detail_simpanan');

    	if($query->num_rows()>0) {
    		return $query->row()->besar_simpanan;
    	}
    	else {
    		return 0;
    	}
    }

    public function hitungJumlahPinjaman() {
    	$this->db->select_sum('besar_pinjaman');
    	$query = $this->db->get('detail_pinjaman');

    	if($query->num_rows()>0) {
    		return $query->row()->besar_pinjaman;
    	}
    	else {
    		return 0;
    	}
    }
}
