<?php
	$pag = "contato";
	include("includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>\\
</html>
<body>
    <div class="mensagens-formulario"></div>
    <div class="sucesso">
        <p>Sua mensagem foi enviada com sucesso! <br> Agradecemos o contato, responderemos em breve!</p>
        <button class="submit fechar-msg">OK</button>
    </div>
    <div class="erro">
        <p>Mensagem não enviada. <br>Por favor, preencha todos os campos corretamente!</p>
        <button class="submit fechar-msg">OK</button>
    </div>
    <div class="container">
        <div class=" container-conteudo">
            <header>
                <?php include("includes/header-logo.php"); ?>
                
                <?php include("includes/header-login.php"); ?>
                
                <?php include("includes/header-menu.php"); ?>
            </header>
            
            <div class="content">
                <section class="conteudo contato">
                    <div class="left">
                        <h2>CONTATO</h2>
                        <p class="ir-faq">
                            Antes de enviar o e-mail confira se sua pergunta já foi respondida no FAQ. <br>
                            <a href="faq.php">Ir para o FAQ</a>
                        </p>
                        <form name="form-contato" class="contato" id="form-contato" method="post" action="contato-envia.php" >
                            <p>
                                <label for="nome">Nome Completo</label>
                                <input type="text" name="nome" id="nome">
                            </p>
                            <p>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                            </p>
                            <p>
                                <label for="departamento">Departamento</label>
                                <select name="departamento" id="departamento">
                                    <option value="">Selecione o departamento</option>
                                    <option value="Contato - contato@getm.com">Contato - contato@getm.com</option>
                                    <option value="Financeiro - financeiro@getm.com">Financeiro - financeiro@getm.com</option>
                                    <option value="Marketing - marketing@getm.com">Marketing - marketing@getm.com</option>
                                </select>
                            </p>
                            <p>
                                <label for="mensagem">Mensagem</label>
                                <textarea name="mensagem" id="mensagem" cols="30" rows="10" ></textarea>
                                <input name="seguranca" id="seguranca" type="hidden" value="" />
                            </p>
                            <p>
                                <label for="codigo">Código</label>
                                <input type="text" id="captchaAnswer" name="captchaAnswer" value="">
                                <img class="img-captcha" src="captcha.php" />
                                <a class="reload" title="reload"></a>
                            </p>
                            <p>
                                <label for="btn-contato">&nbsp;</label>
                                <input type="submit" class="" value="ENVIAR" name="btn-contato" id="btn-contato" />
                                <span class="ajax-loader-gif"></span>
                            </p>
                        </form>
                    </div>
                    <div class="right">
                        <div class="mapa-getm">
                            <h3>LOCALIZAÇÃO</h3>
                            <p class="nome-empresa">GETM - Grande Empresa de Tecnologia Mundial</p>
                            <div class="iframe-mapa">
                                <iframe width="512" height="342" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt&amp;geocode=&amp;q=rua+ot%C3%A1vio+leitinho,+99A+1%C2%BA+2%C2%BA+andar+Salgueiro+-+Pernambuco+-+Brasil&amp;aq=&amp;sll=-8.072994,-39.118967&amp;sspn=0.001607,0.001084&amp;ie=UTF8&amp;hq=&amp;hnear=Rua+Ot%C3%A1vio+Leitinho,+99,+Pernambuco,+56000-000,+Brasil&amp;t=m&amp;ll=-8.062884,-39.11768&amp;spn=0.029064,0.043859&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                            </div>
                            <p>
                                Rua: Otávio Leitinho 99A 1º e 2º andar <br>
                                Bairro: Santo Antonio ( Centro ) <br>
                                Salgueiro - Pernambuco - Brasil
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        </div>
    <?php include("includes/rodape.php"); ?>
</body>