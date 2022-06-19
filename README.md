# php_advogado
Sistema para Advogados em PHP

Manual Sistema de advogados

Requisitos para o funcionamento do script:
Não tem como garantir o funcionamento fora desses requisitos abaixo:
•Servidor Linux com cPanel da (cpanel.net)
•PHP 5.4, 5.5, 5.6 ou superior
•MySQL
•Apache
•phpMyAdmin

Configuração do banco de dados
Acesse o cPanel - No gerenciador de Banco de dados MySQL, crie o Banco de Dados MySQL, o
Usuário de acesso ao banco + senha, depois atribua todas as permissões do usuário ao Banco.
Nos arquivos do script que estão dentro da pasta /script acesse o seguinte arquivo e edite conforme
os dados do banco mysql que criou anteriormente.
Abrir o arquivo /application/config/database.php
Linhas 50 – 54

Alterar os dados conforme seu servidor:
$db['default']['hostname'] = 'localhost'; //Geralmente é localhost mesmo
$db['default']['username'] = 'USUARIOCPANEL_USUARIOBANCO';
$db['default']['password'] = 'SENHA';
$db['default']['database'] = 'USUARIOCPANEL_BANCO';
$db['default']['dbdriver'] = 'mysqli';
Importar a base de dados que está dentro da pasta /INSTALACAO
- Importe pelo phpmyadmin a base de dados BANCO-DE-DADOS.sql que está dentro da pasta
/INSTALACAO para o banco que criou pelo MySQL.


Enviando os Arquivos:
Agora compacte o conteúdo da pasta /Script em um arquivo .zip e faça o upload deste arquivo
zipado pelo Gerenciador de Arquivos do cPanel e assim que finalizar o upload descompacte o .zip lá
pelo gerenciador mesmo. Obs: Verifique se está enviando o .htaccess junto.

Área Administrativa:
Acesse www.seusite.com.br/admin ou www.seusite.com.br/PASTA/admin
Usuário padrão: admin
Senha padrão: 123456
Altere a senha após acessar o painel do sistema!
