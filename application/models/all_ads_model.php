<?php
class all_ads_model extends CI_Model{

	public function get_all_all_ads(){
		
		$this->db->select('*');
		$this->db->from('all_ads');
		$this->db->join('cities', 'cities.city_id = all_ads.city_id');
		$this->db->join('types', 'types.type_id = all_ads.type_id');
		
		$this->db->where('all_ads.date_deleted =', NULL);
		
		$query = $this->db->get();

		return $result = $query->result_array();
		}

	public function add_all_ads()
	{	
		$all_ads = array(
			'description' =>$this->input->post('description'),
			'price' => $this->input->post('price'),
			'city_id' => $this->input->post('city'),
			'type_id' => $this->input->post('type')
			);

		return $this->db->insert('all_ads', $all_ads);
	}

//update query
  public function get_all_ads($id){
		$this->db->select('*');
		$this->db->from('all_ads');
		$this->db->where('all_ads_id', $id);
		$q = $this->db->get();
		return $result = $q->row();
	}

	public function update_all_ads($id){

		$all_ads = array(
			'description' =>$this->input->post('description'),
			'price' => $this->input->post('price'),
			'city_id' => $this->input->post('city'),
			'type_id' => $this->input->post('type')
			);
		
		$this->db->where('id_all_ads', $id);
		$this->db->update('all_ads', $all_ads);
	}

	//delete
	
	public function get_delete_all_ads($id){

		$this->db->select('description');
		$this->db->from('all_ads');
		//$this->db->where('message_id', $id);
		$q = $this->db->get();
		return $result = $q->result();
	}

	public function delete_all_ads($id){ 
		$date = date('Y-m-d');
		$date_del = array(
			'date_deleted' => $date
			);
		$this->db->where('id_all_ads', $id);

		$this->db->update('all_ads', $date_del);
	}

	
}