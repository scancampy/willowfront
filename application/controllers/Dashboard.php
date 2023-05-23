<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
            // Your own constructor code
        $this->load->helper('cookie');
		if(!$this->customermodel->check_token(get_cookie('token'), get_cookie('kode'))) {
			redirect('');
		}
    }

	public function signout() {
		$this->load->helper('cookie');
		delete_cookie("token");
		delete_cookie("kode");
		redirect('');
	}

	public function index()
	{	
        $data = array();
        $data['js'] = "";
		
		$data['master_path'] = $this->config->item('master_url');
		$data['events'] = $this->eventmodel->getAllEvent('', array('is_aktif' => 1));
		$data['unreadvoucher'] = $this->eventmodel->getUnreadVoucher(get_cookie('kode'));

		if($this->session->flashdata('error_qr')) {
			$data['js'] .= "
			var toastID = document.getElementById('notification-6');    
            toastID = new bootstrap.Toast(toastID);
            toastID.show();  
			";
		}

		if($this->session->flashdata('error_event')) {
			$data['js'] .= "
			var toastID = document.getElementById('notification-7');    
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



		$data["judul"] = "Welcome";

		$this->load->view('v_header', $data);
		$this->load->view('v_dashboard', $data);
		$this->load->view('v_footer', $data);
	}
}
