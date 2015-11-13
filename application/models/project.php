<?php
	class Project extends CI_Model {
   

   //*******************//
  //     Display       //
 //     Items         //
//*******************// 
    public function fillgrid(){
      $this->db->order_by("id","desc");
      $data = $this->db->get('portfolio');
      foreach ($data->result() as $portfolio){
          $edit = base_url().'App/edit/';
          $delete = base_url().'App/delete/';
          echo "
          <tr>
            <td>
              <input type='checkbox' id='$portfolio->id'/>
              <label for='$portfolio->id'></label>
            </td>
            <td>$portfolio->id</td>
            <td>$portfolio->brand</td>
            <td>$portfolio->title</td>
            <td>$portfolio->description</td>
            <td><img class='circle responsive-img'  src='images/$portfolio->path' style='width:100px; height:100px;'></td>                    
            <td><a href='$edit' data-id='$portfolio->id' class='btnedit btn-floating btn-large waves-effect waves-light  orange accent-3' title='edit'><i class='material-icons'>loop</i></a></td>    
            <td><a href='$delete' data-id='$portfolio->id' class='btndelete btn-floating btn-large waves-effect waves-light red' title='delete'><i class='material-icons'>delete</i></a></td>    
          </tr>";
        } 
    }   

    private function edit(){}
   
    private function delete(){}



   //*******************//
  //      search       //
 //     Item          //
//*******************//  

  function search($title) {
    $this->db->select('*');
    $this->db->like('title', $title, 'both');
    return $this->db->get('portfolio')->result() ;
  }



   //*******************//
  //    Confirm        //
 //     User          //
//*******************//  

  function confirm_value($username,$password){
    $this->load->library('session');
    $this -> db -> select('*');
    $this -> db -> from('security');
    $this -> db -> where('username',$username);
    $this -> db -> where('password',$password);
    $this -> db -> limit(1);
    $query = $this -> db -> get();
    $user = $query->row();
    if($query -> num_rows() == 1){
      $this->session->set_userdata('username',$user->username);
      header('Location: http://localhost/admin/admin');
    }
    else{    
      //ECHO "fail";
     return false; 
   }
  }
}

/* End of file project.php */
/* Location: ./application/models/project.php */

