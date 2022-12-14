<?php
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(['enable_remote' => true]);
$dompdf->loadHtml('
<style>
.danfe_pagina{ font-size:10px;font-family:Arial,Helvetica;margin:0px;padding:1px }
.danfe_pagina2{ margin:1px;padding:0 }
.danfe_linha_tracejada{ width:100%;border-bottom:#000 1px dashed;margin:10px 0 10px 0 }

.danfe_tabelas{ border-collapse:collapse;width:100%;margin:0;padding:0 }
.danfe_celula_bordas{ border:1px solid black; vertical-align:top }
.danfe_celula_titulo{ margin:0;font-size:7pt;padding:0 2px 0px 2px }
.danfe_celula_valor{ margin:0;font-size:8pt;padding-left:4px }

.danfe_canhoto_bordas{ font-size:7pt;border:1px solid #000;margin:0px;padding:0;margin:0 1px 0 1px;min-height:30px }
.danfe_canhoto_texto{ font-size:6pt;margin:0;font-weight:normal;padding:0 2px 1px 2px }

.danfe_cabecalho_danfe{ font-size:13px;font-weight:bold;margin:0;text-align:center }
.danfe_cabecalho_danfe_texto{ font-size:7pt;padding:0;margin:0 1px 0 1px;text-align:center }
.danfe_cabecalho_numero{ font-size:13px;font-weight:bold;margin:0;text-align:center }
.danfe_cabecalho_entrada_saida{ font-size:7pt; }
.danfe_cabecalho_entrada_saida_quadrado{ font-size:13pt;border:1px solid #000000;padding:0;margin:0;width:100px;text-align:center;float:none;min-width:30px }

.danfe_titulo_externo{ font-size:8pt;margin:4px 0 0 0;font-weight:bold }

.danfe_item{ border:1px black solid;border-top:none;border-bottom:dotted 1pt #dedede; font-size:8pt; text-align: right; }
.danfe_item_ultimo{ border:1px black solid;border-top:none;margin:0px;padding:0;font-size:1px }
.danfe_item_cabecalho{ border:1px solid #000;text-align:left;font-size:7pt }
.danfe_item_cabecalho_tabela{ border-collapse:collapse;width:100%;margin:0;padding:0;border:1px solid #000 }
</style>
<div class="danfe_pagina">
<div class="danfe_pagina2">
<table class="danfe_tabelas">
<tr>
<td>
<table class="danfe_tabelas" style="min-height:60px;">
	<tr>
		<td class="danfe_celula_bordas" colspan="2">
			<p class="danfe_canhoto_texto">RECEBEMOS DE ANDRADE &amp; SALVADEGO LTDA OS PRODUTOS CONSTANTES DA NOTA FISCAL INDICADA AO LADO</p>
		</td>
	</tr>
	<tr>
		<td class="danfe_canhoto_bordas">
			<p class="danfe_celula_titulo">Data de recebimento</p>
			<p class="danfe_celula_valor">&nbsp;</p>
		</td>
		<td class="danfe_canhoto_bordas">
			<p class="danfe_celula_titulo">Identifica&ccedil;&atilde;o e assinatura do recebedor</p>
			<p class="danfe_celula_valor">&nbsp;</p>
		</td>
	</tr>
</table>
</td>
<td>&nbsp;</td>
<td>
<table class="danfe_tabelas" style="min-height:60px">
	<tr>
		<td class="danfe_celula_bordas" align="center">
			<strong>NF-e</strong>
			<h2 class="danfe_cabecalho_numero">N&ordm; 002084</h2>
			<strong>S&eacute;rie 1</strong>
		</td>
	</tr>
</table>
</td>
</tr>
</table>
<div class="danfe_linha_tracejada"></div>
<table class="danfe_tabelas">
<tr>
	<td rowspan="3" class="danfe_celula_bordas">
    <img src="https://rentalsys.com.br/rentalmed/logo/logo.png" alt="" width="200px">
		
	</td>
	<td rowspan="3" class="danfe_celula_bordas">
		EMITENTE
	</td>
	<td rowspan="3" class="danfe_celula_bordas" align="center">
		<p class="danfe_cabecalho_danfe">DANFE</p>
		<p class="danfe_cabecalho_danfe_texto">Documento Auxiliar da <br>Nota Fiscal Eletr&ocirc;nica</p>
		<table class="danfe_tabelas">
		<tr>
			<td nowrap class="danfe_cabecalho_entrada_saida">
			0-Entrada<br>
			1-Sa&iacute;da</td>
			<td class="danfe_cabecalho_entrada_saida_quadrado">1</td>
		</tr>
		</table>
		<p class="danfe_cabecalho_numero">N&ordm; 002084</p>
		<p class="danfe_cabecalho_danfe_texto">SERIE: 1<br>P&aacute;gina: 1 de 1</p>
	</td>
	<td class="danfe_celula_bordas" align="center">
		<p class="danfe_celula_titulo">Controle do Fisco</p>
		{CODIGO DE BARRA}
	</td>
</tr>
<tr>
	<td class="danfe_celula_bordas" align="center">
	<p class="danfe_celula_titulo">Chave de acesso</p>
	<p class="danfe_celula_valor">{CHAVE DE ACESSO}</p>
	</td>
</tr>
<tr>
	<td class="danfe_celula_bordas" align="center">
	<p class="danfe_celula_titulo">Consulta de autenticidade no portal nacional da NF-e</p>
	<p class="danfe_celula_valor">
	<a href="http://www.nfe.fazenda.gov.br/portal" target="_blank">www.nfe.fazenda.gov.br/portal</a> 
	ou no site da Sefaz autorizadora</p>
	</td>
</tr>
<tr>
	<td colspan="3" class="danfe_celula_bordas">
	<p class="danfe_celula_titulo">Natureza da opera&ccedil;&atilde;o</p>
	<p class="danfe_celula_valor">{NATUREZA DE OPERACAO}</p>
	</td>
	<td class="danfe_celula_bordas" align="center">
	<p class="danfe_celula_titulo">N&uacute;mero de protocolo de autoriza&ccedil;&atilde;o de uso da NF-e</p>
	<p class="danfe_celula_valor">{NUMERO PROTOCOLO}</p>
	</td>
</tr>
</table>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Inscri&ccedil;&atilde;o Estadual</p>
		<p class="danfe_celula_valor">9060278870</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Inscr.est. do subst.trib.</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">CNPJ</p>
		<p class="danfe_celula_valor">15.831.247/0001-27</p>
	</td>
</tr>
</table>


<h3 class="danfe_titulo_externo">Destinat&aacute;rio/Remetente</h3>
<table class="danfe_tabelas">
<tr>
	<td>
		<table class="danfe_tabelas">
			<tr>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">Nome / Raz&atilde;o Social</p>
					<p class="danfe_celula_valor">{destinatario}</p>
				</td>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">CNPJ/CPF</p>
					<p class="danfe_celula_valor">{cpf/cnpj destinatario}</p>
				</td>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">Inscri&ccedil;&atilde;o Estadual</p>
					<p class="danfe_celula_valor">{ie}</p>
				</td>
			</tr>
			<tr>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">Endere&ccedil;o</p>
					<p class="danfe_celula_valor">{endere??o}</p>
				</td>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">Bairro</p>
					<p class="danfe_celula_valor">{bairro}</p>
				</td>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">CEP</p>
					<p class="danfe_celula_valor">{cep}</p>
				</td>
			</tr>
			<tr>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">Munic&iacute;pio</p>
					<p class="danfe_celula_valor">{cidade}</p>
				</td>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">Fone/Fax</p>
					<p class="danfe_celula_valor">{telefone}</p>
				</td>
				<td class="danfe_celula_bordas">
					<p class="danfe_celula_titulo">UF</p>
					<p class="danfe_celula_valor">{uf}</p>
				</td>
			</tr>
		</table>
	</td>
	<td width="10%">
		<table class="danfe_tabelas">
			<tr>
				<td class="danfe_celula_bordas">
				<p class="danfe_celula_titulo">Data emiss&atilde;o</p>
				<p class="danfe_celula_valor">22/05/2013</p>
				</td>
			</tr>
			<tr>
				<td class="danfe_celula_bordas">
				<p class="danfe_celula_titulo">Data sa&iacute;da</p>
				<p class="danfe_celula_valor">22/05/2013</p>
				</td>
			</tr>
			<tr>
				<td class="danfe_celula_bordas">
				<p class="danfe_celula_titulo">Hora sa&iacute;da</p>
				<p class="danfe_celula_valor">23:32</p>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
<h3 class="danfe_titulo_externo">Faturas</h3>
<table class="danfe_tabelas">
<tr class="danfe_item_cabecalho_tabela" align="left">
	<th class="danfe_item_cabecalho">N&uacute;mero</th>
	<th class="danfe_item_cabecalho">Vencimento</th>
	<th class="danfe_item_cabecalho" style="text-align:right;">Valor</th>
	<th class="danfe_item_cabecalho">N&uacute;mero</th>
	<th class="danfe_item_cabecalho">Vencimento</th>
	<th class="danfe_item_cabecalho" style="text-align:right;">Valor</th>
	<th class="danfe_item_cabecalho">N&uacute;mero</th>
	<th class="danfe_item_cabecalho">Vencimento</th>
	<th class="danfe_item_cabecalho" style="text-align:right;">Valor</th>
</tr>
<tr class="danfe_item">
	<td align="left">{fatura}</td>
	<td align="left">{data}</td>
	<td style="border-right:solid black 1px">{valor}</td>
	<td align="left">{fatura}</td>
	<td align="left">{data}</td>
	<td style="border-right:solid black 1px">{valor}</td>
	<td align="left">{fatura}</td>
	<td align="left">{data}</td>
	<td style="border-right:solid black 1px">{valor}</td>
</tr>
<tr>
	<td class="danfe_item_ultimo" colspan="9">&nbsp;</td>
</tr>
</table>
<h3 class="danfe_titulo_externo">C&aacute;lculo do imposto</h3>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Base de c&aacute;lculo do ICMS</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor do ICMS</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Base de c&aacute;lculo do ICMS Subst.</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor do ICMS Subst.</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor total dos produtos</p>
		<p class="danfe_celula_valor">32,99</p>
	</td>
</tr>
</table>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor do frete</p>
		<p class="danfe_celula_valor">11,21</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor do seguro</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Desconto</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Outras despesas acess&oacute;rias</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor do IPI</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor total da nota</p>
		<p class="danfe_celula_valor">44,20</p>
	</td>
</tr>
</table>
<h3 class="danfe_titulo_externo">Transportador/Volumes transportados</h3>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Nome</p>
		<p class="danfe_celula_valor">Empresa Brasileira de Correios e Tel&eacute;grafos</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Frete por conta</p>
		<p class="danfe_celula_valor">0-Emitente</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">C&oacute;digo ANTT</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Placa do ve&iacute;culo</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">UF</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">CNPJ/CPF</p>
		<p class="danfe_celula_valor">34.028.316/0020-76</p>
	</td>
</tr>
</table>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Endere&ccedil;o</p>
		<p class="danfe_celula_valor">Rua Jo&atilde;o Negr&atilde;o, n&ordm; 1251</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Munic&iacute;pio</p>
		<p class="danfe_celula_valor">Curitiba</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">UF</p>
		<p class="danfe_celula_valor">PR</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Inscri&ccedil;&atilde;o Estadual</p>
		<p class="danfe_celula_valor">ISENTO</p>
	</td>
</tr>
</table>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Quantidade</p>
		<p class="danfe_celula_valor">1</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Esp&eacute;cie</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Marca</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Numera&ccedil;&atilde;o</p>
		<p class="danfe_celula_valor">&nbsp;</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Peso bruto</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Peso l&iacute;quido</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	
</tr>
</table>
<h3 class="danfe_titulo_externo">Itens da nota fiscal</h3>
<table class="danfe_item_cabecalho_tabela">
<tr>
	<th class="danfe_item_cabecalho">C&oacute;digo</th>
	<th class="danfe_item_cabecalho">Descri&ccedil;&atilde;o do produto/servi&ccedil;o</th>
	<th class="danfe_item_cabecalho">NCM/SH</th>
	<th class="danfe_item_cabecalho">CST</th>
	<th class="danfe_item_cabecalho">CFOP</th>
	<th class="danfe_item_cabecalho">UN</th>
	<th class="danfe_item_cabecalho">Qtde</th>
	<th class="danfe_item_cabecalho">Pre&ccedil;o un</th>
	<th class="danfe_item_cabecalho">Pre&ccedil;o total</th>
	<th class="danfe_item_cabecalho">BC ICMS</th>
	<th class="danfe_item_cabecalho">Vlr.ICMS</th>
	<th class="danfe_item_cabecalho">Vlr.IPI</th>
	<th class="danfe_item_cabecalho">%ICMS</th>
	<th class="danfe_item_cabecalho">%IPI</th>
</tr>
<tr class="danfe_item">
	<td align="left">{codigo}</td>
	<td align="left">{descricao}</td>
	<td>{ncm}</td>
	<td>{cst}</td>
	<td>{cfop}</td>
	<td>{un com}</td>
	<td>{qnt}</td>
	<td>{preco un}</td>
	<td>{preco total}</td>
	<td>{bc icms}</td>
	<td>{valor icms}</td>
	<td>{valor ipi}</td>
	<td>{% icms}</td>
	<td>{% ipi}</td>
</tr>
<tr class="danfe_item">
	<td align="left">{codigo}</td>
	<td align="left">{descricao}</td>
	<td>{ncm}</td>
	<td>{cst}</td>
	<td>{cfop}</td>
	<td>{un com}</td>
	<td>{qnt}</td>
	<td>{preco un}</td>
	<td>{preco total}</td>
	<td>{bc icms}</td>
	<td>{valor icms}</td>
	<td>{valor ipi}</td>
	<td>{% icms}</td>
	<td>{% ipi}</td>
</tr>
<tr>
	<td class="danfe_item_ultimo" colspan="14">&nbsp;</td>
</tr>
</table>
<h3 class="danfe_titulo_externo">C&aacute;lculo do ISSQN</h3>
<table class="danfe_tabelas">
<tr>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Inscri&ccedil;&atilde;o Municipal</p>
		<p class="danfe_celula_valor">1953559</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor total dos servi&ccedil;os</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Base de c&aacute;lculo do ISSQN</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Valor do ISSQN</p>
		<p class="danfe_celula_valor">0,00</p>
	</td>
</tr>
</table>

<div class="danfe_titulo_externo">Dados adicionais</div>
<table class="danfe_tabelas">
<tr style="min-height:200px">
	<td class="danfe_celula_bordas" width="70%">
		<p class="danfe_celula_titulo">Observa&ccedil;&otilde;es</p>
		<p class="danfe_celula_valor">{OBSERVACOES}</p>
	</td>
	<td class="danfe_celula_bordas">
		<p class="danfe_celula_titulo">Reservado ao fisco</p>
	</td>
</tr>
</table>
</div>
</div>
');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'letter');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream(
    "Apostila.pdf",
    array("Attachment"=>false)
    );