<?php
namespace app\models\dao;

use app\core\Model;

class InstrutorDao extends Model{  
    public function lista(){
        $sql = "SELECT * FROM posvenda_treinamento p, cliente c, usuario u, 
            posvenda_treinamento_formato f, posvenda_treinamento_horario h, produto pr, posvenda_treinamento_uso us, posvenda_treinamento_sala s WHERE
            c.id_cliente = p.id_cliente AND
            u.id_usuario = p.id_usuario AND
            h.id_horario = p.id_horario AND
            pr.id_produto = p.id_produto AND
            us.id_uso = p.id_uso AND
            f.id_formato = p.id_formato
            ORDER BY p.data_evento ASC";
        return $this->select($this->db, $sql); 
    }
    
    public function listaclientes(){
        $sql = "SELECT * FROM cliente
            GROUP BY nome
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaHorario(){
        $sql = "SELECT * FROM posvenda_treinamento t, cliente c, posvenda_treinamento_horario h,  usuario u, posvenda_treinamento_formato f
            WHERE
            t.id_cliente = c.id_cliente AND
            t.id_usuario = u.id_usuario AND
            t.id_horario = h.id_horario 
            GROUP BY t.data_evento
            ORDER BY t.data_evento ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaHorariotreinamento(){
        $sql = "SELECT * FROM posvenda_treinamento_horario h
            ORDER BY h.id_horario ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listainstrutor(){
        $sql = "SELECT * FROM usuario
            WHERE
            instrutor = 's'
            ORDER BY RAND()";
        return $this->select($this->db, $sql);
    }
    
    
    
}


