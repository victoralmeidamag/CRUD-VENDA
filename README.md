# <b>CRUD DE VENDAS | HCOSTA

### CRUD de vendas feito para o teste de J�nior para a HCOSTA.<br>
#### No Projeto foi desenvolvido uma tela de cadastro, tela de login, e uma op��o para o ADM editar usu�rio, tanto nome como email e alterar para VENDEDOR.<br><br>Foi utilizado API para consumir os dados de produtos.

## <b>FLUXO DE USO
#### <li> Realizar o cadastro - Permitido somente um e-mail por cadastro.
#### <li> Ao logar, se for VENDEDOR, ir� abrir as op��es pr�prias de vendedor, se for USU�RIO, ir� abrir somente as op��es de ver suas compras e editar sua compra para cancelada caso ainda n tenha sido paga.
#### <li> Usu�rio n�o tem limite de compras, pode fazer quantas quiser.
#### <li> VENDEDOR pode alterar todos os dados da compra, tanto PENDENTE como PAGO e CANCELADO.

## <b>CONFIGURA��O
#### 1. RODAR O COMANDO docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs para instalar as depend�ncias do projeto.<BR>
#### 2. Configurar o .env, campo <b>API_URL, recebendo o valor http://host.docker.internal + porta da API + /</b> <br>Exemplo: http://host.docker.internal:0000/<BR>
#### 3.<B> RODAS OS COMANDO:
<li> NPM INSTALL
<li> NPM RUN BUILD

#### Opcional : alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)' para sintetizar o comando ./vendor/bin/sail para apenas sail.

#### 4.  <b>sail up -d</b> para subir o container do projeto.

#### 5. <b>sail artisan key:generate</b> para gerar a chave de aplica��o

#### 6. <b>sail artisan migrate</b> para configurar a estrutura das tabelas.

#### 7. <b>sail artisan db:seed</b> para iniciar as tabelas com dados b�sicos/teste.