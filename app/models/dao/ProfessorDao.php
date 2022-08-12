<?php
namespace app\models\dao;

use app\core\Model;

class ProfessorDao extends Model{  
    public function lista(){
        $sql = "SELECT * FROM posvenda_treinamento p, cliente c, usuario u, 
            posvenda_treinamento_formato f, posvenda_treinamento_horario h, produto pr, posvenda_treinamento_uso us WHERE
            c.id_cliente = p.id_cliente AND
            u.id_usuario = p.id_usuario AND
            h.id_horario = p.id_horario AND
            pr.id_produto = p.id_produto AND
            us.id_uso = p.id_uso AND
            f.id_formato = p.id_formato
            ORDER BY p.data_inicio ASC";
        return $this->select($this->db, $sql); 
    }
    
    public function listapordata($data1,$data2){
        $sql = "SELECT data_ing
                FROM diasuteis WHERE
                (data_ing BETWEEN '$data1' AND '$data2 23:59:59')
                ORDER BY data_ing ASC";
        return $this->select($this->db, $sql);
    }

    public function filtro($data1,$data2){
        $sql = "SELECT du.data_ing, tre.data_inicio, tre.id_professor
                FROM diasuteis du
                INNER JOIN posvenda_treinamento AS tre ON tre.data_inicio = du.data_ing
                WHERE
                (du.data_ing BETWEEN '$data1' AND '$data2 23:59:59')
                ORDER BY du.data_ing ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaclientes(){
        $sql = "SELECT * FROM cliente
            GROUP BY nome
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaiproduto(){
        $sql = "SELECT * FROM produto
            GROUP BY produto
            ORDER BY produto ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaHorario(){
        $sql = "SELECT * FROM posvenda_treinamento t, cliente c, posvenda_treinamento_horario h,  usuario u, posvenda_treinamento_formato f
            WHERE
            t.id_cliente = c.id_cliente AND
            t.id_usuario = u.id_usuario AND
            t.id_horario = h.id_horario 
            GROUP BY t.data_inicio
            ORDER BY t.data_inicio ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaHorarioprofessor(){
        $sql = "SELECT * FROM posvenda_treinamento_horario h
            ORDER BY h.id_horario ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listainstrutor(){
        $sql = "SELECT * FROM usuario
            WHERE
            usuario_sala = 's'
            ORDER BY RAND()";
        return $this->select($this->db, $sql);
    }
    
    
    
}


