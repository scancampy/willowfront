<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends CI_Controller {

	public function index()
	{	
        redirect('dashboard');
	}

	public function search($key) {
		$data = array();
		
		$data['tenant'] = $this->eventmodel->getKodeAll(trim($key));
		if(count($data['tenant']) == 0) {
			$this->session->set_flashdata('error_qr', true);
			redirect('dashboard');
		} else {
			$data['detail'] = $this->eventmodel->getAllTenant($data['tenant'][0]->tenant_id);
			$data['events'] = $this->eventmodel->getAllEvent($data['tenant'][0]->event_id);
		}

		$data['judul'] = 'Tenant Detail';
		$data['master_path'] = $this->config->item('master_url');
		$data['events'] = $this->eventmodel->getAllEvent('', array('is_aktif' => 1));

		$data['js'] = "$('#btnscan').on('click', function() {
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
