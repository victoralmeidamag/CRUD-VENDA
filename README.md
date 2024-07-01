# <b>CRUD DE VENDAS | HCOSTA

### CRUD de vendas feito para o teste de Júnior para a HCOSTA.<br>
#### No Projeto foi desenvolvido uma tela de cadastro, tela de login, e uma opção para o ADM editar usuário, tanto nome como email e alterar para VENDEDOR.<br><br>Foi utilizado API para consumir os dados de produtos.

## <b>FLUXO DE USO
#### <li> Realizar o cadastro - Permitido somente um e-mail por cadastro.
#### <li> Ao logar, se for VENDEDOR, irá abrir as opções próprias de vendedor, se for USUÁRIO, irá abrir somente as opções de ver suas compras e editar sua compra para cancelada caso ainda n tenha sido paga.
#### <li> Usuário não tem limite de compras, pode fazer quantas quiser.
#### <li> VENDEDOR pode alterar todos os dados da compra, tanto PENDENTE como PAGO e CANCELADO.

## <b>CONFIGURAÇÃO
#### 1. RODAR O COMANDO: <br>docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs<br> para instalar as dependências do projeto.<BR>
#### 2. Configurar o .env, campo <b>API_URL</b>, recebendo o valor http://host.docker.internal + porta da API + / <br>Exemplo: http://host.docker.internal:0000/<BR>Campo<b> APP_PORT</b>, definir uma porta para rodar a aplicação
#### 3.<B> RODAR OS COMANDO:
<li> sail npm install
<li> sail npm run build

#### Opcional : alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'<br> para sintetizar o comando ./vendor/bin/sail para apenas sail.

#### 4.  <b>sail up -d</b> para subir o container do projeto.

#### 5. <b>sail artisan key:generate</b> para gerar a chave de aplicação

#### 6. <b>sail artisan migrate</b> para configurar a estrutura das tabelas.

#### 7. <b>sail artisan db:seed</b> para iniciar as tabelas com dados básicos/teste.