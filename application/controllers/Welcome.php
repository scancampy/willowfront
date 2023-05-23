<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private function _cektoken() {
		$this->load->helper('cookie');
		if($this->customermodel->check_token(get_cookie('token'), get_cookie('kode'))) {
			redirect('dashboard');
		} 
	}

	private function _isValid() 
	{
	    try {

	        $url = 'https://www.google.com/recaptcha/api/siteverify';
	        $data = ['secret'   => '6Lev44gdAAAAAJ3Uwxp89-VVkKUiPp66i-ZYaI_3',
	                 'response' => $_POST['g-recaptcha-response'],
	                 'remoteip' => $_SERVER['REMOTE_ADDR']];
	                 
	        $options = [
	            'http' => [
	                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	                'method'  => 'POST',
	                'content' => http_build_query($data) 
	            ]
	        ];
	    
	        $context  = stream_context_create($options);
	        $result = file_get_contents($url, false, $context);
	        return json_decode($result)->success;
	    }
	    catch (Exception $e) {
	        return null;
	    }
	}	

	public function index()
	{	
		$this->load->helper('cookie');
		$this->_cektoken();

        $data = array();
       
		if($this->input->post('g-recaptcha-response')) {
			$cek = $this->_isValid();
			if($cek < 0.3) {
				$this->session->set_flashdata('login_notif', 'failed');
            	$this->session->set_flashdata('login_msg', 'You are bot. You can not login.');
				redirect('');
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_error_delimiters('- ','</br>');

			if ($this->form_validation->run() == FALSE) {
            	$this->session->set_flashdata('login_notif', 'failed');
            	$this->session->set_flashdata('login_msg', validation_errors());
            	redirect('');
            } else {
            	//$recaptcharesult = $this->input->post('g-recaptcha-response');
            	
            	$pass = trim($this->input->post('password'));
				$email = trim($this->input->post('email'));
				$res = $this->customermodel->sign_in($email, $pass);
				$result = json_decode($res);


				if($result->result == 'true') {
					// cookie
					set_cookie('token',$result->token,90*86400);
					set_cookie('kode',$result->kode_customer,90*86400);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('login_notif', 'failed');
            		$this->session->set_flashdata('login_msg', 'Incorrect email or password.');
					redirect('');
				}				
            }
		}

		if($this->input->post('btnsubmitforgotpass')) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('forgotemail', 'Email', 'valid_email|required');
			if ($this->form_validation->run() == FALSE) {
            	$this->session->set_flashdata('login_notif', 'failed');
            	$this->session->set_flashdata('login_msg', validation_errors());
            	redirect('');
            } else {
            	// cek token dulu
				$error = false;
				$cust = $this->customermodel->get_data(array('email_customer' => $this->input->post('forgotemail'))); 
				if(count($cust) > 0) {
				    
				    $pass = $this->customermodel->forgot_pass($cust[0]->kode_customer);
				    
				    if($pass == false) {
				          $error = true;
				    } else {
	    			    $this->load->library('email');
	    	    
	            	    $config['protocol'] = 'smtp';
	                    $config['smtp_host'] = 'gator4061.hostgator.com';
	                    $config['smtp_user'] = 'apps@willowbabyshop.com';
	                    $config['smtp_pass'] = 'r)tA3+@6YOT~';
	                    $config['smtp_port'] = '465';
	                    $config['smtp_crypto'] = 'ssl';
	                    
	            
	                    $this->email->initialize($config);
	            
	                    $this->email->from('apps@willowbabyshop.com', 'Willow Baby & Kids Apps');
	                    $this->email->to($this->input->post('forgotemail'));
	                    
	                    $this->email->subject('Password Have Been Changed - Willow Baby & Kids Apps');
	                    $this->email->message("Dear ".ucwords($cust[0]->nama_customer).", \r\n Please be advised that your password have been changed to ".$pass." \r\n\r\n Use this new password to login into Willow Baby & Kids Apps. You should change your password immediately after login. \r\n\r\n Regards,\r\n Willow Baby & Kids Admin.");
	            
	                    if ( ! $this->email->send())
	                    {
	                        $error = true;
	                    } 
				    }
				    
				} else {
				    $error =true;
				}
				
				if($error == true) {
					$this->session->set_flashdata('login_notif', 'failed');
            		$this->session->set_flashdata('login_msg', 'Unable to reset your password. Please try again later.');
				} else {
					$this->session->set_flashdata('login_notif', 'success');
            		$this->session->set_flashdata('login_msg', 'Your password has been changed. Please check your email to get the newly created password.');
				}
				redirect('');
            }
		}

		if($this->input->post('btnsubmitregister')) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password_register', 'Password', 'required');
			$this->form_validation->set_rules('repassword', 'Repeat Password', 'required|matches[password_register]');
			$this->form_validation->set_rules('email_customer', 'Email', 'required|valid_email|is_unique[mst_customer.email_customer]',  array('is_unique' => 'Email already exists. Please try to use the forgot password link.'));
			$this->form_validation->set_rules('nama_customer', 'Name', 'required');
			$this->form_validation->set_rules('no_hp', 'HP', 'required');
			$this->form_validation->set_error_delimiters('- ','</br>');

			if ($this->form_validation->run() == FALSE) {
            	$this->session->set_flashdata('login_notif', 'failed');
            	$this->session->set_flashdata('login_msg', validation_errors());
            	redirect('');
            } else {
            	$arrInsert = array(
            					'nama_customer' => $this->input->post('nama_customer'),
            					'no_hp' => $this->input->post('no_hp'),
            					'email_customer' => $this->input->post('email_customer'),
            					'password' => $this->input->post('password_register')
            				 );
            	if($this->customermodel->insert_customer_event($arrInsert)) {
            		$this->session->set_flashdata('login_notif', 'success');
            		$this->session->set_flashdata('login_msg', 'The account has been created successfully. Please login with your provided email and password.');
            		redirect('');
            	} else {
            		$this->session->set_flashdata('login_notif', 'failed');
            		$this->session->set_flashdata('login_msg', 'Failed to create an account. Please try again later.');
            		redirect('');
            	}
            }
		}

		$data['js'] = "
			console.log('tes');
			
		";
		$this->load->view('v_login', $data);
	}
}
