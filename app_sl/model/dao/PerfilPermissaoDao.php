<?php
namespace app\models\dao;

use app\core\Model;

class PerfilPermissaoDao extends Model{
    public function listaPorPerfil($id_perfil){
        $sql = "SELECT * FROM perfil_permissao pp, perfil p, permissao m WHERE
                    pp.id_perfil    = p.id_perfil and
                    pp.id_permissao = m.id_permissao 
                ";
        return $this->select($this->db, $sql);
    }
    
   
   
}

