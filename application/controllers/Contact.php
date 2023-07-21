<?php

class Contact extends CI_Controller
{	

     function index()
	{
        $this->load->database();

		$this->load->model('Contactmodel');

		$data['groupresult']=$this->Contactmodel->groupdata() ;

		$data['contactresult']=$this->Contactmodel->contactsdata() ;

		foreach($data['groupresult'] as $group )
		{
			$data['groups'][]=array(
				'id'=>$group['id'],
				'groupname'=>$group['GroupName']

			);
		}

		foreach($data['contactresult'] as $group )
		{
			$data['contacts'][]=array(
				'id'=>$group['id'],
				'name'=>$group['name'],
				'email'=>$group['email'],
				'phone'=>$group['phone'],
				'group_id'=>$group['group_id'],

			);
		}

		//print_r($data['contactresult']);

		//die;
       $this->load->view('Contactform'  ,$data);
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('Contactmodel');

	}
    
	public function Contact_validation()
	{
		
		$this->load->library('form_validation');

		$this->load->library('session');

		$this->load->helper('url');

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('phoneno', 'PhoneNumber', 'required|numeric|max_length[10]');

		$this->form_validation->set_rules('groups', 'Group', 'required');


	        if ($this->form_validation->run()==true) {
  
			//true
			$data['name'] = ($this->input->post('name'));
			$data['email'] = $this->input->post('email');

			
			$data['phone'] = $this->input->post('phoneno');

			$data['group_id'] = ($this->input->post('groups'));

            //model function
			$this->load->model('Contactmodel');

			$response=$this->Contactmodel->insertcontact($data) ;

			if($response==true){
				//echo "Records Saved Successfully";

				$this->session->set_flashdata('success', 'Successfully Contact Created  ' . $data['name']);
				redirect(base_url() . 'Contact/index');
		      }

			else{
					echo "Insert error !";
			}

	} 
	else {

				redirect(base_url() . 'Contact/index');
			}
		} 
	

     public function edit($id)
	 {

		$this->load->model('Contactmodel'); 

		$data['Conactdetails']=$this->Contactmodel->editcontact($id);

       // print($id);

		   foreach ($data['Conactdetails'] as $user) {

            $data['contactdetailsdata'][] = array(
                    'id' => $user['id'],
                    'name' => $user['name'],
                     'email' => $user['email'],
                    'phone' => $user['phone'],
                  
                    'group_id' => $user['group_id'],

                  );
            }

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {


				$data['name'] = $this->input->post('name');
				
				$data['email'] = $this->input->post('email');

				
				$data['phone'] = $this->input->post('phone');


				$response=$this->Contactmodel->updatecontact($id , $data);

				redirect(base_url('Contact/index'));

			

			}


		$this->load->view('editcontact', $data);

           

	 }


	 public function delete($id)
	 {

		$this->load->model('Contactmodel'); 

		$data['Conactdetails']=$this->Contactmodel->deletecontact($id);

		$this->session->set_flashdata('Delete', 'Successfully Contact Deleted  ' );

		redirect(base_url('Contact/index'));

     }




	}





?>