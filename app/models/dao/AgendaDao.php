<?php
namespace app\models\dao;

use app\core\Model;



class AgendaDao extends Model{  
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
    
    public function meses(){
        $sql = "SELECT *, MONTHNAME(t.data_inicio) AS MES  FROM   posvenda_treinamento AS t
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
                                    WHERE (t.id_responsavel = 5 || t.id_responsavel = 6) AND t.concluido = 's'
                                    GROUP BY MONTH(t.data_inicio)
                                    ORDER BY MONTH(t.data_inicio) ASC";
        return $this->select($this->db, $sql);
    }
    
    public function meses5(){
        $sql = "SELECT *, 
                                    SUM(IF((t.id_responsavel = 5),t.nequip,0)) AS CONCLUIDO5, 
                                    SUM(IF((t.id_responsavel = 6),t.nequip,0)) AS CONCLUIDO6,
                                    SUM(IF((t.id_responsavel = 17),t.nequip,0)) AS CONCLUIDO17 
                                    FROM   posvenda_treinamento AS t
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
                                    WHERE t.concluido = 's'
                                    GROUP BY MONTH(t.data_inicio)
                                    ORDER BY MONTH(t.data_inicio) ASC";
        return $this->select($this->db, $sql);
    }
    
    public function meses6(){
        $sql = "SELECT *,  
                                    SUM(IF((t.id_responsavel = 5),t.nequip,0)) AS CONCLUIDO5N, 
                                    SUM(IF((t.id_responsavel = 6),t.nequip,0)) AS CONCLUIDO6N,
                                    SUM(IF((t.id_responsavel = 17),t.nequip,0)) AS CONCLUIDO17N 
                                    FROM   posvenda_treinamento AS t
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
                                    (t.concluido <> 's' AND t.id_cliente <> 0 AND t.data_fim < CURDATE()) || (t.concluido <> 's' AND t.id_ocupacao = 2 AND t.data_fim < CURDATE()) 
                                    GROUP BY MONTH(t.data_inicio)
                                    ORDER BY MONTH(t.data_inicio) ASC";
        return $this->select($this->db, $sql);
    }
    
    public function meses17(){
        $sql = "SELECT *, SUM(t.nequip) AS CONCLUIDO  FROM   posvenda_treinamento AS t
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
                                    WHERE t.id_responsavel = 17 AND t.concluido = 's'
                                    GROUP BY MONTH(t.data_inicio)
                                    ORDER BY MONTH(t.data_inicio) ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaTotal(){
        $hoje = date('Y-m-d');
        $sql = "SELECT *, u.nome_usuario as resp  FROM   posvenda_treinamento AS t
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
                                    ON t.id_tipo    = tp.id_tipo AND
                                    t.feriado       = 'n' AND
                                    t.data_inicio   > '$hoje' 
                                    ORDER BY t.data_inicio ASC LIMIT 6";
        return $this->select($this->db, $sql); 
    }
    
    public function Concluidos(){
        $sql = "SELECT *, u.nome_usuario as resp  FROM   posvenda_treinamento AS t
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
                                    t.concluido = 's' AND
                                    t.feriado       = 'n' 
                                    ORDER BY t.data_inicio DESC LIMIT 6";
        return $this->select($this->db, $sql);
    }
    
    public function Eventos(){
        $hoje = date('Y-m-d');
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
                                    (t.id_responsavel = '5' || t.id_responsavel = '6') AND
                                    t.feriado       = 'n' AND
                                    t.data_inicio   < '$hoje' 
                                    GROUP BY t.somatoria";
        return $this->select($this->db, $sql);
    }
    
    public function Concluido(){
        $hoje = date('Y-m-d');
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
                                    (t.id_responsavel = '5' || t.id_responsavel = '6') AND
                                    t.concluido = 's'AND
                                    t.feriado       = 'n' 
                                    AND
                                    t.data_inicio   < '$hoje' 
                                    GROUP BY t.somatoria";
        return $this->select($this->db, $sql);
    }
    
    public function Abertos(){
        $hoje = date('Y-m-d');
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
                                     (t.id_responsavel = '5' || t.id_responsavel = '6') AND
                                    t.concluido != 's'AND
                                    t.feriado       = 'n' 
                                    AND
                                    t.data_inicio  < '$hoje' 
                                    GROUP BY t.somatoria";
        return $this->select($this->db, $sql);
    }

    public function Aconcluir(){
        $sql = "SELECT *, u.nome_usuario as resp  FROM   posvenda_treinamento AS t
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
                                    t.feriado       = 'n' AND
                                    t.concluido != 's'
                                    ORDER BY t.data_inicio ASC LIMIT 6";
        return $this->select($this->db, $sql);
    }
    
    public function Responsavel(){
        $sql = "SELECT *, sum(somatoria) as so, u.nome_usuario as resp  FROM   posvenda_treinamento AS t
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
                                    t.id_formato = '1' AND t.feriado       = 'n' 
                                    GROUP BY t.id_responsavel
                                    ORDER BY so DESC";
        return $this->select($this->db, $sql);
    }
    
    public function ResponsavelSemana(){
        $firstday = date('Y-m-d', strtotime("this week"));
        $lastday = date('Y-m-d', strtotime('+6 days', strtotime($firstday)));
        
        $sql = "SELECT *, (TIMESTAMPDIFF(MINUTE, data_inicio, data_fim)/30) as so, u.nome_usuario as resp  FROM   posvenda_treinamento AS t
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
                                    t.id_formato = '1' AND t.feriado       = 'n' AND
                                    (data_inicio BETWEEN '$firstday' AND '$lastday')
                                    GROUP BY t.id_treinamento
                                    ORDER BY t.data_inicio ASC";
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


