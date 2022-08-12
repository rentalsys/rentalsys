<?php
namespace app\models\dao;

use app\core\Model;

class PerfilUsuarioDao extends Model{
    public function listaPorPerfil($id_perfil){
        $sql = "SELECT * FROM perfil_usuario pp, perfil p, usuario m WHERE
                    pp.id_perfil    = p.id_perfil and
                    pp.id_usuario = m.id_usuario and pp.id_perfil = $id_perfil ";
        return $this->select($this->db, $sql);
    }
    
    public function listaPerfilPorUsuario($id_usuario){
        $sql = "SELECT p.* FROM perfil_usuario pp, perfil p, usuario m WHERE
                    pp.id_perfil    = p.id_perfil and
                    pp.id_usuario = m.id_usuario and pp.id_usuario = $id_usuario
                ";
        return $this->select($this->db, $sql);
    }
   
}

