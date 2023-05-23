<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	public function __construct() {
        parent::__construct();
            // Your own constructor code
        $this->load->helper('cookie');
        if(!$this->customermodel->check_token(get_cookie('token'), get_cookie('kode'))) {
            redirect('');
        }
    }

    public function detail($kode)
    {
        $data = array();
        $data['judul'] = 'Voucher Detail';
        $data['master_path'] = $this->config->item('master_url');
        $data['voucher'] = $this->eventmodel->getMyVoucherDetail($kode, get_cookie('kode'));


        if(count($data['voucher']) ==0) {
            redirect('dashboard');
        }

        $this->eventmodel->updateIsRead($kode);

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

        // slide to trade
        $data['js'] .= "
        $('div#slider1').slideToUnlock({
            allowToLock: false,
            lockText: 'Slide to Trade',
            unlockText: 'Voucher Traded',
            unlockfn: function() { $.post('".base_url('voucher/trade')."', { kode:'".$data['voucher'][0]->code."' }, function(data) {
                           console.log(data);
                        }); 
                    }
            });
        ";

        $this->load->view('v_header', $data);
        $this->load->view('v_voucher_detail', $data);
        $this->load->view('v_footer', $data);
    }

    public function trade() {
        $kode = $this->input->post('kode');
        $this->eventmodel->tradeVoucher($kode);
    }
    
    public function index()
	{	
        $data = array();
		
		

		$data['judul'] = 'My Voucher';
		$data['master_path'] = $this->config->item('master_url');
		$data['events'] = $this->eventmodel->getAllEvent('', array('is_aktif' => 1));
        $data['unreadvoucher'] = $this->eventmodel->getUnreadVoucher(get_cookie('kode'));
        $data['voucher'] = $this->eventmodel->getMyVoucher(get_cookie('kode'));

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
		$this->load->view('v_voucher', $data);
		$this->load->view('v_footer', $data);
	}
}
