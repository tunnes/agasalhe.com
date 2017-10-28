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
            return $this->db->insert('images', $data);
			unlink($imageName);
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
        // header( "Content-type: image/jpeg"); 
        return $image;
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