<!--Um cookie é frequentemente usado para identificar um usuário. Um cookie é um pequeno arquivo que o servidor incorpora no computador do usuário. Cada vez que o mesmo computador solicita uma página com um navegador, ele também enviará o cookie. Com o PHP, você pode criar e recuperar valores de cookies.-->
<!DOCTYPE html>

<?php 
	/*COMO CRIAR UM COOKIE?*/

	$nome_cookie = 'Usuario';
	$valor_cookie = 'Pedro';

	/*setcookie(name, value, expire, path, domain, secure, httponly); são todos os parâmetros que podem ser utilizados. Apenas o parâmetro de nome é necessário.

	name = nome do cookie;
	value = O valor do cookie. Esse valor é guardado no computador do cliente;
	expire = O tempo para o cookie expirar. É o número de segundos desde o momento aplicado. Pode usar time() ou mktime();
	path = O caminho no servidor aonde o cookie estará disponível;
	domain = O (sub)domínio para qual o cookie estará disponível;
	secure = Indica que o cookie só podera ser transimitido sob uma conexão segura HTTPS do cliente;
	httponly = Quando for true o cookie será acessível somente sob o protocolo HTTP. Isso significa que o cookie não será acessível por linguagens de script, como JavaScript. */

	setcookie($nome_cookie, $valor_cookie, time() + (86400 * 30)); /*setcookie() cria um cookie. O tempo de expiração foi colocado com a validade de  30 dias (86400 = 1 dia). O nome do cookie é o valor da variável $nome_cookie, e o valor do cookie é o valor de $valor_cookie.*/

	/*COMO EXCLUIR VALOR DE UM COOKIE?*/

	setcookie($nome_cookie, '');/*basta colocar um valor vazio na área 'value'*/

	/*COMO ALTERAR O VALOR DO COOKIE?*/

	/*Basta alterar o valor da variável responsável pelo valor do cookie, no caso, alterar a $valor_cookie*/
	$valor_cookie = 'Pedro Augusto';/*novo valor*/
	setcookie($nome_cookie, $valor_cookie);/*atribuindo valor no cookie*/
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Trabalhando com Cookies</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<style type="text/css">
	body{
		overflow-x: hidden;
	}
	.topo{
		padding: 1%;
		color: #00C851;
		border-bottom: 3px solid #00C851;
	}
	.corpo{
		height: 85vh;
	}
</style>
<body class="bg-light">
<div class="row bg-white topo">
	<div class="col-12" align="center">
		<h1><i class="fas fa-cookie-bite"></i> Trabalhando com Cookies</h1>
	</div>
</div>
<div class="col-8 offset-2 bg-white corpo" align="center">
	<br>
	<?php 

		if(!isset($_COOKIE[$nome_cookie])) { /*Verifica se o cookie com o nome da variável $nome_cookie não foi iniciado com algum valor*/
		  echo "<h4>O Cookie '" . $nome_cookie . "' não tem valor definido!</h4>"; /*Se não foi iniciado, irá aparecer apenas o nome do cookie.*/
		} 
		else {
		  echo "<h4>Cookie '" . $nome_cookie . "' está definido!</h4><br>";
		  echo "<h4>Seu valor é: " . $_COOKIE[$nome_cookie]."</h4>"; /*Se foi iniciado, irá apresentar o nome do cookie junto com seu valor.*/
		}

		if(count($_COOKIE) > 0) {/*Conta a quantidade de cookies ativados e verifica se são maiores que 0*/

		  echo "<br><h4>Número de Cookies ativos: ". count($_COOKIE)."</h4>";/*Se houver um número mairo que 0, apresenta a quantidade de Cookies ativos*/

		} 
		else {

		  echo "<br></h4>Cookies estão desabilitados.</h4>";/*Se não houver cookies ativos, irá mostrar essa mensagem*/

		}
	?>
</div>
</body>
</html>