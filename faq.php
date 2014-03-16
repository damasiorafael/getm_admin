<?php
	$pag = "faq";
?>
<?php
session_start();
$id = $_POST['id'];
$senha = $_POST['senha'];

$_SESSION['id'] = $id;
$_SESSION['senha'] = $senha;
if(isset($id)){
   //echo "Você está logado como: $id";
   //header('location:http://localhost/GETM/index.php');
}
else
 // echo 'Você não está logado' // Não logado

?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="container">
        <div class=" container-conteudo">
            <header>
                <?php include("includes/header-logo.php"); ?>
                
                <?php include("includes/header-menu.php"); ?>
            </header>
            
            <div class="content">
                <section class="conteudo faq">
                    <h2>FAQ - PERGUNTAS FREQUENTES</h2>

                    <p class="pergunta">O que é a GETM?</p>
                    <p class="resposta">A GETM é uma empresa que trabalha com serviço de fidelização de clientes e publicidade.</p>

                    <p class="pergunta">O que significa GETM?</p>
                    <p class="resposta">Grande Empresa de Tecnologia Mundial.</p>

                    <p class="pergunta">O que ela faz?</p>
                    <p class="resposta">Fica como intermediária entre o associado consumidor GETM e entre as empresas associadas parceiras GETM, que utiliza o marketing multinível para que você receba dinheiro por suas compras e pelas compras de sua equipe.</p>

                    <p class="pergunta">Quanto eu pago pra me cadastrar na GETM?</p>
                    <p class="resposta">Nada. Os cadastros são totalmente gratuitos.</p>

                    <p class="pergunta">Como eu faço para me cadastrar na GETM?</p>
                    <p class="resposta">Na página home da GETM clica no nome cadastro e preencha os campos do formulário digitando os dados corretamente. <br>Também pode ser através de um link de indicação por algum associado já cadastrado.</p>

                    <p class="pergunta">Menor de idade pode participar da GETM? </p>
                    <p class="resposta">Não. Somente pessoas com no mínimo 18 anos.</p>

                    <p class="pergunta">Posso ter mais de um cadastro com o mesmo CPF? </p>
                    <p class="resposta">Não, apenas um cadastro por cada CPF.</p>

                    <p class="pergunta">Eu posso cadastrar um novo associado consumidor ou um estabelecimento comercial? </p>
                    <p class="resposta">Sim, quantos quiserem, não tem limites de indicações.</p>

                    <p class="pergunta">O estabelecimento comercial também é um divulgador?</p>
                    <p class="resposta">Sim, ele pode cadastrar quantos quiser, tanto associados consumidores como estabelecimentos comerciais, como qualquer outro associado.</p>

                    <p class="pergunta">Como recupero a senha? </p>
                    <p class="resposta">No site GETM clique em ESQUECI MINHA SENHA preencha os campos corretamente. O sistema enviará uma nova senha para o e-mail cadastrado. Importante: Independente do provedor de e-mail que você usa, veja na sua caixa de SPAM, pois sendo enviado direto do servidor, em muitos casos a nova senha vai para essa pasta.</p>

                    <p class="pergunta">Como ganhar dinheiro com a GETM?</p>
                    <div class="resposta">Existem várias formas: <br>
                        <ul>
                            <li>- Você recebe um percentual do dinheiro gasto quando você compra ou contrata serviços nas empresas parceiras da GETM.</li>
                            <li>- Você recebe um percentual do dinheiro gasto quando seus indicados comprarem ou contratarem serviços nas empresas parceiras da GETM.</li>
                            <li>- Você recebe uma porcentagem pelas vendas dos produtos e serviços da GETM.</li>
                        </ul>
                    </div>

                    <p class="pergunta">Quais são os ganhos por Consumo? </p>
                    <div class="resposta">São três. A GETM repassa 100% do percentual que o estabelecimento comercial repassou para GETM, para os seus associados “Consumidores” sendo:
                        <ul>
                            <li>- 40% Para o associado Consumidor.</li>
                            <li>- 40% Para o associado que indicou o Consumidor.</li>
                            <li>- 20% Para o associado credenciador.</li>
                        </ul>
                    </div>

                    <p class="pergunta">Quanto eu ganho por comprar nos estabelecimentos comercial credenciados a GETM?</p>
                    <p class="resposta">O estabelecimento comercial oferece um percentual para os associados “consumidores” da GETM que fizer compras no seu estabelecimento. Desse percentual você irá ganhar 40%. Basta fazer o que você sempre fez “Compras”. </p>

                    <p class="pergunta">Qual o valor da porcentagem que o estabelecimento comercial pode oferecer? </p>
                    <p class="resposta">A partir de 0,5%, fica a critério do comerciante.</p>

                    <p class="pergunta">Essa porcentagem que o parceiro estabelecimento comercial oferece é válida para compras a prazo?</p>
                    <p class="resposta">Não, somente para compras a vista.</p>

                    <p class="pergunta">Quando o parceiro estabelecimento comercial paga a fatura de comissões?</p>
                    <p class="resposta">O pagamento das comissões é semanal.</p>

                    <p class="pergunta">E se o parceiro estabelecimento comercial não pagar a fatura das comissões?</p>
                    <p class="resposta">O nosso sistema bloqueia o atendente(a) caixa do escritório virtual (BO - Back-Office) deste estabelecimento de inserir códigos ou CPFs nas compras dos associados consumidores.</p>

                    <p class="pergunta">E quando o sistema libera para o atendente caixa deste parceiro estabelecimento comercial inserir os códigos ou CPFs?</p>
                    <p class="resposta">A partir do momento que este parceiro estabelecimento comercial pagar a fatura de comissões pendente.</p>

                    <p class="pergunta">O que acontece com os parceiros estabelecimentos comercial que não pagar a fatura?</p>
                    <p class="resposta">Ele fica bloqueado de inserir códigos ou CPFs dos associados consumidores, mas ele pode fazer indicações (cadastros) formando sua equipe de indicações e obter ganhos.</p>

                    <p class="pergunta">O estabelecimento comercial pode pagar a fatura com seus próprios ganhos?</p>
                    <p class="resposta">Pode.</p>

                    <p class="pergunta">Quando eu passo a ter os ganhos pelo consumo dos meus diretos? </p>
                    <p class="resposta">Quando você se tornar um DIAMANTE e estiver ELEGÍVEL mensal, terá 40% do percentual oferecido pelos estabelecimentos comerciais, toda vez que um direto seu for fazer compras nos estabelecimentos credenciados.</p>

                    <p class="pergunta">Quando eu passo a ter os ganhos de credenciador?</p>
                    <p class="resposta">Quando você se tornar um DIAMANTE e estiver ELEGÍVEL mensal, terá 20% do percentual oferecido pelos estabelecimentos comerciais que você credenciou. <br>Você receberá essa porcentagem das compras de todos os associados da GETM que fizer compras nos estabelecimentos comerciais credenciado.</p>

                    <p class="pergunta">Como localizar no site da GETM os estabelecimentos comerciais credenciados?</p>
                    <p class="resposta">Na página home do site da GETM, tem o link; LOCALIZE EMPRESAS CREDENCIADAS, clique e digite o nome dos pais, estado e cidade, nas categorias da cidade você irá encontrar a empresa desejada, caso ela esteja credenciada.</p>

                    <p class="pergunta">Como avançar nos planos de carreira? </p>
                    <p class="resposta">A cada 10 (dez) associados consumidores que pagarem a adesão uma única vez no ano, você vai avançando nos planos de carreira.</p>

                    <p class="pergunta">Quais são os planos de carreira? </p>
                    <div class="resposta">
                        <table>
                            <thead>
                                <tr>
                                    <th class="bold">PLANOS DE CARREIRA</th>
                                    <th class="bold">SIGLAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 Cliente (Consumidor)</td>
                                    <td>C</td>
                                </tr>
                                <tr>
                                    <td>2 Cliente (Consumidor) Bronze</td>
                                    <td>CB</td>
                                </tr>
                                <tr>
                                    <td>3 Cliente (Consumidor) Prata</td>
                                    <td>CP</td>
                                </tr>
                                <tr>
                                    <td>4 Cliente (Consumidor) Ouro</td>
                                    <td>CO</td>
                                </tr>
                                <tr>
                                    <td>5 Cliente (Consumidor) Safira</td>
                                    <td>CS</td>
                                </tr>
                                <tr>
                                    <td>6 Cliente (Consumidor) Diamante</td>
                                    <td>CD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="pergunta">E quanto custa a adesão? </p>
                    <p class="resposta">Um valor único no ano de R$: 100,00 (cem reais).</p>

                    <p class="pergunta">Quanto eu ganho por cada associado de indicação direta que pagar sua adesão? </p>
                    <p class="resposta">Você ganha 50% do valor da adesão de cada associado direto.</p>

                    <p class="pergunta">Quanto eu ganho ao vender um produto ou serviço?</p>
                    <p class="resposta">Você ganha entre 10% e 50% do valor da venda.</p>

                    <p class="pergunta">Como faço para realizar o pagamento da adesão?</p>
                    <div class="resposta"> 
                        Temos três situações
                        <ul>
                            <li>1º Pagamento por boleto bancário leva o tempo da compensação bancária do País que é de até 48hs (1 + D).</li>
                            <li>2º Pagamentos por cartões de crédito via intermediadores de pagamentos, a ativação é automática pela integração dos sistemas</li>
                            <li>3º Pagamentos com bônus do divulgador, ativação é automática intra-sistema.</li>
                        </ul>
                        Por gentileza, aguarde o prazo necessário.
                    </div>

                    <p class="pergunta">O boleto bancário é de qual banco? </p>
                    <p class="resposta">Banco Caixa Econômica Federal.</p>

                    <p class="pergunta">Posso pagar o boleto bancário em outros bancos ou lotéricas? </p>
                    <p class="resposta">Sim, até a data do vencimento pode pagar em qualquer agência bancária ou lotérica após a data do vencimento só pode no próprio banco.</p>

                    <p class="pergunta">A partir de qual plano de carreira eu começo a ganhar os bônus residuais? </p>
                    <p class="resposta">A partir do BRONZE, você já ganha os residuais até o segundo nível. Mas para ter direito a esses ganhos é preciso estar elegível no mês com a TMR – Taxa de Manutenção Mensal de Rede do mês pago.</p>

                    <p class="pergunta">Qual o valor do ganho residual? </p>
                    <p class="resposta">R$: 4,00 por cada consumidor da sua equipe que também pagar a TMR – Taxa de Manutenção Mensal de Rede no mesmo mês.</p>

                    <p class="pergunta">Para eu ter direitos aos ganhos residuais? </p>
                    <div class="resposta">
                        <ul>
                            <li>1º É preciso ter associados na sua equipe.
                            <li>2º Precisa estar na qualificação a partir do BRONZE.
                            <li>3º Precisa estar elegível no mês com a TMR – Taxa de Manutenção Mensal de Rede do mês pago.
                        </ul>
                    </div>

                    <p class="pergunta">Para eu ter os meus ganhos residuais é preciso estar elegível todo mês? </p>
                    <p class="resposta">Sim, precisa estar elegível no mês, pagando a TMR – Taxa de Manutenção Mensal de Rede do mês que custa R$: 99,90.</p>

                    <p class="pergunta">Eu sou obrigado (a) a pagar a TMR – Taxa de Manutenção Mensal de Rede todo mês? </p>
                    <p class="resposta">Não, mas perderá alguns ganhos.</p>

                    <p class="pergunta">Eu recebo o meu percentual na hora que eu faço minhas compras? </p>
                    <p class="resposta">Não, o atendente caixa vai digitar o valor de suas compras, e sua porcentagem será direcionada para o seu escritório virtual (BO – Back-Office) e chegará um SMS para o número do celular cadastrado na GETM com o valor ganho e saldo total.</p>

                    <p class="pergunta">A minha porcentagem é liberado de imediato para o escritório virtual (BO - Back-Office)? </p>
                    <p class="resposta">Não, irá constar no escritório virtual (BO - Back-Office), mas aparecerá como: valor bloqueado e toda descrição de qual estabelecimento comercial veio aquele valor. </p>

                    <p class="pergunta">Quando será desbloqueado? </p>
                    <p class="resposta">O estabelecimento comercial faz todos os repasses das porcentagens para GETM semanal, e a GETM libera essas porcentagens no dia seguinte, assim que a GETM constar o pagamento da fatura das porcentagens será desbloqueado. <br>OBS.: A GETM só libera esse valor bloqueado daquele estabelecimento comercial quando ele repassa as porcentagens para GETM.</p>

                    <p class="pergunta">Se o estabelecimento comercial não repassar os valores das comissões para GETM? </p>
                    <p class="resposta">Como se encontra no contrato, os valores de porcentagens só serão liberados daquela semana se os estabelecimento comercial fizer o repasse para GETM. <br>Pois ficará o valor bloqueado a espera do repasse do estabelecimento comercial.</p>

                    <p class="pergunta">O que acontece com um estabelecimento comercial que não repassar as porcentagens para GETM? </p>
                    <p class="resposta">Assim que a GETM não constar que não foi repassado os valores das porcentagens daquela semana, os caixas do mesmo não estarão mais liberados para registrar valores de compras dos associados da GETM. </p>

                    <p class="pergunta">E quando o estabelecimento comercial volta ao normal? </p>
                    <p class="resposta">Assim que ele efetuar o pagamento da fatura das porcentagens em atraso. <br>Assim que ele efetuar o pagamento da fatura, todos os valores de porcentagens bloqueados são liberados.</p>

                    <p class="pergunta">Onde verificar os ganhos detalhadamente? </p>
                    <p class="resposta">Em seu escritório virtual (BO - Back-Office).</p>

                    <p class="pergunta">Como eu resgato meus ganhos para minha conta bancária?</p>
                    <p class="resposta">Acesse o escritório virtual (BO - Back-Office), escolha a opção solicitar saque. Nele estará os dados do titular da conta do divulgador, somente em nome do titular da conta GETM. <br>Observação; Não se esqueça de preencher em dados bancários suas informações bancárias corretamente.</p>

                    <p class="pergunta">Em qual dia eu posso solicitar o saque? </p>
                    <p class="resposta">Os dias certos de requisitar seu saque é a partir do dia 1º até o dia 15 de cada mês, e receberá no dia 1ª do mês seguinte. Os pagamentos são realizados nas contas bancárias informadas.</p>

                    <p class="pergunta">Posso colocar a conta bancaria de outra pessoa? </p>
                    <p class="resposta">Não, não pagamos em nome de terceiros, só pode ser em nome do titular da conta GETM. <br>Só pode ser do titular do CPF cadastrado na GETM.</p>

                    <p class="pergunta">Qual o banco posso cadastrar para requisitar meus ganhos? </p>
                    <p class="resposta">Qualquer banco</p>

                    <p class="pergunta">Qual o saque mínimo? </p>
                    <p class="resposta">R$100,00</p>

                    <p class="pergunta">Posso transferir minha posição para outra pessoa? </p>
                    <p class="resposta">Não, não é possível transferir titularidade de nenhum cadastro.</p>

                    <p class="pergunta">Posso mudar o login da conta GETM? </p>
                    <p class="resposta">Sim, a taxa para esse serviço é de R$50,00 o divulgador deve enviar ao suporte o login atual e o login que deseja, verificaremos e tendo a disponibilidade a mudança será realizada, assim que recebermos o comprovante do depósito.</p>

                    <p class="pergunta">Quais são as regras para um novo contrato associado no ano seguinte? </p>
                    <p class="resposta">As regras são as mesmas, o associado que quiser realizar um novo contrato para o ano seguinte, deverá pagar a taxa do CRP – Custo de Reserva de Posição (mantendo seus diretos quando eles fizerem o novo contrato) no valor de R$200,00 ( duzentos reais ).</p>

                    <p class="pergunta">E se o associado não pagar um novo contrato do ano seguinte? </p>
                    <p class="resposta">Perde toda sua equipe de indicação, diretas e indiretas, voltando a ser cliente “consumidor”.</p>

                    <p class="pergunta">Quais são as regras para um novo contrato de associado estabelecimento comercial no ano seguinte? </p>
                    <p class="resposta">As regras são as mesmas, o estabelecimento comercial que quiser realizar um novo contrato para o ano seguinte, deverá pagar a FATURA DE RENOVAÇÃO no valor de R$500,00.</p>

                    <p class="pergunta">E se o estabelecimento comercial não pagar um novo contrato do ano seguinte? </p>
                    <p class="resposta">Ficará impossibilitado dos atendentes caixas registrarem valores de compras dos clientes “consumidores” da GETM, e a GETM irá excluir o nome, endereço e contatos da lista de busca de estabelecimentos comerciais credenciados.</p>

                    <p class="pergunta">Observação:</p>
                    <p class="bold">Estabelecimento Comercial</p>
                    <div class="resposta">
                        Encontra-se no escritório virtual (BO - Back-Office) do estabelecimento comercial, duas faturas de renovação. <br>
                        1ª - Fatura de Renovação é de associado Consumidor.
                        <ul>
                            <li><span class="bold">Se ele pagar essa fatura de renovação? </span>Manterá seus diretos e indiretos quando eles fizerem o novo contrato.</li>
                            <li><span class="bold">Se ele não pagar essa fatura de renovação? </span>Perderá todos os seus diretos e indiretos quando eles fizerem o novo contrato e voltará a ser um associado consumidor.</li>
                        </ul>

                        2ª - Fatura de Renovação é de Estabelecimento Comercial.
                        <ul>
                            <li><span class="bold">Se ele pagar essa fatura de renovação? </span>Seus atendentes caixas continuam o acesso normal, inserindo os códigos e números de CPF dos associados GETM e manterá todos seus dados e mini site na busca de empresas da GETM.</li>
                            <li><span class="bold">Se ele não pagar essa fatura de renovação? </span>Ficará impossibilitado dos atendentes caixas registrarem valores de compras dos clientes “consumidores” da GETM, e a GETM irá excluir o nome, endereço e contatos da lista de busca de empresas credenciadas a GETM.</li>
                        </ul>
                        <br>
                        <span class="bold">A condição de realizar o novo contrato: </span>Para o ano seguinte estará disponível no escritório virtual (BO - Back-Office) do associado Estabelecimento Comercial nos 5 dias anterior ao término do contrato. <br>
                        Exemplo: <br>
                        Se o término for dia 18/02 de um determinado ano, encontrará a condição disponível no escritório virtual (BO - Back-Office) a partir de 13/02 desse mesmo ano. O associado consumidor ou Estabelecimento Comercial já reserva o seu novo contrato antecipadamente.
                        A condição fica disponível até a meia noite do dia do encerramento do contrato, no nosso exemplo dia 18/02, não havendo qualquer possibilidade de prorrogação. Sendo assim o associado perde o direito da posição e o Estabelecimento Comercial ficará impossibilitado dos atendentes caixas registrarem valores de compras dos clientes “consumidores” da GETM, e a GETM irá excluir o nome, endereço e contatos da lista de busca de estabelecimentos comerciais credenciados. 
                    </div>

                    <p class="pergunta">Os impostos?</p>
                    <p class="resposta">São descontados direto da fonte.</p>

                    <p class="pergunta">A empresa possui um Serviço de Atendimento ao Associado?</p>
                    <p class="resposta">Sim, via e-mail.</p>
                </section>
            </div>
        </div>
        </div>
        <?php include("includes/rodape.php"); ?>
    
</body>