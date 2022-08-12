<?php
namespace app\models\dao;

use app\core\Model;

class ChamadoDao extends Model{  
    public function lista($data1,$data2){
        $sql = "SELECT *, sum(somatoria) as so 
            FROM posvenda_chamado AS p
            INNER JOIN cliente AS c
            ON p.id_cliente        = c.id_cliente
            INNER JOIN produto_marca AS m
            ON p.id_marca        = m.id_marca
            INNER JOIN posvenda_incidente AS i
            ON p.id_incidente    = i.id_incidente
            INNER JOIN posvendas_status_atendimento AS s
            ON p.id_status_atendimento    = s.id_status_atendimento
            INNER JOIN usuario AS u
            ON p.id_usuario    = u.id_usuario
            WHERE
            (data_abertura BETWEEN '$data1' AND '$data2 23:59:59')
            GROUP BY p.id_chamado
            ORDER BY p.id_prioridade ASC, p.data_abertura DESC";
        
        return $this->select($this->db, $sql); 
    }
    
    public function listaTotal(){
        $sql = "SELECT *, sum(somatoria) as so FROM posvenda_chamado p, cliente c, posvendas_status_atendimento st, usuario u, posvenda_incidente i WHERE
            c.id_cliente                = p.id_cliente AND
            st.id_status_atendimento    = p.id_status_atendimento AND
            p.id_usuario                = u.id_usuario
            GROUP BY p.id_chamado
            ORDER BY p.data_abertura DESC";
        return $this->select($this->db, $sql);
    }
    
    public function listaTotalData($data1,$data2){
        $sql = "SELECT *, sum(somatoria) as so FROM posvenda_chamado WHERE
            (data_abertura BETWEEN '$data1' AND '$data2 23:59:59')
            GROUP BY somatoria
            ORDER BY data_abertura DESC";
        return $this->select($this->db, $sql);
    }
    
    public function listaclientes(){
        $sql = "SELECT * FROM cliente
            GROUP BY nome
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listachamados(){
        $sql = "SELECT * FROM posvenda_chamado p, cliente c, posvendas_status_atendimento st, usuario u, posvenda_incidente i WHERE
            c.id_cliente                = p.id_cliente AND
            st.id_status_atendimento    = p.id_status_atendimento AND
            p.id_usuario                = u.id_usuario
            GROUP BY p.id_chamado
            ORDER BY p.data_abertura DESC LIMIT 6";
        return $this->select($this->db, $sql);
    }
    
        public function listaAbertos(){
            $sql = "SELECT * FROM posvenda_chamado p, cliente c, posvendas_status_atendimento st, usuario u, posvenda_incidente i WHERE
            c.id_cliente = p.id_cliente AND
            st.id_status_atendimento = p.id_status_atendimento AND
            i.id_incidente = p.id_incidente AND
            p.id_usuario = u.id_usuario AND p.id_status_atendimento != 6
            GROUP BY p.id_chamado
            ORDER BY p.data_abertura ASC LIMIT 5";
            return $this->select($this->db, $sql);
        }
        
        public function listaFechados(){
            $sql = "SELECT * FROM posvenda_chamado p, cliente c, posvendas_status_atendimento st, usuario u, posvenda_incidente i, posvenda_fechamento_chamado f WHERE
            c.id_cliente = p.id_cliente AND
            st.id_status_atendimento = p.id_status_atendimento AND
            i.id_incidente = p.id_incidente AND
            p.id_status_atendimento = 6
            GROUP BY p.id_chamado
            ORDER BY p.id_chamado DESC LIMIT 4";
            return $this->select($this->db, $sql);
        }
    
    public function listast(){
            $sql = "SELECT *, count(pl.somatoria) as so FROM posvenda_chamado pl, posvendas_status_atendimento st
            WHERE
            pl.id_status_atendimento    = st.id_status_atendimento
            GROUP BY pl.id_status_atendimento
            ORDER BY pl.id_status_atendimento ASC";
        return $this->select($this->db, $sql);
    }
    
    public function somas(){
        $sql = "SELECT *,Count(id_status_atendimento) as T, Count(id_status_atendimento = '1') as I FROM posvenda_chamado"; 
        $sql = $stmt->query($sql);
        return $this->select($this->db, $sql);
    }
    
    
    public function listaitens($id){
        $sql = "SELECT * FROM posvenda_chamado_item i, usuario u, posvendas_status_atendimento s, posvenda_incidente p WHERE 
            i.id_status_atendimento = s.id_status_atendimento AND
            i.id_usuario = u.id_usuario AND
            i.id_incidente = p.id_incidente AND
            i.id_chamado = '$id' ORDER BY i.id_item DESC
           ";
        return $this->select($this->db, $sql);
        
    }
    
    public function listaanexo($id){
        $sql = "SELECT * FROM images_info i WHERE
            i.id_chamado = '$id' ORDER BY image_id DESC
           ";
        
        return $this->select($this->db, $sql);
        $resultado = count($sql);
    }
    
    public function filtro($filtro,$data1,$data2){
        $sql = "SELECT * FROM posvenda_chamado p, cliente c, posvendas_status_atendimento st, usuario u WHERE
            c.id_cliente = p.id_cliente AND
            st.id_status_atendimento = p.id_status_atendimento AND
            p.id_usuario = u.id_usuario ";
        if($filtro->id_status_atendimento){
            $sql .= "AND p.id_status_atendimento LIKE '$filtro->id_status_atendimento' AND (data_abertura BETWEEN '$data1' AND '$data2 23:59:59') ORDER BY p.id_prioridade ASC, p.data_abertura DESC";
        }
        
        if($filtro->id_produto){
            $sql .= "AND m.id_produto = '$filtro->id_produto' ORDER BY p.id_prioridade ASC, p.data_abertura DESC";
        }

        return $this->select($this->db, $sql);
    }
    

}


