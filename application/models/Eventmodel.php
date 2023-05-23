<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventmodel extends CI_Model {
	// EVENT
	public function doInsertEvent($data) {
		if($data['is_aktif'] == 1) {
			$this->db->update('events', array('is_aktif' => 0));
		}
		$this->db->insert('events', $data);
	}

	public function getAllEvent($id = '', $where = '', $limit = 0) {
		if($id != '') {
			$this->db->where('id', $id);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('tanggal_mulai','desc');
		$q = $this->db->get('events');

		return $q->result();
	}

	public function getKodeAll($kode, $where = '', $limit = 0) {
		if($kode != '') {
			$this->db->where('kode', $kode);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$q = $this->db->get('events_tenant');

		return $q->result();
	}

	public function doUpdateEvent($id, $data) {
		if($data['is_aktif'] == 1) {
			$this->db->update('events', array('is_aktif' => 0));
		}

		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	public function doDelEvent($id) {
		$this->db->where('id', $id);
		$this->db->update('events', array('status' => 'deleted'));
	}

	// TENANT
	public function doInsertTenant($data) {
		$this->db->insert('tenants', $data);
		return $this->db->insert_id();
	}

	public function getAllTenant($id = '', $where = '', $limit = 0) {
		if($id != '') {
			$this->db->where('id', $id);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('id','desc');
		$q = $this->db->get('tenants');


		return $q->result();
	}

	public function doUpdateTenant($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('tenants', $data);
	}

	public function doDelTenant($id) {
		$this->db->where('id', $id);
		$this->db->update('tenants', array('status' => 'deleted'));
	}

	// VOUCHER
	public function doInsertVoucher($data) {
		$this->db->insert('voucher', $data);
		return $this->db->insert_id();
	}

	public function getAllVoucher($id = '', $where = '', $limit = 0) {
		if($id != '') {
			$this->db->where('id', $id);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('id','desc');
		$q = $this->db->get('voucher');

		return $q->result();
	}

	public function doUpdateVoucher($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('voucher', $data);
	}

	public function doDelVoucher($id) {
		$this->db->where('id', $id);
		$this->db->update('voucher', array('status' => 'deleted'));
	}

	// MANAGED EVENT
	public function registerTenant($id, $event_id) {
		// cek tenant sudah ada atau belum
		$q= $this->db->get_where('events_tenant', array('tenant_id' => $id, 'event_id' => $event_id));
		

		if($q->num_rows() > 0) {
			return false;
		} else {
			// generate code
			$this->load->helper('string');
			do {
				$code = random_string('alnum', 10);
				$cek = $this->db->get_where('events_tenant', array('kode' => $code));
			} while($cek->num_rows() > 0);

			$dataInsert = array('event_id' => $event_id, 'tenant_id' => $id, 'kode' => $code);
			$this->db->insert('events_tenant', $dataInsert);
			
			return true;
		}
	}

	public function getAllEventTenant($id = '', $where = '', $limit = 0) {
		if($id != '') {
			$this->db->where('event_id', $id);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('tenants', 'tenants.id = events_tenant.tenant_id');
		$this->db->where('status', 'active');
		$this->db->order_by('id','desc');
		$this->db->select('events_tenant.*, tenants.logo, tenants.nama, tenants.promo_pdf, tenants.deskripsi');
		$q = $this->db->get('events_tenant');

		return $q->result();
	}

	public function removetenant($tenant_id, $event_id) {
		$this->db->delete('events_tenant', array('tenant_id' => $tenant_id, 'event_id' => $event_id));
	}

	// REGISTER VOUCHER
	public function registerVoucher($id, $event_id) {
		// cek voucher sudah ada atau belum
		$q= $this->db->get_where('events_voucher', array('voucher_id' => $id, 'event_id' => $event_id));
		

		if($q->num_rows() > 0) {
			return false;
		} else {			
			$dataInsert = array('event_id' => $event_id, 'voucher_id' => $id, 'qty' => 0);
			$this->db->insert('events_voucher', $dataInsert);
			
			return true;
		}
	}

	public function getAllEventVoucher($id = '', $where = '', $limit = 0) {
		if($id != '') {
			$this->db->where('event_id', $id);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('voucher', 'voucher.id = events_voucher.voucher_id');
		$this->db->where('status', 'active');
		$this->db->order_by('id','desc');
		$this->db->select('events_voucher.*, voucher.voucher_image, voucher.nama, voucher.highlight');
		$q = $this->db->get('events_voucher');

		return $q->result();
	}

	public function generateVoucher($voucher_id, $event_id, $qty) {
		$this->load->helper('string');
		for($i =0; $i < $qty; $i++) {
			// generate code			
			do {
				$code = strtoupper(random_string('alnum', 10));
				$cek = $this->db->get_where('voucher_pool', array('code' => $code));
			} while($cek->num_rows() > 0);

			$dataInsert = array('event_id' => $event_id, 'voucher_id' => $voucher_id, 'code' => $code, 'status' => 'active', 'available' => 1);
			$this->db->insert('voucher_pool', $dataInsert);
		}

		// update qty
		$q= $this->db->get_where('voucher_pool', array('event_id' => $event_id, 'voucher_id' => $voucher_id, 'status' => 'active'));
		$newqty = $q->num_rows();

		$this->db->where(array('event_id' => $event_id, 'voucher_id' => $voucher_id));
		$this->db->update('events_voucher', array('qty' => $newqty));
	}

	public function removevoucher($voucher_id, $event_id) {
		$this->db->delete('voucher_pool', array('voucher_id' => $voucher_id, 'event_id' => $event_id));
		$this->db->delete('events_voucher', array('voucher_id' => $voucher_id, 'event_id' => $event_id));
	}

	public function removevouchercode($code, $event_id) {
		$q = $this->db->get_where('voucher_pool', array('code' => $code));
		$row = $q->row();
		$voucher_id = $row->voucher_id;
		$this->db->delete('voucher_pool', array('code' => $code, 'event_id' => $event_id));

		// update qty
		$q= $this->db->get_where('voucher_pool', array('event_id' => $event_id, 'voucher_id' => $voucher_id, 'status' => 'active'));
		$newqty = $q->num_rows();

		$this->db->where(array('event_id' => $event_id, 'voucher_id' => $voucher_id));
		$this->db->update('events_voucher', array('qty' => $newqty));

		return $voucher_id;
	}

	public function getAllVoucherPool($event_id = '', $voucher_id, $where = '', $limit = 0) {
		if($event_id != '') {
			$this->db->where('event_id', $event_id);
		}

		if($voucher_id != '' && $voucher_id != 'all') {
			$this->db->where('voucher_id', $voucher_id);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}
		
		$q = $this->db->get('voucher_pool');

		return $q->result();
	}

	public function collectVoucher($event_id, $kode_customer, $tenant_id) {
		$cekeligible = $this->checkVoucherEligibility($event_id, $tenant_id, $kode_customer);
		$curdate = strftime("%Y-%m-%d", strtotime(date('Y-m-d H:i:s')) + 46800);
		$curdatelengkap = strftime("%Y-%m-%d %H:%I:%S", strtotime(date('Y-m-d H:i:s')) + 46800);

		if($cekeligible['result'] == 'true') {
			// random probailitias first
			$q = $this->db->get_where('events', array('id' => $event_id));
			$hq = $q->row();
			$prob = $hq->probabilitas;
			$a = rand(1,100);
			if($a <= $prob) {
				// take random voucher from pool only if available in available voucher_ids array
				$str = implode (", ", $cekeligible['voucher_ids']);
				$q = $this->db->query('SELECT * FROM voucher_pool WHERE event_id = '.$event_id.' AND voucher_id IN ('.$str.') AND digital_claimed_by_customer_id IS NULL ORDER BY RAND() LIMIT 1');

				if($q->num_rows() > 0) {
					$hq = $q->row();
					$this->db->where('code', $hq->code);
					$this->db->update('voucher_pool', array('digital_claimed_date' => $curdatelengkap, 'digital_claimed_by_customer_id' => $kode_customer));

					$cek = $this->db->get_where('event_customer_tenant', array('event_id' => $event_id, 'tenant_id' => $tenant_id, 'kode_customer' => $kode_customer, 'claimed_date' => $curdate));
					if($cek->num_rows() == 0) {
						$this->db->insert('event_customer_tenant', array('event_id' => $event_id, 'tenant_id' => $tenant_id, 'kode_customer' => $kode_customer, 'claimed_date' => $curdate));
					}

					return true;
				} 
			} else {

				$cek = $this->db->get_where('event_customer_tenant', array('event_id' => $event_id, 'tenant_id' => $tenant_id, 'kode_customer' => $kode_customer, 'claimed_date' => $curdate));
				if($cek->num_rows() == 0) {
					$this->db->insert('event_customer_tenant', array('event_id' => $event_id, 'tenant_id' => $tenant_id, 'kode_customer' => $kode_customer, 'claimed_date' => $curdate));
				}

				return false;
			}
		}
	}

	public function checkVoucherEligibility($event_id, $tenant_id, $kode_customer) {
		// cek if event is active
		$q = $this->db->get_where('events', array('id' => $event_id, 'is_aktif' => 1));
		if($q->num_rows() > 0) {
			// eligibile 
			// next check current date if is in the current event date
			$hq = $q->row();
			$curdate = strftime("%Y-%m-%d", strtotime(date('Y-m-d H:i:s')) + 46800);
			$r = $this->db->get_where('events', array('id' => $event_id, 'tanggal_mulai <= ' => $curdate, 'tanggal_selesai >= ' => $curdate));
			if($r->num_rows() > 0) {
				// eligible
				$cek = $this->db->get_where('event_customer_tenant', array('event_id' => $event_id, 'tenant_id' => $tenant_id, 'kode_customer' => $kode_customer, 'claimed_date' => $curdate));
				if($cek->num_rows() > 0) {
					return array('result' => 'false', 'msg' => 'claimedtoday');
				}

				// next check daily quota	
				// iterate foreach voucher on this event
				$this->db->join('voucher', 'voucher.id = events_voucher.voucher_id');
				$this->db->select('events_voucher.*, voucher.kuota_harian');
				$getmastervoucher = $this->db->get_where('events_voucher', array('event_id' => $event_id));
				$resmastervoucher = $getmastervoucher->result();

				$availablevoucher = array();
				foreach($resmastervoucher as $key => $value) {
					$cek = $this->db->get_where('voucher_pool', array('event_id' => $event_id, 'voucher_id' => $value->voucher_id, 'digital_claimed_date LIKE ' => "%".$curdate."%" ));
					if($cek->num_rows() < $value->kuota_harian) {
						$availablevoucher[] = $value->voucher_id;
					}
				}

				if(count($availablevoucher) > 0) {
					return array('result' => 'true', 'voucher_ids' => $availablevoucher);
				} else {
					return array('result' => 'false', 'msg' => 'overquota');
				}
			} else {
				// not in a event date
				return array('result' => 'false', 'msg' => 'notinevent');
			}
		} else {
			// this not active event
			return array('result' => 'false', 'msg' => 'notactive');
		}
	}

	public function getUnreadVoucher($kode_customer) {
		$q = $this->db->get_where('voucher_pool', array('digital_claimed_by_customer_id' => $kode_customer, 'is_read' => 0));
		return $q->num_rows();
	}

	public function getMyVoucher($kode_customer) {
		$this->db->join('voucher', 'voucher.id = voucher_pool.voucher_id');
		$this->db->select('voucher_pool.*, voucher.*');
		$this->db->order_by('voucher_pool.digital_claimed_date', 'desc');
		$q = $this->db->get_where('voucher_pool', array('digital_claimed_by_customer_id' => $kode_customer));
		return $q->result();
	}

	public function getMyVoucherDetail($kode, $kode_customer) {
		$this->db->join('voucher', 'voucher.id = voucher_pool.voucher_id');
		$this->db->select('voucher_pool.*, voucher.*');
		$q = $this->db->get_where('voucher_pool', array('digital_claimed_by_customer_id' => $kode_customer, 'code' => $kode));
		return $q->result();
	}

	public function tradeVoucher($kode) {
		$curdatelengkap = strftime("%Y-%m-%d %H:%I:%S", strtotime(date('Y-m-d H:i:s')) + 46800);
		$this->db->where('code', $kode);
		$this->db->update('voucher_pool', array('physical_claimed_date' => $curdatelengkap));
		return $this->db->last_query();
	}

	public function updateIsRead($kode) {
		$this->db->where('code', $kode);
		$this->db->update('voucher_pool', array('is_read' => 1));
	}
}
?>