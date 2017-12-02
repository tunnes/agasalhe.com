<?php
class Image_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function set_image($IMG_FILE, $ALT, $REF)
    {
		$imageName = time().'.jpg';
		if (move_uploaded_file($IMG_FILE['tmp_name'], $imageName)) {
			$data = array
            (
                'file' => file_get_contents($imageName),
                'alt' => $ALT,
                'item_id' => $REF
            );
			unlink($imageName);
            return $this->db->insert('images', $data);

		}
		else{
			echo false;
		}

    }
    
    public function set_profile($IMG_FILE, $UID)
    {
		$imageName = time().'.jpg';
		if (move_uploaded_file($IMG_FILE['tmp_name'], $imageName)){
            $file = file_get_contents($imageName);
			unlink($imageName);
			$this->db->set('profile_image', $file);
			$this->db->where('id', $UID);
            return $this->db->update('users');
		}
		else{
			echo false;
		}

    }

    public function get_image($ID)
    {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('id', $ID);
        $image = $this->db->get()->row()->file;
        return $image;
    }
    
    public function get_by_item($ID)
    {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('item_id', $ID);
        $image = $this->db->get()->row();
        return $image != NULL ? $image->file : $this->get_default();
    }
    
    private function get_default(){
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('item_id', '0');
        $image = $this->db->get()->row();
        return $image->file;
    }
    
    public function get_profile($ID)
    {
        $this->db->select('profile_image');
        $this->db->from('users');
        $this->db->where('id', $ID);
        $image = $this->db->get()->row()->profile_image;
        return empty($image) ? file_get_contents('./application/assets/img/not_profile_picture.png') : $image;
    }
    
    public function get_references($REF)
    {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('item_id', $REF);
        $references = $this->db->get()->result_array();
        return $references;
    }
}
?>