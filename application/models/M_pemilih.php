<?php 
    class M_Pemilih extends CI_Model {

        public function ambil_pemilih()
        {
            return $this->db->get('tb_pemilih');
        }
        public function ambil_npm($data)
        {
            return $this->db->get_where('tb_pemilih', $data);
        }

        public function ubah_status($data, $table)
        {
            $this->db->set('status', 'Sudah');
            $this->db->where($data);
            $this->db->update($table);
        }

        public function tampil_kandidat_bpm()
        {
            return $this->db->get_where('tb_kandidat', ['keterangan' => 'BPM']);
        }
        public function tampil_kandidat_senat()
        {
            return $this->db->get_where('tb_kandidat', ['keterangan' => 'SENAT']);
        }
        public function tampil_kandidat_hima()
        {
            return $this->db->get_where('tb_kandidat', ['keterangan' => 'HIMA']);
        }

        public function edit_kandidat($where, $table)
        {
            return $this->db->get_where($table, $where);
        }

        public function update_kandidat($where, $table)
        {
            $sql = $this->db->get_where($table, $where)->row_array();
            $jumlah = $sql['jumlah']+1;

            $data = ['jumlah' => $jumlah];
            $this->db->where($where);
            $this->db->update($table, $data);
        }
    }
?>