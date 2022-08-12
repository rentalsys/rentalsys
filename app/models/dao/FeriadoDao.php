<?php
namespace app\models\dao;

use app\core\Model;

class FeriadoDao extends Model{  
    public function lista(){
        $sql = "SELECT *  FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    ORDER BY t.data_inicio DESC";
        return $this->select($this->db, $sql);
    }
    
    public function listaTotal(){
        $sql = "SELECT *  FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    ORDER BY t.data_inicio DESC LIMIT 6";
        return $this->select($this->db, $sql); 
    }
    
    public function Concluido(){
        $sql = "SELECT *  FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE 
                                    t.concluido = 's'
                                    ORDER BY t.data_inicio DESC LIMIT 6";
        return $this->select($this->db, $sql);
    }
    
    public function Concluidos(){
        $sql = "SELECT *, sum(somatoria) as so   FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE
                                    t.concluido = 's'
                                    GROUP BY t.somatoria";
        return $this->select($this->db, $sql);
    }
    
    public function Abertos(){
        $sql = "SELECT *, sum(somatoria) as so  FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE
                                    t.concluido != 's'
                                    GROUP BY t.somatoria";
        return $this->select($this->db, $sql);
    }

    public function Aconcluir(){
        $sql = "SELECT *  FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE
                                    t.concluido != 's'
                                    ORDER BY t.data_inicio DESC LIMIT 6";
        return $this->select($this->db, $sql);
    }
    
    public function Responsavel(){
        $sql = "SELECT *, sum(somatoria) as so  FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE
                                    t.id_formato = '1'
                                    GROUP BY t.id_responsavel
                                    ORDER BY so DESC";
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
    
    public function listaHorarioagenda(){
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


