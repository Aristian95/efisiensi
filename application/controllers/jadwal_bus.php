<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_bus extends CI_Controller {

function __construct()

{
parent::__construct();
$this->load->model('jadwal_m');
$this->load->helper('text' );

}
var $title = 'jadwal_bus';

public function index()
{
if ($this->session->userdata('login') == TRUE)
		{
			$this->get_all_jadwal_bus();
		}
		else
		{
			redirect('admisi');
		}
	
}
public function get_all_jadwal_bus(){
	$data['title'] = $this->title;
	$data['h2_title']= 'Data | Jadwal Bus';
	$data['content'] = "Bus/jadwal_v";
	$albums = $this->jadwal_m->get_all_jadwal_bus()->result();
	$num_rows = $this->jadwal_m->count_num_rows()->num_rows();
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
			$this->table->set_heading('No','kode jadwal','asal','tujuan','jam keberangkatan');

		$i = 0;

		foreach ($albums as $album)
		{
			$this->table->add_row(++$i,$album->kode_jadwal,$album->asal,$album->tujuan,$album->jam_keberangkatan,
										'<div class="hidden-sm hidden-xs action-buttons">'.
										anchor('jadwal_bus/update/'.$album->kode_jadwal,'Edit',array('class' => 'btn btn-minier btn-yellow','title'=>'Edit')).'&nbsp;'.
										anchor('jadwal_bus/delete/'.$album->kode_jadwal,'Delete',array('class' => 'btn btn-minier btn-danger','title'=>'Delete','onclick'=>"return confirm('Anda yakin akan menghapus data ini?')")).'</div>'
									);
		}
		$data['table'] = $this->table->generate();
	}
	else
	{
		$data['message'] = 'Tidak ditemukan satupun data !';
	}
	$data['link'] = array('link_add' => anchor('jadwal_bus/add/','Add', array('class' => 'btn btn-primary')));
		$this->load->view('template/index', $data);
}
	function add()
		{		
			$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Input Jadwal Keberangkatan Bus';
			$data['content'] 		= 'Bus/formjadwal_v';
			$data['form_action']	= site_url('jadwal_bus/add_process');
			$data['default']['name']		= '';
			$data['link'] 			= array('link_back' => anchor('jadwal_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$this->load->view('template/index', $data);
		}
	function add_process()
	{
		$data['title'] 			= $this->title;
			$data['h2_title'] 		= 'Input Jadwal Keberangkatan Bus';
			$data['content'] 		= 'Bus/formkelas_v';
			$data['form_action']	= site_url('jadwal_bus/add_process');
			$data['link'] 			= array('link_back' => anchor('jadwal_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
			$data['default']['name']		= '';
		$this->form_validation->set_rules('kode_jadwal', 'kode jadwal', 'required');
		$this->form_validation->set_rules('asal', 'Asal', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
		$this->form_validation->set_rules('jam_keberangkatan', 'Jam Keberangkatan', 'required');
		
		
			if ($this->form_validation->run() == TRUE)
			{
				$relasi = array( 'kode_jadwal'	=> $this->input->post('kode_jadwal'),
								'asal'	=> $this->input->post('asal'),
								'tujuan'	=> $this->input->post('tujuan'),
								'jam_keberangkatan'	=> $this->input->post('jam_keberangkatan'),
						);
				$this->jadwal_m->add($relasi);
				
				$this->session->set_flashdata('message', 'Satu data berhasil disimpan !');
				redirect('jadwal_bus/add');
			}
			else
			{
				$this->load->view('template/index', $data);
			}
	}
	function delete($kode_bus)
	{
		$this->jadwal_m->delete($kode_bus);
		$this->session->set_flashdata('message', 'Satu data berhasil dihapus !');
		redirect('jadwal_bus/');
	}
	function update($kode_bus)
		{

			$data['title'] 			= $this->title; 
			$data['h2_title'] 		= 'Edit Jadwal Keberangkatan Bus';
			$data['content'] 		= 'Bus/formjadwal_v';
			$data['form_action']	= site_url('jadwal_bus/update_process');
			$data['link'] 			= array('link_back' => anchor('jadwal_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));	

			$jadwal_bus = $this->jadwal_m->get_jadwal_bus_by_kode_jadwal($kode_jadwal)->row();				

			$this->session->set_userdata('kode_jadwal', $jadwal_bus->kode_jadwal);		

			$data['default']['kode_jadwal'] 	= $jadwal_bus->kode_jadwal;	
			$data['default']['asal'] 	= $jadwal_bus->asal;	
			$data['default']['tujuan'] 	= $jadwal_bus->tujuan;	
			$data['default']['jam_keberangkatan'] 	= $jadwal_bus->jam_keberangkatan;	
			
			$this->load->view('template/index', $data);
		}

	function update_process()
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Edit Jadwal Keberangkatan Bus';
		$data['content'] 		= 'Bus/formbus_v';
		$data['form_action']	= site_url('jadwal_bus/update_process');
		$data['link'] 			= array('link_back' => anchor('jadwal_bus/','<i class="icon-arrow-left icon-white"></i>Back', array('class' => 'btn btn-success')));
		$this->form_validation->set_rules('kode_jadwal', 'kode jadwal', 'required');
		$this->form_validation->set_rules('asal', 'Asal', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
		$this->form_validation->set_rules('jam_keberangkatan', 'Jam Keberangkatan', 'required');
		
		

		if ($this->form_validation->run() == TRUE){
			
				$relasi = array( 'kode_jadwal'	=> $this->input->post('kode_jadwal'),
								'asal'	=> $this->input->post('asal'),
								'tujuan'	=> $this->input->post('tujuan'),
								'jam_keberangkatan'	=> $this->input->post('jam_keberangkatan'),
						
						);
					
			$this->jadwal_m->update($this->session->userdata('kode_bus'), $relasi);
			$this->session->set_flashdata('message', 'Satu data berhasil diupdate !');
			redirect('jadwal_bus/');
		}else{		
			$this->load->view('template/index', $data);
		}
	}

}
?>