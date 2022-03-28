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
    }
