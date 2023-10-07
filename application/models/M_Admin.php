<?php 
    class M_Admin extends CI_Model {

        //coba
        public function coba()
        {
            return $this->db->get('tb_coba');
        }
        public function addCoba($data)
        {
            $this->db->insert('tb_coba', $data);
        }

        public function tampil_data()
        {
            return $this->db->query('select * from tb_pemilih');
        }
        public function tampil_kandidat()
        {
            return $this->db->get('tb_kandidat');
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
        public function hasil_vote()
        {
            return $this->db->get('hasil_vote');
        }
        public function kahim_terpilih()
        {
            return $this->db->query('SELECT * FROM hasil_vote ORDER by jumlah DESC LIMIT 1');
        }
        public function tambah($tambah_data, $table)
        {
            $this->db->insert($table, $tambah_data);
        }
        public function ubah_pemilih($where, $table)
        {
            return $this->db->get_where($table, $where);
        }
        public function ubah($ubah_data, $where)
        {
            $this->db->update('tb_pemilih', $ubah_data, $where);
        }
        public function hapus_pemilih($where)
        {
            $this->db->delete('tb_pemilih', $where);
        }

        //kandidat
        public function tambah_kandidat($tambah_data, $table)
        {
            $this->db->insert($table, $tambah_data);
        }
        
        public function detail_kandidat($where, $table)
        {
            return $this->db->get_where($table, $where);
        }

        public function ubah_kandidat($ubah_data, $where)
        {
            $this->db->update('tb_kandidat', $ubah_data, $where);
        }

        public function hapus_kandidat($where)
        {
            $foto = $this->db->get_where('tb_kandidat', $where)->row_array();
            $query = $this->db->delete('tb_kandidat', $where);
            if($query)
            {
                unlink('./assets/dist/img/'.$foto['foto']);
            }
        }

        //voting
        public function tampil_voting()
        {
            return $this->db->get('tb_vote');
        }

        public function tambah_vote($tambah_data, $table)
        {
            $this->db->insert($table, $tambah_data);
        }

        public function edit_vote($where, $table)
        {
            return $this->db->get_where($table, $where);
        }

        public function ubah_voting($ubah_data, $where)
        {
            $this->db->update('tb_vote', $ubah_data, $where);
        }

        public function hapus_voting($where)
        {
            $this->db->delete('tb_vote', $where);
        }

        public function kosongkan()
        {
            $this->db->query('TRUNCATE tb_pemilih');
        }
    }
?>