<?php

class UangKeluar_model extends CI_Model
{
    public function getUangKeluar($id = null)
    {
        if($id === null){
            return $this->db->get('uangkeluar')->result_array();
        }else{
            return $this->db->get_where('uangkeluar', ['id' => $id])->result_array();
        }
        
    }
    public function deleteUangKeluar($id)
    {
        $this->db->delete('uangkeluar', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createUangKeluar($data)
    {
        $this->db->insert('uangkeluar', $data);
        return $this->db->affected_rows();
    }
    
    public function updateUangKeluar($data, $id)
    {
        $this->db->update('uangkeluar', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}