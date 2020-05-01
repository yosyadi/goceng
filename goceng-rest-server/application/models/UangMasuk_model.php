<?php

class UangMasuk_model extends CI_Model
{
    public function getUangMasuk($id = null)
    {
        if($id === null){
            return $this->db->get('uangmasuk')->result_array();
        }else{
            return $this->db->get_where('uangmasuk', ['id' => $id])->result_array();
        }
        
    }
    public function deleteUangMasuk($id)
    {
        $this->db->delete('uangmasuk', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createUangMasuk($data)
    {
        $this->db->insert('uangmasuk', $data);
        return $this->db->affected_rows();
    }
    
    public function updateUangMasuk($data, $id)
    {
        $this->db->update('uangmasuk', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}