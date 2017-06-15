<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bus extends CI_Controller {

function __construct()

{
parent::__construct();
$this->load->model('bus_m');
$this->load->helper('text' );

}
var $title = 'bus';

public function index()
{
if ($this->session->userdata('login') == TRUE)
		{
			$this->get_all_bus();
		}
		else
		{
			redirect('admisi');
		}
	
}
public function get_all_bus(){
	$data['title'] = $this->title;
	$data['h2_title']= 'Data | Bus';
	$data['content'] = "Bus/bus_v";
	$albums = $this->bus_m->get_all_bus()->result();
	$num_rows = $this->bus_m->count_num_rows()->num_rows();
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
			$this->table->set_heading('No','Kode Bus','Jenis Bus','Plat');

		$i = 0;

		foreach ($albums as $album)
		{
			$this->table->add_row(++$i,$album->kode_bus,$album->jenis_bus,$album->plat,
										'<div class="hidden-sm hidden-xs action-buttons">'.
										anchor('bus/update/'.$album->kode_bus,'Edit',array('class' => 'btn btn-minier btn-yellow','title'=>'Edit')).'&nbsp;'.
										anchor('bus/delete/'.$album->kode_bus,'Delete',array('class' => 'btn btn-minier btn-danger','title'=>'Delete','onclick'=>"return confirm('Anda yakin akan menghapus data ini?')")).'</div>'
									);
		}
		$data['table'] = $this->table->generate();
	}
	else
	{
		$data['message'] = 'Tidak ditemukan satupun data !';
	}
	$data['link'] = array('link_add' => anchor('bus/add/','Add', array('class' => 'btn btn-primary')));
		$this->load->view('template/index', $data);
}
	function add()
		{		
			$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Input Data Bus';
			$data['content'] 		= 'Bus/formbus_v';
			$data['form_action']	= site_url('bus/add_process');
			$data['default']['name']		= '';
			$data['link'] 			= array('link_back' => anchor('bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$this->load->view('template/index', $data);
		}
	function add_process()
	{
		$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Input Data Bus';
			$data['content'] 		= 'Bus/formkelas_v';
			$data['form_action']	= site_url('bus/add_process');
			$data['link'] 			= array('link_back' => anchor('bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$data['default']['name']		= '';
		$this->form_validation->set_rules('kode_bus', 'kode bus', 'required');
		$this->form_validation->set_rules('jenis_bus', 'Jenis Bus', 'required');
		$this->form_validation->set_rules('plat', 'Plat Nomer', 'required');
		
		
			if ($this->form_validation->run() == TRUE)
			{
				$relasi = array( 'kode_bus'	=> $this->input->post('kode_bus'),
								'jenis_bus'	=> $this->input->post('jenis_bus'),
								'plat'	=> $this->input->post('plat'),
						);
				$this->bus_m->add($relasi);
				
				$this->session->set_flashdata('message', 'Satu data berhasil disimpan !');
				redirect('bus/add');
			}
			else
			{
				$this->load->view('template/index', $data);
			}
	}
	function delete($kode_bus)
	{
		$this->bus_m->delete($kode_bus);
		$this->session->set_flashdata('message', 'Satu data berhasil dihapus !');
		redirect('bus/');
	}
	function update($kode_bus)
		{

			$data['title'] 			= $this->title; 
			$data['h2_title'] 		= 'Edit Data Bus';
			$data['content'] 		= 'Bus/formbus_v';
			$data['form_action']	= site_url('bus/update_process');
			$data['link'] 			= array('link_back' => anchor('bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));	

			$bus = $this->bus_m->get_bus_by_kode_bus($kode_bus)->row();				

			$this->session->set_userdata('kode_bus', $bus->kode_bus);		

			$data['default']['kode_bus'] 	= $bus->kode_bus;	
			$data['default']['jenis_bus'] 	= $bus->jenis_bus;	
			$data['default']['plat'] 	= $bus->plat;	
			
			$this->load->view('template/index', $data);
		}

	function update_process()
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Edit Data Bus';
		$data['content'] 		= 'Bus/formbus_v';
		$data['form_action']	= site_url('bus/update_process');
		$data['link'] 			= array('link_back' => anchor('bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
		$this->form_validation->set_rules('kode_bus', 'kode bus', 'required');
		$this->form_validation->set_rules('jenis_bus', 'Jenis Bus', 'required');
		$this->form_validation->set_rules('plat', 'Plat Nomor', 'required');
		

		if ($this->form_validation->run() == TRUE){
			
				$relasi = array( 'kode_bus'	=> $this->input->post('kode_bus'),
								'jenis_bus'	=> $this->input->post('jenis_bus'),
								'plat'	=> $this->input->post('plat'),
						
						);
					
			$this->bus_m->update($this->session->userdata('kode_bus'), $relasi);
			$this->session->set_flashdata('message', 'Satu data berhasil diupdate !');
			redirect('bus/');
		}else{		
			$this->load->view('template/index', $data);
		}
	}

}
?>