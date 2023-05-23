<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function __construct() {
        parent::__construct();
            // Your own constructor code
        $this->load->helper('cookie');
		if(!$this->customermodel->check_token(get_cookie('token'), get_cookie('kode'))) {
			redirect('');
		}
    }

	public function index() {
		$data = array();
        $data['js'] = "";

        if($this->input->post('btnsubmitprofile')) {
            $dataupdate = array(
                'nama_depan'    => $this->input->post('nama_depan'),
                'nama_belakang'    => $this->input->post('nama_belakang'),
                'alamat_customer'    => $this->input->post('alamat_customer'),
                'kota_customer'    => $this->input->post('kota_customer'),
                'no_hp'    => $this->input->post('no_hp')
            );

            $this->customermodel->update_data(get_cookie('kode'), $dataupdate);
            $this->session->set_flashdata('notif', 'success');
            $this->session->set_flashdata('notif_msg', 'Your profile has been updated successfully.');
            redirect('profile');
        }
		
		$data['judul'] = 'My Profile';
		$data['profile'] = $this->customermodel->get_data(array('kode_customer' => get_cookie('kode')));
		$data['kota'] = $this->customermodel->getKota();
        $data['unreadvoucher'] = $this->eventmodel->getUnreadVoucher(get_cookie('kode'));

        if($this->session->flashdata('notif')) {
            $data['js'] .= "
            var toastID = document.getElementById('notification-6');
            toastID = new bootstrap.Toast(toastID);
            toastID.show(); 
            ";
        }

		$data['js'] .= "$('#btnscan').on('click', function() {
                console.log('read');
               
                console.log('show');
                const html5QrCode = new Html5Qrcode(\"reader\");
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    //alert(decodedText);
                    var cek = decodedText.substring(0, 35);
                    if(cek == 'https://event.willowapps.net/tenant') {
                        $('.pe-3').show();
                        $('#reader').hide();
                        $('.menu-title').show();
                        html5QrCode.stop().then((ignore) => {
                          // QR Code scanning is stopped.
                        }).catch((err) => {
                          // Stop failed, handle it.
                        });
                        window.location.href = decodedText;
                    } else {
                        var toastID = document.getElementById('notification-6');    
                        toastID = new bootstrap.Toast(toastID);
                        toastID.show();  
                    }
                };
                const config = { fps: 10, qrbox: { width: 250, height: 250 } };

                html5QrCode.start({ facingMode: { exact: \"environment\"} }, config, qrCodeSuccessCallback);
            });  ";

		$this->load->view('v_header', $data);
		$this->load->view('v_profile', $data);
		$this->load->view('v_footer', $data);
	}

    public function changepassword() {
        $data = array();
        $data['js'] = "";
        $data['unreadvoucher'] = $this->eventmodel->getUnreadVoucher(get_cookie('kode'));

        if($this->input->post('btnsubmitchangepassword')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldpassword', 'Current Password', 'required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
            $this->form_validation->set_rules('repeatpassword', 'Repeat Password', 'required|matches[newpassword]');
            $this->form_validation->set_error_delimiters('- ','</br>');

            if ($this->form_validation->run() == FALSE) {                
                $this->session->set_flashdata('notif', 'failed');
                $this->session->set_flashdata('notif_msg', validation_errors());
            } else {
                if($this->customermodel->check_token(get_cookie('token'), get_cookie('kode'))) {
                    $this->customermodel->change_pass(
                        get_cookie('kode'), 
                        $this->input->post('oldpassword'), 
                        $this->input->post('repeatpassword'));

                    $this->session->set_flashdata('notif', 'success');
                    $this->session->set_flashdata('notif_msg', 'Your password has been changed.');
                    
                   /*      $dataupdate = array(
                'nama_depan'    => $this->input->post('nama_depan'),
                'nama_belakang'    => $this->input->post('nama_belakang'),
                'alamat_customer'    => $this->input->post('alamat_customer'),
                'kota_customer'    => $this->input->post('kota_customer'),
                'no_hp'    => $this->input->post('no_hp')
            );

            $this->customermodel->update_data(get_cookie('kode'), $dataupdate); */
                        //echo json_encode(array('result' => 'true', 'message'=> 'success'));
                } else {
                    $this->session->set_flashdata('notif', 'failed');
                    $this->session->set_flashdata('notif_msg', 'The current password is incorrect. Please try again.');
                }
            }
           
            redirect('profile/changepassword');
        }
        
        $data['judul'] = 'Change Password';

        if($this->session->flashdata('notif')) {
            $data['js'] .= "
            var toastID = document.getElementById('notification-6');
            toastID = new bootstrap.Toast(toastID);
            toastID.show(); 
            ";
        }

        $data['js'] .= "$('#btnscan').on('click', function() {
                console.log('read');
               
                console.log('show');
                const html5QrCode = new Html5Qrcode(\"reader\");
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    //alert(decodedText);
                    var cek = decodedText.substring(0, 35);
                    if(cek == 'https://event.willowapps.net/tenant') {
                        $('.pe-3').show();
                        $('#reader').hide();
                        $('.menu-title').show();
                        html5QrCode.stop().then((ignore) => {
                          // QR Code scanning is stopped.
                        }).catch((err) => {
                          // Stop failed, handle it.
                        });
                        window.location.href = decodedText;
                    } else {
                        var toastID = document.getElementById('notification-6');    
                        toastID = new bootstrap.Toast(toastID);
                        toastID.show();  
                    }
                };
                const config = { fps: 10, qrbox: { width: 250, height: 250 } };

                html5QrCode.start({ facingMode: { exact: \"environment\"} }, config, qrCodeSuccessCallback);
            });  ";

        $this->load->view('v_header', $data);
        $this->load->view('v_change_password', $data);
        $this->load->view('v_footer', $data);
    }
}
