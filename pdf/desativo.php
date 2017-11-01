<?php	

	include_once("../include/banco.php");
	$html = '<table border=2';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID:</th>';
	$html .= '<th>Nome:</th>';
	$html .= '<th>Email:</th>';
	$html .= '<th>Setor:</th>';
    $html .= '<th>Data do cadastro:</th>';
	$html .= '<th>Status:</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT * FROM usuario where dados_status = 'desativado'";
	$resultado_trasacoes = mysqli_query($con, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['idusuario'] . "</td>";
		$html .= '<td>'.$row_transacoes['nome'] . "</td>";
		$html .= '<td>'.$row_transacoes['email'] . "</td>";
		$html .= '<td>'.$row_transacoes['setor'] . "</td>";
        $html .= '<td>'.$row_transacoes['datacadastro'] . "</td>";
		$html .= '<td>'.$row_transacoes['dados_status'] . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">System Help Desk - Relatório de Usuarios Ativos</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Usuarios_desativados", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>