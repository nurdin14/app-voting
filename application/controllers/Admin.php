<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data = [
            'title' => 'E-Voting | HMIF',
            'kandidat' => $this->M_Admin->hasil_vote()->result_array(),
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
	}

    public function pemilih()
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $query['data'] = $this->M_Admin->tampil_data()->result_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/pemilih/pemilih', $query);
        $this->load->view('templates/footer');
    }

    public function create_import()
    {
        $data = ['title' => 'E-Voting | HMIF'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/pemilih/import');
        $this->load->view('templates/footer');
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 2; $row <= $highestRow; $row++) {

                    $id_pemilih = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $npm = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nama= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $status= $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $data[] = array(
                        'id_pemilih'          => $id_pemilih,
                        'npm'          => $npm,
                        'nama'         => $nama,
                        'status'         => $status,
                    );
                }
            }

            $this->db->insert_batch('tb_pemilih', $data);
            redirect('admin/pemilih');
        }
    }

    public function truncate()
    {
        $this->M_Admin->kosongkan();
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger" role="alert">
            Data Berhasil Dikosongkan
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/pemilih');
    }

    public function voting()
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $query['data'] = $this->M_Admin->tampil_kandidat()->result_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/voting/voting', $query);
        $this->load->view('templates/footer');
    }

    public function proses_vote($id_kandidat)
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $where = array('id_kandidat' => $id_kandidat);
		$query['kandidat'] = $this->M_Admin->edit_kandidat($where,'tb_vote')->result_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/voting/proses_voting', $query);
        $this->load->view('templates/footer');

        if(isset($_POST['simpan'])){
            
            $where = array('id_kandidat' => $id_kandidat);
            
            $this->M_Admin->update_kandidat($where, 'tb_vote');
	        redirect('admin/voting');
        }
    }
    
    public function hasil_vote()
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $query = [
            'kandidat' => $this->M_Admin->hasil_vote()->result_array(),
            'kahim_terpilih' => $this->M_Admin->kahim_terpilih()->result_array()
        ]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/voting/hasil_voting', $query);
        $this->load->view('templates/footer');
    }

    public function tambah_pemilih()
    {
        $data = [
            'title' => 'E-Voting | HMIF' 
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/pemilih/tambah_pemilih');
        $this->load->view('templates/footer');

        if(isset($_POST['simpan']))
        {
            $tambah_data = array(
                'id_pemilih' => $this->input->post('id_pemilih'),
                'npm' => $this->input->post('npm'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status')
            );
            
            $this->M_Admin->tambah($tambah_data, 'tb_pemilih');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/pemilih');
        }
    }

    public function ubah_pemilih($id_pemilih)
    {
        $where = ['id_pemilih' => $id_pemilih];

        $data = [
            'title' => 'E-Voting | HMIF',
            'pemilih' => $this->M_Admin->ubah_pemilih($where, 'tb_pemilih')->result_array() 
        ];   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/pemilih/ubah_pemilih');
        $this->load->view('templates/footer');

        if(isset($_POST['simpan']))
        {
            $where = ['id_pemilih' => $id_pemilih];
            $ubah_data = array(
                'id_pemilih' => $this->input->post('id_pemilih'),
                'npm' => $this->input->post('npm'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status')
            );
            
            $this->M_Admin->ubah($ubah_data, $where);
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diubah
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/pemilih');
        }
    }

    public function hapus_pemilih($id_pemilih)
    {
        $where = ['id_pemilih' => $id_pemilih];
        $this->M_Admin->hapus_pemilih($where);
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/pemilih');
    }

    //kandidat
    public function tampil_kandidat()
    {
        $data = [
            'title' => 'E-Voting | HMIF',
            'kandidat' => $this->M_Admin->tampil_kandidat()->result_array() 
        ];   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kandidat/kandidat', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah_kandidat()
    {
        $data = [
            'title' => 'E-Voting | HMIF' 
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kandidat/tambah_kandidat');
        $this->load->view('templates/footer');

        if(isset($_POST['simpan']))
        {
            //upload gambar
            $config['upload_path'] = './assets/dist/img';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048';  //2MB max
            $config['max_width'] = '4480'; // pixel
            $config['max_height'] = '4480'; // pixel
            $config['file_name'] = $_FILES['foto']['name'];

            $this->load->library('upload',$config);

            if(!empty($_FILES['foto']['name'])) {
                if($this->upload->do_upload('foto'))
                {
                    $foto = $this->upload->data();
                    $f = $foto['file_name'];
                }
            } 
            
            $tambah_data = [
                'id_kandidat' => $this->input->post('id_kandidat'),
                'nama' => $this->input->post('nama'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
                'keterangan' => $this->input->post('keterangan'),
                'foto' => $f
            ];
            
            $this->M_Admin->tambah_kandidat($tambah_data, 'tb_kandidat');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/tampil_kandidat');
        }
    }

    public function detail_kandidat($id_kandidat)
    {
        $where = ['id_kandidat' => $id_kandidat];
        $data = [
            'title' => 'E-Voting | HMIF',
            'kandidat' => $this->M_Admin->detail_kandidat($where, 'tb_kandidat')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kandidat/detail_kandidat', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_kandidat($id_kandidat)
    {
        $where = ['id_kandidat' => $id_kandidat];

        $data = [
            'title' => 'E-Voting | HMIF',
            'kandidat' => $this->M_Admin->detail_kandidat($where, 'tb_kandidat')->result_array() 
        ];   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kandidat/ubah_kandidat', $data);
        $this->load->view('templates/footer');

        if(isset($_POST['simpan']))
        {
            //upload gambar
            $config['upload_path'] = './assets/dist/img';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048';  //2MB max
            $config['max_width'] = '4480'; // pixel
            $config['max_height'] = '4480'; // pixel
            $config['file_name'] = $_FILES['foto']['name'];

            $this->load->library('upload', $config);

            if (!empty($config['file_name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    $f = $foto['file_name'];
                }
            } else {
                $f = $this->input->post('foto_old');
            }

            
            $ubah_data = array(
                'id_kandidat' => $this->input->post('id_kandidat'),
                'nama' => $this->input->post('nama'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
                'keterangan' => $this->input->post('keterangan'),
                'foto' => $f
            );
            
            $this->M_Admin->ubah_kandidat($ubah_data, $where);
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diubah
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/tampil_kandidat');
        }
    }

    public function hapus_kandidat($id_kandidat)
    {
        $where = ['id_kandidat' => $id_kandidat];
        $_id = $this->db->get_where('tb_kandidat', $where)->row();
        $query = $this->db->delete('tb_kandidat', $where);
        if ($query) {
            unlink("assets/dist/img/" . $_id->foto);
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger" role="alert">
                Data Berhasil Dihapus
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
        
        redirect('admin/tampil_kandidat');
    }

    //vote
    public function tampil_voting()
    {
        $data = [
            'title' => 'E-Voting | HMIF',
            'voting' => $this->M_Admin->tampil_voting()->result_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/data_voting/voting', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_voting()
    {
        $data = [
            'title' => 'E-Voting | HMIF',
            'kandidat' => $this->M_Admin->tampil_kandidat()->result_array() 
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/data_voting/tambah_voting', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['simpan'])) {
            $tambah_data = [
                'id_vote' => $this->input->post('id_vote'),
                'id_kandidat' => $this->input->post('id_kandidat'),
                'jumlah' => $this->input->post('jumlah'),
            ];

            $this->M_Admin->tambah_vote($tambah_data, 'tb_vote');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/tampil_voting');
        }
    }

    public function ubah_voting($id_vote)
    {
        $where = ['id_vote' => $id_vote];

        $data = [
            'title' => 'E-Voting | HMIF',
            'vote' => $this->M_Admin->edit_vote($where, 'tb_vote')->result_array(),
            'kandidat' => $this->M_Admin->tampil_kandidat()->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/data_voting/ubah_voting', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['simpan'])) {
            $where = ['id_vote' => $id_vote];
            $ubah_data = array(
                'id_vote' => $this->input->post('id_vote'),
                'id_kandidat' => $this->input->post('id_kandidat'),
                'jumlah' => $this->input->post('jumlah'),
            );

            $this->M_Admin->ubah_voting($ubah_data, $where);
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diubah
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/tampil_voting');
        }
    }

    public function hapus_voting($id_vote)
    {
        $where = ['id_vote' => $id_vote];
        $this->M_Admin->hapus_voting($where);
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/tampil_voting');
    }

    public function cetak_voting()
    {
        $data = [
            'title' => 'E-Voting | HMIF',
            'voting' => $this->M_Admin->hasil_vote()->result_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/hasil_voting/hasil_voting', $data);
        $this->load->view('templates/footer');
    }

    
}
