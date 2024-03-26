<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Krs_model extends Model
{
    protected $table = 'krs';
     
    public function getKrs($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_krs' => $id]);
        }   
    }

    public function saveKrs($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editKrs($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_krs', $id);
        return $builder->update($data);
    }


    public function hapusKrs($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_krs' => $id]);
    }
 
}