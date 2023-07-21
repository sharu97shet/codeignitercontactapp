<?php

	class Contactmodel extends CI_Model {

		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		

     public   function insertcontact($data)
     {
        $this->db->insert('contacts',$data);
        return true;

           
        //   if ($query->num_rows() > 0) {
        //        return true;
        //       // return $query->row('user_id');
        //   } else {
        //        return false;
        //   }
     }

     public function groupdata()
     {
        $query=$this->db->get("groups");
        return $query->result_array();
     }

     public function contactsdata()
     {
        $query=$this->db->get("contacts");
        return $query->result_array();
     }

     public  function editcontact($id)
     
      {
         $query = $this->db->query("SELECT * FROM contacts  where id=$id");
   
         return $query->result_array();
      }   
      
      public  function updatecontact($id  , $data)
     
      {
         $datas = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ];

   
      $this->db->where('id', $id);
        $this->db->update('contacts', $datas);
      }   


      public  function deletecontact($id )
      {

         $this->db->where('id', $id);
         $this->db->delete('contacts');
 
      }  




	}
	?>