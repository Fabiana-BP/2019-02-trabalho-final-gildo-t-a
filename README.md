# **CSI477-2019-02 - Proposta de Trabalho Final**
--------------

# **Vanprime Transportes**

### Resumo

> Este trabalho tem como objetivo o desenvolvimento de um sistema voltado para compras de passagens para o transporte de ônibus e vans de diversas empresas. A proposta abrange uma área dedicada para administração dos serviços de transporte como cadastro de empresas e veículos, e outra para os clientes navegarem e procurarem pelo transporte de sua preferência.

### 1. Tema

Sistema de gerenciamento e comércio de passagens/reservas para transporte de pessoas.

### 2. Escopo

Este sistema terá dois públicos-alvo: empresas interessadas em vender passagens de seus veículos, e pessoas interessadas em comprar passagens dessas empresas. Nós, a Vanprime Transportes, será a intermediária, oferecendo áreas específicas no nosso site a fim de facilitar e aumentar o número de vendas de passagens, além de facilitar o acesso dos usuários para consultas e aquisições, gerando mais valor para o negócio.

**A área das empresas terá as seguintes funcionalidades:**
+ cadastro e atualização dos dados da empresa;
+ cadastro de veículos, incluindo sua respectiva origem, destino, horários e preço;
+ relatório de vendas;

**A área dos clientes terá os seguintes recursos:**
+ cadastro e atualização dos dados pessoais;
+ escolha de rota (origem e destino) e data da viagem;
+ pesquisa dos transportes e rotas disponíveis;
+ compra da passagem e avaliação de satisfação;
+ relatório de compras;

Além dessas funcionalidades serão implementados sistema de avaliação de clientes a fim de proporcionar legitimidade e maior qualidade dos serviços prestados, além de informações sobre os lugares mais visitados, e ofertas e promoções.

### 3. Restrições

Neste trabalho não será contemplado procedimentos de comprovação, validação e efetivação de pagamento pelo cliente, ou seja, apenas o ato de indicar a ação pagamento será suficiente para considerar o serviço como pago.

### 4. Protótipo

A página principal irá conter opções que visam agilizar o acesso às informações e aos recursos para efetiva compra de passagens.
* [Página principal](https://github.com/Fabiana-BP/sistema-web-com-laravel/blob/master/prototipo/index.html): Sobre a empresa, autenticação, campos para pesquisa de rotas (data, origem e destino), avaliações dos clientes e informações sobre as cidades que mais obtiveram compras.
* [Página da empresa](https://github.com/Fabiana-BP/sistema-web-com-laravel/blob/master/prototipo/area-empresa.html): Opções de cadastro, visualizar perfil e relatório de vendas.
* Página do cliente: [Opção de cadastro](https://github.com/Fabiana-BP/sistema-web-com-laravel/blob/master/prototipo/novo-usuario.html), visualizar perfil, compras já efetuadas.
* Página de rotas filtradas: Rotas disponíveis para a pesquisa específica, preços e botão de compra.
* Página de compra: Visualizar dados da empresa, selecionar poltrona disponível, escolher tipo de pagamento e botão para efetivar a compra.

### 5. Execução
* Instalar o Laravel.
* Criar banco de dados com nome 'vanprime' (sem aspas).
* Criar usuário 'vanprime@localhost' e dar permissão a ele para ter acesso ao banco 'vanprime' (senha: 123).
* Executar script vanprime.sql localizado na pasta raíz do projeto.
* Executar 'php artisan serve' na pasta do projeto e colar o endereço em algum navegador.

### 6. Observações
* A tabela Municipios foi retirada de (https://github.com/chandez/Estados-Cidades-IBGE/blob/master/Municipios.sql).
* O Sistema de Gerenciamento de Banco de Dados utilizado foi o MySQL.

### 7. Referências
* https://laravel.com/
* https://github.com/projectworldsofficial/Online-Bus-Booking-System-In-PHP
* https://www.php.net/manual/pt_BR/index.php

