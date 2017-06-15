<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

function __construct()

{
parent::__construct();
$this->load->model('users_m');
$this->load->helper('text' );

}
var $title = 'Users';

public function index()
{
if ($this->session->userdata('login') == TRUE)
		{
			$this->get_all_users();
		}
		else
		{
			redirect('admisi');
		}
	
}
public function get_all_users(){
	$data['title'] = $this->title;
	$data['h2_title']= 'Data | Buku';
	$data['content'] = "buku/user_v";
	$albums = $this->users_m->get_all_users()->result();
	$num_rows = $this->users_m->count_num_rows()->num_rows();
	if ($num_rows > 0)
	{
		$tmpl = array('table_open'          => '<table id="dynamic-table" class="table table-striped table-bordered table-hover">', 						
						'heading_row_start'   => '<thead><tr>',
                    	'heading_row_end'     => '</tr></thead><tbody>',
                    	'heading_cell_start'  => '<th>',
                    	'heading_cell_end'    => '</th>',						
                    	'row_start'           => '<tr>',
                    	'row_end'             => '</tr>',
                    	'cell_start'          => '<td>',
                    	'cell_end'            => '</td>',
	                   'table_close'         => '</tbody></table>'
              );
		$this->table->set_template($tmpl);
			$this->table->set_empty("&nbsp;");
			$this->table->set_heading('No','Kode Buku','Judul','Pengarang','Penerbit','Thun Terbit','Kota Terbit','Oprastion');

		$i = 0;

		foreach ($albums as $album)
		{
			$this->table->add_row(++$i,$album->kd_buku,$album->judul,$album->pengarang,$album->penerbit,$album->thn_terbit,$album->kota_trb,
										'<div class="hidden-sm hidden-xs action-buttons">'.
										anchor('users/update/'.$album->id,'Edit',array('class' => 'btn btn-minier btn-yellow','title'=>'Edit')).'&nbsp;'.
										anchor('users/delete/'.$album->id,'Delete',array('class' => 'btn btn-minier btn-danger','title'=>'Delete','onclick'=>"return confirm('Anda yakin akan menghapus data ini?')")).'</div>'
									);
		}
		$data['table'] = $this->table->generate();
	}
	else
	{
		$data['message'] = 'Tidak ditemukan satupun data !';
	}
	$data['link'] = array('link_add' => anchor('users/add/','Add', array('class' => 'btn btn-primary')));
		$this->load->view('template/index', $data);
}
	function add()
		{		
			$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Data | Buku | Add';
			$data['content'] 		= 'buku/frmuser_v';
			$data['form_action']	= site_url('users/add_process');
			$data['default']['name']		= '';
			$data['link'] 			= array('link_back' => anchor('users/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$this->load->view('template/index', $data);
		}
	function add_process()
	{
		$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Data | Buku | Add';
			$data['content'] 		= 'buku/formkelas_v';
			$data['form_action']	= site_url('users/add_process');
			$data['link'] 			= array('link_back' => anchor('users/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$data['default']['name']		= '';
		$this->form_validation->set_rules('kd_buku', 'Kode Buku', 'required');
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('thn_terbit', 'Tahun Terbit', 'required');
		$this->form_validation->set_rules('kota_trb', 'Kota Terbit', 'required');
		
			if ($this->form_validation->run() == TRUE)
			{
				$relasi = array( 'kd_buku'	=> $this->input->post('kd_buku'),
								'judul'	=> $this->input->post('judul'),
								'pengarang'	=> $this->input->post('pengarang'),
								'penerbit'	=> $this->input->post('penerbit'),
								'thn_terbit'	=> $this->input->post('thn_terbit'),
								'kota_trb'	=> $this->input->post('kota_trb')
						);
				$this->users_m->add($relasi);
				
				$this->session->set_flashdata('message', 'Satu data berhasil disimpan !');
				redirect('users/add');
			}
			else
			{
				$this->load->view('template/index', $data);
			}
	}
	function delete($id)
	{
		$this->users_m->delete($id);
		$this->session->set_flashdata('message', 'Satu data berhasil dihapus !');
		redirect('users/');
	}
	function update($id)
		{

			$data['title'] 			= $this->title; 
			$data['h2_title'] 		= 'Data | Buku | Edit';
			$data['content'] 		= 'buku/frmuser_v';
			$data['form_action']	= site_url('users/update_process');
			$data['link'] 			= array('link_back' => anchor('users/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));	

			$users = $this->users_m->get_users_by_id($id)->row();				

			$this->session->set_userdata('id', $users->id);		

			$data['default']['id'] 	= $users->id;		
			$data['default']['kd_buku']		= $users->kd_buku;
			$data['default']['judul']		= $users->judul;
			$data['default']['pengarang']		= $users->pengarang;
			$data['default']['penerbit']		= $users->penerbit;
			$data['default']['thn_terbit']		= $users->thn_terbit;
			$data['default']['kota_trb']		= $users->kota_trb;
			
			$this->load->view('template/index', $data);
		}

	function update_process()
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Data | Buku | Edit';
		$data['content'] 		= 'buku/frmuser_v';
		$data['form_action']	= site_url('users/update_process');
		$data['link'] 			= array('link_back' => anchor('users/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
		$this->form_validation->set_rules('kd_buku', 'Kode Buku', 'required');
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('thn_terbit', 'Tahun Terbit', 'required');
		$this->form_validation->set_rules('kota_trb', 'Kota Terbit', 'required');

		if ($this->form_validation->run() == TRUE){
			
				$relasi = array( 'kd_buku'	=> $this->input->post('kd_buku'),
								'judul'	=> $this->input->post('judul'),
								'pengarang'	=> $this->input->post('pengarang'),
								'penerbit'	=> $this->input->post('penerbit'),
								'thn_terbit'	=> $this->input->post('thn_terbit'),
								'kota_trb'	=> $this->input->post('kota_trb')
						);
					
			$this->users_m->update($this->session->userdata('id'), $relasi);
			$this->session->set_flashdata('message', 'Satu data berhasil diupdate !');
			redirect('users/');
		}else{		
			$this->load->view('template/index', $data);
		}
	}

}
?>