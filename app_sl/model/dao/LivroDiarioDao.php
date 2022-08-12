<?php
namespace app\models\dao;

use app\core\Model;

class LivroDiarioDao extends Model{
    public function lista(){
       $sql ="SELECT l.*, d.conta as debito, c.conta as credito 
              FROM 
                livro_diario l, contabil_conta d, contabil_conta c 
              WHERE
                l.id_conta_debito = d.id_conta AND
                l.id_conta_credito = c.id_conta
            ";   
        
       return $this->select($this->db, $sql);
    }
    
    public function getLancamento($id_livro_diario){
       $sql ="SELECT * FROM livro_diario WHERE id_livro_diario = $id_livro_diario ";       
       return $this->select($this->db, $sql, false);
    }
    
    public function somarLancamentos(){
        $data1 ="2020-01-01";
        $data2 ="2021-10-31";
        $sql = "
                SELECT
                    r.conta as id_conta,
                    c.id_pai,
                    c.codigo AS codigo_da_conta,
                    c.conta AS nome_da_conta,
                    
                    r.saldo_anterior,
                    r.natSaldo,
                    r.total_debito,
                    r.total_credito,
                    abs(r.saldo_atual) saldo_atual,
                    IF(r.saldo_atual < 0, 'D', 'C') nat
                FROM
                
                (SELECT
                            conta,
                            abs(saldo_Anterior) saldo_anterior,
                            IF(saldo_Anterior < 0, 'D', 'C') natsaldo,
                            total_debito,
                            total_credito,
                            (saldo_Anterior - total_debito + total_credito) saldo_atual
                    	FROM
                    	
                    	(SELECT
                                conta,
                    			SUM(IF(data < '$data1', valor * IF(tipo = 'D', -1, 1), 0)) saldo_Anterior,
                                SUM(IF(tipo = 'D', valor, 0)) total_debito,
                                SUM(IF(tipo = 'C', valor, 0)) total_credito
                            FROM
                            
                    			(    SELECT
                    					data, 'D' tipo, id_conta_debito conta, valor
                    				FROM
                    					livro_diario
                    				WHERE
                    					data <= '$data2'
                    					AND NOT id_conta_debito IS NULL
                    				UNION ALL
                    				
                    				SELECT
                    					data, 'C' tipo, id_conta_credito contabil_conta, valor
                    				FROM
                    					livro_diario
                    				WHERE
                    					data <= '$data2'
                    					AND NOT id_conta_credito IS NULL
                    			) tab
                    	GROUP BY  conta ) resultado
                    	) r
            INNER JOIN
                contabil_conta c ON c.id_conta  = r.conta   ";
        return $this->select($this->db, $sql);
    }
    
}

