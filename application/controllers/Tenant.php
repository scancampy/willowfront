<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends CI_Controller {

	public function __construct() {
        parent::__construct();
            // Your own constructor code
        $this->load->helper('cookie');
		if(!$this->customermodel->check_token(get_cookie('token'), get_cookie('kode'))) {
			redirect('');
		}
    }
    
	public function index()
	{	
        redirect('dashboard');
	}

	public function search($key) {
		$data = array();
		$data['js'] ='';
		
		$data['tenant'] = $this->eventmodel->getKodeAll(trim($key));
		if(count($data['tenant']) == 0) {
			$this->session->set_flashdata('error_qr', true);
			redirect('dashboard');
		} else {
			$data['detail'] = $this->eventmodel->getAllTenant($data['tenant'][0]->tenant_id);
			$data['events'] = $this->eventmodel->getAllEvent($data['tenant'][0]->event_id);
		}

		if($this->input->post('btncollect')) {
			if($this->eventmodel->collectVoucher($data['tenant'][0]->event_id, get_cookie('kode'), $data['tenant'][0]->tenant_id)) {
				$this->session->set_flashdata('notif', 'success');
            	$this->session->set_flashdata('notif_msg', 'The voucher has been successfully collected.');
            	
			} else {
				$this->session->set_flashdata('notif', 'failed');
            	$this->session->set_flashdata('notif_msg', 'Sorry, you have not been able to get a voucher at this time. Try again on another tenant.');
			}
			redirect('tenant/'.$key);
		}

		$data['judul'] = 'Tenant Detail';
		$data['master_path'] = $this->config->item('master_url');
		$data['events'] = $this->eventmodel->getAllEvent('', array('is_aktif' => 1));

		// cek voucher eligibility
		$data['eligible'] = $this->eventmodel->checkVoucherEligibility($data['tenant'][0]->event_id, $data['tenant'][0]->tenant_id, get_cookie('kode'));

		if($this->session->flashdata('notif')) {
            $data['js'] .= "
            var toastID = document.getElementById('notification-6');
            toastID = new bootstrap.Toast(toastID);
            toastID.show(); 
            ";
        }

        $data['unreadvoucher'] = $this->eventmodel->getUnreadVoucher(get_cookie('kode'));

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
		$this->load->view('v_tenant', $data);
		$this->load->view('v_footer', $data);
	}
}
