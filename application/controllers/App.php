<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$path=$config['upload_path'] = realpath(APPPATH.'../images');
        $config['upload_path'] = realpath(APPPATH.'../images');
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '204800';
        $this->load->library('upload',$config);
		$this->load->helper(array('form', 'url','file'));
	  	$this->load->model('Project'); // load model
	}

    public function Index(){
    
		$this->load->view('app/index');	
    }
    
    public function Admin(){
    	
    	$data['title']="Admin Panel";
    	$this->load->library('session');
    	$data['username']=$this->session->userdata('username');
  		$this->load->view('app/header',$data);
		$this->load->view('app/admin');
		$this->load->view('app/footer');
    }

    public function Confirm(){
    	$username=$this->input->post('username');
    	$password=$this->input->post('password');
    	$this->Project->confirm_value($username,$password);
    }

    function Logout() {
		$this->load->library('session');
		$this->session->unset_userdata('username');
		redirect(base_url('index'));
	}


	function Insert(){
		$this->load->library('session');
    	$data['username']=$this->session->userdata('username');
		$data['title']="Insert";
		$this->load->view('app/header',$data);
		$this->load->view('app/insert');
		$this->load->view('app/footer');
	}

	public function fillgrid(){
        $this->Project->fillgrid();
    }

    public function Display(){
  		$this->load->library('session');
    	$data['username']=$this->session->userdata('username');
        $data['title']="View";
  		$this->load->view('app/header',$data);
		$this->load->view('app/display');
        $this->load->view('app/dmobile');
		$this->load->view('app/footer');
    }


    public function create(){
        $this->Project->create();
    }

    public function test(){
       
        $this->load->view('app/test');
    }

    public function delete(){
        $id =  $this->input->POST('id');
     
        $this->db->where('id', $id);
        $deleted=$this->db->delete('portfolio');
       
    }

    public function edit(){
        $id =  $this->uri->segment(3);
        $this->db->where('id',$id);
        $data['query'] = $this->db->get('portfolio');
        $data['id'] = $id;
        $this->load->view('app/edit', $data);
    }

    public function update(){
        $res['error']="";
        $res['success']="";
       
        $data = array(
            'brand'=>  $this->input->post('brand'),
            'title'=>  $this->input->post('title'),
            'description'=>  $this->input->post('description'),
            'path'=>  $this->input->post('image')

            );
        $this->db->where('id', $this->input->post('hidden'));
        $this->db->update('portfolio', $data);
        $data['success'] = 'updated';
        
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }


    public function search($re){
        
            $result = $this->Project->search($re);
            if (count($result) > 0){
                $arr_result[]=array();
                foreach ($result as $pr) {
                //$arr_result=array('value' =>$pr->brand );
                $arr_result[] = array('brand'=>$pr->brand,'title' => $pr->title, 'descriptions' => $pr->description, 'image' => $pr->path);
            }
            echo json_encode($arr_result);
            }
           /* if (count($result) > 0) {
                foreach($result as $pr){
                    $arr_result[] = array('value'=>$pr->title,'label' => $pr->brand, 'desc' => 'mpla','icon' => 'mpla');
                }
                echo json_encode($arr_result);
            }*/
            /*$data = array();
            foreach($result as $pr){
                array_push($data, array('value'=>$pr->title,'label' => $pr->brand, 'desc' => 'mpla','icon' => 'mpla'));
            }*/
           
            //echo json_encode($arr_result);
            //echo json_encode(count($this->Project->search($re)));
                
                //echo json_encode(array('value'=>$re,'label' => '$pr->brand', 'desc' => 'mpla','icon' => 'mpla'));
    }


    public function do_upload(){
        if ( ! $this->upload->do_upload()){
             $error = array('error' => $this->upload->display_errors());
                 foreach ($error as $item => $value){
                     echo'<script type="text/javascript">
                  setTimeout(function () { 
                  swal("Oops...", "Something you forgot!", "error");
                  }, 100);
                  </script>';
             }
             exit;
        }
        else{
            $upload_data = array('upload_data' => $this->upload->data());
            foreach ($upload_data as $key=> $value){
                
                $image =  $value['file_name'];
                $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $value['file_name']);
                $data = array(
                    'brand' =>  $this->input->post('brand'),
                    'title'=>  $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'path' => $image,
                    'name'=>$name,
                    'title'=>  $this->input->post('title')
                );
                $this->db->insert('portfolio', $data);
           }
                
                echo'<script type="text/javascript">
                  setTimeout(function () { 
                  swal("Good Job!","The item has been insterted!","success");
                  }, 500);
                  </script>';
                exit;           
        }     
    }


}

/* End of file app.php */
/* Location: ./app/controllers/app.php */