<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class agen_bus extends CI_Controller {

function __construct()

{
parent::__construct();
$this->load->model('agen_m');
$this->load->helper('text' );

}
var $title = 'agen_bus';

public function index()
{
if ($this->session->userdata('login') == TRUE)
		{
			$this->get_all_agen_bus();
		}
		else
		{
			redirect('admisi');
		}
	
}
public function get_all_agen_bus(){
	$data['title'] = $this->title;
	$data['h2_title']= 'Data | Agen Bus';
	$data['content'] = "Bus/agen_v";
	$albums = $this->agen_m->get_all_agen_bus()->result();
	$num_rows = $this->agen_m->count_num_rows()->num_rows();
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
			$this->table->set_heading('No','Kode Agen','Nama Agen','Alamat Agen','Telepon');

		$i = 0;

		foreach ($albums as $album)
		{
			$this->table->add_row(++$i,$album->kode_agen,$album->nama_agen,$album->alamat_agen,$album->no_telp,
										'<div class="hidden-sm hidden-xs action-buttons">'.
										anchor('agen_bus/update/'.$album->kode_agen,'Edit',array('class' => 'btn btn-minier btn-yellow','title'=>'Edit')).'&nbsp;'.
										anchor('agen_bus/delete/'.$album->kode_agen,'Delete',array('class' => 'btn btn-minier btn-danger','title'=>'Delete','onclick'=>"return confirm('Anda yakin akan menghapus data ini?')")).'</div>'
									);
		}
		$data['table'] = $this->table->generate();
	}
	else
	{
		$data['message'] = 'Tidak ditemukan satupun data !';
	}
	$data['link'] = array('link_add' => anchor('agen_bus/add/','Add', array('class' => 'btn btn-primary')));
		$this->load->view('template/index', $data);
}
	function add()
		{		
			$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Input Data Agen Bus';
			$data['content'] 		= 'Bus/formagen_v';
			$data['form_action']	= site_url('agen_bus/add_process');
			$data['default']['name']		= '';
			$data['link'] 			= array('link_back' => anchor('agen_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$this->load->view('template/index', $data);
		}
	function add_process()
	{
		$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Input Data Agen Bus';
			$data['content'] 		= 'Bus/formkelas_v';
			$data['form_action']	= site_url('agen_bus/add_process');
			$data['link'] 			= array('link_back' => anchor('agen_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$data['default']['name']		= '';
		$this->form_validation->set_rules('kode_agen', 'kode agen', 'required');
		$this->form_validation->set_rules('nama_agen', 'Nama Agen', 'required');
		$this->form_validation->set_rules('alamat_agen', 'Alamat Agen', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		
		
			if ($this->form_validation->run() == TRUE)
			{
				$relasi = array( 'kode_agen'	=> $this->input->post('kode_agen'),
								'nama_agen'	=> $this->input->post('nama_agen'),
								'alamat_agen'	=> $this->input->post('alamat_agen'),
								'no_telp'	=> $this->input->post('no_telp'),
						);
				$this->agen_m->add($relasi);
				
				$this->session->set_flashdata('message', 'Satu data berhasil disimpan !');
				redirect('agen_bus/add');
			}
			else
			{
				$this->load->view('template/index', $data);
			}
	}
	function delete($kode_agen)
	{
		$this->agen_m->delete($kode_agen);
		$this->session->set_flashdata('message', 'Satu data berhasil dihapus !');
		redirect('agen_bus/');
	}
	function update($agen_bus)
		{

			$data['title'] 			= $this->title; 
			$data['h2_title'] 		= 'Edit Data Agen Bus';
			$data['content'] 		= 'Bus/formagen_v';
			$data['form_action']	= site_url('agen_bus/update_process');
			$data['link'] 			= array('link_back' => anchor('agen_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));	

			$jadwal_bus = $this->agen_m->get_agen_bus_by_kode_jadwal($kode_agen)->row();				

			$this->session->set_userdata('kode_agen', $agen_bus->kode_agen);		

			$data['default']['kode_agen'] 	= $agen_bus->kode_agen;	
			$data['default']['nama_agen'] 	= $agen_bus->nama_agen;	
			$data['default']['alamat_agen'] 	= $agen_bus->alamat_agen;	
			$data['default']['no_telp'] 	= $agen_bus->no_telp;	
			
			$this->load->view('template/index', $data);
		}

	function update_process()
	{
		$data['title'] 			= $this->title; 
			$data['h2_title'] 		= 'Edit Data Agen Bus';
			$data['content'] 		= 'Bus/formagen_v';
			$data['form_action']	= site_url('agen_bus/update_process');
			$data['link'] 			= array('link_back' => anchor('agen_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
		$this->form_validation->set_rules('kode_agen', 'kode agen', 'required');
		$this->form_validation->set_rules('nama_agen', 'Nama Agen', 'required');
		$this->form_validation->set_rules('alamat_agen', 'Alamat Agen', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		
		

		if ($this->form_validation->run() == TRUE){
			
				$relasi = array( 'kode_agen'	=> $this->input->post('kode_agen'),
								'nama_agen'	=> $this->input->post('nama_agen'),
								'alamat_agen'	=> $this->input->post('alamat_agen'),
								'no_telp'	=> $this->input->post('no_telp'),
						);
					
			$this->agen_m->update($this->session->userdata('agen_bus'), $relasi);
			$this->session->set_flashdata('message', 'Satu data berhasil diupdate !');
			redirect('agen_bus/');
		}else{		
			$this->load->view('template/index', $data);
		}
	}

}
?>