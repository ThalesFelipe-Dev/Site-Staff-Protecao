<?php

header('Content-Type: text/html; charset=utf-8');

function fEncode($senha){
	$senha = limpaCPF_CNPJ($senha);
	$token	=	NULL;
    $chave 	=	md5('6a9106d6f1bf646');
    $senha 	= 	base64_encode($senha);
    $chave 	= 	base64_encode($chave);
    $tam 	= 	strlen($senha);
    $dtam 	= 	50 - $tam;
    
    for ( $i = 0; $i < $dtam; $i++) {$senha .= $i == 0 ? " " : rand(0, 9);}
    
    $tam = strlen($chave);
    $dtam = 50 - $tam;
    
    for ( $i = 0; $i < $dtam; $i++) {$chave .= $i == 0 ? " " : rand(0, 9);}
    for ( $i = 0; $i < 50; $i++) {$token .= substr($senha,$i, 1) . substr($chave,$i, 1);}
    
    return base64_encode($token);
}

function fSolicitarBoleto($array){
	$curl 	= 	curl_init();
	$url 	=	'https://api.hinova.com.br/api/sga/api/v1/ws_SGA.php';

	$fields = 	http_build_query($array);
	
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$retorno 	=	curl_exec($curl);
	return $retorno;
}

function fConverteData($key){
	if(strstr($key,'/')){
		return substr($key,6,4).'-'.substr($key,3,2).'-'.substr($key,0,2);
	}else if(strstr($key,'-')){
		return substr($key,8,2).'/'.substr($key,5,2).'/'.substr($key,0,4);
	}else{
		return false;
	}
}

function limpaCPF_CNPJ($valor){
	$valor = trim($valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", "", $valor);
	$valor = str_replace("-", "", $valor);
	$valor = str_replace("/", "", $valor);
	return $valor;
   }

$array 	=	array(
				"cod"	=>	"01001",
				"emp"	=>	"3613",
				"cpf"	=>	fEncode($_POST['dfnCpf']),
				"tipo"	=> 	"2",
				"total"	=> 	"10"
			);

$retorno 	=	fSolicitarBoleto($array);
$retorno 	=	json_decode($retorno);

$user_agent 	=	$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$user_agent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($user_agent,0,4))){
	// MOBILE //
	$html 	=	'<div class="row">
				<div class="col-md-12">
                    <table id="tblBoleto" class="table table-striped display" cellspacing="0" width="100%">
	                    <thead>
	                        <tr class="alert-success">
	                            <th>Dados</th>
	                            <th>Copiar</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	        ';
}else{
	$html 	=	'<div class="row">
					<div class="col-md-12">
	                    <table id="tblBoleto" class="table table-striped display" cellspacing="0" width="100%">
		                    <thead>
		                        <tr class="alert-success">
		                            <th>Nosso Número</th>
		                            <th>Data Emissão</th>
		                            <th>Data Vencimento</th>
		                            <th>Valor</th>
		                            <th>Linha Digitável</th>
		                            <th>Imprimir</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		        ';
}

if($retorno->success == 'true'){
	foreach ($retorno->msg as $key => $value) {
		// echo serialize($value);
		if(strstr($value->url, 'https')){
			$url =	'<a href="'.$value->url.'" target="_blank">
                    		<span class="glyphicon glyphicon-print" style="font-size: 20px"></span>
                    </a>
                    <br /><br />
                    <span class="glyphicon glyphicon-duplicate" style="font-size: 20px; color: green" linha="'.preg_replace('/[^a-z0-9]/i', '', $value->linha_digitavel).'"></span>';
		}else{
			$url 	=	NULL;
		}
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$user_agent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($user_agent,0,4))){
			$html 	.=	'<tr>
							<td>'.
								'<strong>N°:</strong> '.$value->nosso_numero.'<br />'.
								'<strong>Venc.:</strong> '.fConverteData($value->data_vencimento).'<br />'.
								'<strong>Valor:</strong> R$'.number_format($value->valor,2,',','.').'<br />'.
								'<strong>Linha:</strong> <span class="linha-digitavel" id="linha-'.$value->nosso_numero.'">'.$value->linha_digitavel.'</span>'.
							'</td>
		                    <td>'.$url.'</td>';
		}else{
			$html 	.=	'<tr>
							<td>'.$value->nosso_numero.'</td>
		                    <td>'.fConverteData($value->data_emissao).'</td>
		                    <td>'.fConverteData($value->data_vencimento).'</td>
		                    <td>R$ '.number_format($value->valor,2,',','.').'</td>
		                    <td>'.$value->linha_digitavel.'</td>
		                    <td>'.$url.'</td>';
		}
	}
	$html 	.=				'</tbody>
						</table>
					</div>
				</div>';
}else{
	$html 	=	'<div class="alert alert-danger" role="alert">'.$retorno->msg.'</div>';
}
echo $html.'<div class="col-md-12">
                <div class="form-group">
                    <input type="tel" class="form-control" id="linha_digitavel" name="linha_digitavel" placeholder="Linha digitável copiada" value="" autocomplete="off">
                </div>
            </div>';
?>
<script type="text/javascript">
	$('.glyphicon-duplicate').click(function(){
		$('#linha_digitavel').val($(this).attr('linha'));
		$('#linha_digitavel').select();
		document.execCommand('copy');
		alert('Linha digitável copiada!');
	});
</script>