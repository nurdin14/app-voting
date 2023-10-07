<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('m_admin');
        }

    public function index()
    {
        $data =[
            'title' => 'Judul',
            'tampil' => $this->m_admin->coba()->result_array()
        ];
        $this->load->view('coba/v_list', $data);
    }

    public function tambah()
    {
        $config['upload_path']          = './assets/dist/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')){
                $this->load->view('coba/v_add');
        }else{
            $_data = array('upload_data' => $this->upload->data());
            $data = array(
                'id' => $this->input->post('id'),
                'title'=> $this->input->post('title'),
                'image' => $_data['upload_data']['file_name']
                );
            $this->m_admin->addCoba($data);
            redirect(base_url('coba/index'));
        }
    }

    public function hapus($id)
    {
            $_id = $this->db->get_where('tb_coba',['id' => $id])->row();
            $query = $this->db->delete('tb_coba',['id'=>$id]);
            if($query){
                unlink("assets/dist/img/".$_id->image);
            }
            redirect('coba/index');
    }


}