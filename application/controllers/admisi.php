<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admisi extends CI_Controller {

function __construct()

{
parent::__construct();
$this->load->model('admisi_m');
$this->load->helper('text' );

}
var $title = 'Admin';

public function index()

{
			$data['form_action']= site_url('admisi/cek/');
			
			$this->load->view('login',$data);
}
public function cek(){
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('pass', 'pass', 'required');
					
			if ($this->form_validation->run() == TRUE)
			{
				$user=$this->input->post('username');
				$pass=$this->input->post('pass');
				$num=$this->admisi_m->login($user,$pass);
				if($num==TRUE){
					$data=array('login'=>TRUE, 'USER'=>$user);
					$this->session->set_userdata($data);	
			 		
					redirect("Admin/");
					$this->session->set_flashdata('message', 'Selamat !');	
				}else{
					 
					 $this->session->set_flashdata('message', 'Data Login Salah!');
					 redirect("admisi/");
					
				}
			}else
            {
            	$this->session->set_flashdata('message', 'Login Gagal !');
               
                redirect("admisi/");
            }           
		
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('admisi','refresh');
	}


}
?>