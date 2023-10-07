<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('npm') == "") {
            redirect('pemilih/login');
        } else {
            $data = [
                'title' => 'E-Voting | HMIF'
            ];

            $this->load->view('templates/header-pemilih', $data);
            $this->load->view('templates/sidebar-pemilih');
            $this->load->view('pemilih/index');
            $this->load->view('templates/footer');
        }
	}

    public function voting_bpm()
    {
        $data = ['title' => 'E-Voting | BPM'];
        $query['data'] = $this->M_Pemilih->tampil_kandidat_bpm()->result_array(); 

        $this->load->view('templates/header-pemilih', $data);
        $this->load->view('templates/sidebar-pemilih');
        $this->load->view('pemilih/voting_bpm', $query);
        $this->load->view('templates/footer');
    }
    public function voting_senat()
    {
        $data = ['title' => 'E-Voting | SENAT'];
        $query['data'] = $this->M_Pemilih->tampil_kandidat_senat()->result_array(); 

        $this->load->view('templates/header-pemilih', $data);
        $this->load->view('templates/sidebar-pemilih');
        $this->load->view('pemilih/voting_senat', $query);
        $this->load->view('templates/footer');
    }
    public function voting_hima()
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $query['data'] = $this->M_Pemilih->tampil_kandidat_hima()->result_array(); 

        $this->load->view('templates/header-pemilih', $data);
        $this->load->view('templates/sidebar-pemilih');
        $this->load->view('pemilih/voting_hima', $query);
        $this->load->view('templates/footer');
    }

    public function proses_vote($id_kandidat)
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $where = array('id_kandidat' => $id_kandidat);
		$query['kandidat'] = $this->M_Pemilih->edit_kandidat($where,'tb_vote')->result_array(); 

        $this->load->view('templates/header-pemilih', $data);
        $this->load->view('templates/sidebar-pemilih');
        $this->load->view('pemilih/proses_voting', $query);
        $this->load->view('templates/footer');

        if(isset($_POST['simpan'])){
            
            $where = array('id_kandidat' => $id_kandidat);
            
            $this->M_Pemilih->update_kandidat($where, 'tb_vote');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
                Terimakasih Anda Telah Memberikan Hak Suara
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
	        redirect('pemilih/logout');
        }
    }

    public function login()
    {
        $data = ['title' => 'E-Voting | HMIF'];
        $this->load->view('templates/header-login', $data);
        $this->load->view('login-pemilih/login');
        $this->load->view('templates/footer-login');

        if (isset($_POST['login'])) {
            $data = [
                'npm' => $this->input->post('npm')
            ];

            $cek_jumlah = $this->M_Pemilih->ambil_pemilih()->num_rows();
            if ($cek_jumlah > 0) {
                $query = $this->M_Pemilih->ambil_npm($data)->result_array();
                
                foreach($query as $a): endforeach;

                $data_session = [
                    'npm' => $data['npm'],
                    'status' => $a['status']
                ];

                $this->session->set_userdata($data_session);

                if ($data_session['status'] == "Sudah") {
                    $this->session->set_flashdata('pesan-gagal', '
                    <div class="alert alert-danger" role="alert">
                        Maaf NPM Sudah Di Pakai
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('pemilih/login');
                } else if($data_session['status'] == "Belum") {
                    $this->M_Pemilih->ubah_status($data, 'tb_pemilih');
                    $this->session->set_flashdata('pesan-masuk', '
                    <div class="alert alert-success" role="alert">
                        Selamat Anda Berhasil Masuk
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('pemilih/index');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('pemilih/login');
    }
}
