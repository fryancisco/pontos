<?php if(session_status() !== PHP_SESSION_ACTIVE){session_start();} ?>
<!DOCTYPE html>
<html lang="PT-BR" class="has-background-dark">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/bulma.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <section class="hero is-success is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4 box">
                         <div id="relogio"></div>
		
                            <br/>
                            <h3 class="title has-text-white">Sistema de Pontos</h3>
                            <h3 class="title has-text-white">Comercial Bom Preço</h3>
                            <?php
                                if(isset($_SESSION['marcado'])):
                            ?>
                            <div class="notification is-success">
                            <p>Ponto Marcado!</p>
                            </div>
                            <?php
                                endif;
                                unset($_SESSION['marcado']);
                            ?>
                            <?php
                                if(isset($_SESSION['nmarcado'])):
                            ?>
                            <div class="notification is-danger">
                            <p>Ponto Não Marcado!</p>
                            </div>
                            <?php
                                endif;
                                unset($_SESSION['nmarcado']);
                            ?>
                    <br/>
                    <form action="marcaponto.php" method="POST">
                        <div class="control">
                            <input id="notification" oninput="this.value = this.value.toUpperCase()" name="codbar" required autofocus class="input is-large" type="text" placeholder="Bipe o seu Código!"/>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            setTimeout(function(){ 
                var msg = document.getElementsByClassName("notification");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 3000);
        </script>
        
		<script>
			function obterHoraAtual() {
				const dataAtual = new Date();
				const hora = dataAtual.getHours();
				const minutos = dataAtual.getMinutes();
				const segundos = dataAtual.getSeconds();
				return {
					hora: hora,
					minutos: minutos,
					segundos: segundos
				};
			}

			function atualizarRelogio() {
				const horaAtual = obterHoraAtual();
				const hora = horaAtual.hora < 10 ? "0" + horaAtual.hora : horaAtual.hora;
				const minutos = horaAtual.minutos < 10 ? "0" + horaAtual.minutos : horaAtual.minutos;
				const segundos = horaAtual.segundos < 10 ? "0" + horaAtual.segundos : horaAtual.segundos;
				const horario = hora + ":" + minutos + ":" + segundos;
				document.getElementById("relogio").innerText = horario;
			}
			setInterval(atualizarRelogio, 1000);
		</script>
    </body>
</html>