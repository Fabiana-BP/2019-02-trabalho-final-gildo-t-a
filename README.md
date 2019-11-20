# **CSI477-2019-02 - Proposta de Trabalho Final**
## *Grupo: Fabiana Barreto & Gildo Azevedo*

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

Além dessas funcionalidades serão implementados sistema de segurança através de login em dois fatores para as empresas, sistema de avaliação de clientes a fim de proporcionar legitimidade e maior qualidade dos serviços prestados, além de informações sobre os lugares mais visitados, ofertas e promoções oferecidas pelas empresas.

### 3. Restrições

Neste trabalho não será contemplado procedimentos de comprovação, validação e efetivação de pagamento pelo cliente, ou seja, apenas o ato de indicar a ação pagamento será suficiente para considerar o serviço como pago.

### 4. Protótipo

A página principal irá conter opções que visam agilizar o acesso às informações e aos recursos para efetiva compra de passagens.
* Página principal: Sobre a empresa, autenticação, campos para pesquisa de rotas (data, origem e destino), avaliações dos clientes e informações sobre as cidades que mais obtiveram compras.
* Página da empresa: Opções de cadastro, visualizar perfil e relatório de vendas.
* Página do cliente: Opção de cadastro, visualizar perfil, compras já efetuadas.
* Página de rotas filtradas: Rotas disponíveis para a pesquisa específica, preços e botão de compra.
* Página de compra: Visualizar dados da empresa, Selecionar poltrona disponível, escolher tipo de pagamento e botão para efetivar a compra.

### 5. Execução
* Copiar todo o conteúdo para a pasta _"c:/wamp/www/"_.
* Criar banco de dados com nome 'bus' (sem aspas).
* Executar script _bus.sql_ localizado na pasta raíz do projeto.
* Abrir localhost em seu navegador padrão.
* Acesse este projeto em: http://gazevedo.ga

### 5. Referências
* https://github.com/projectworldsofficial/Online-Bus-Booking-System-In-PHP
* https://www.php.net/manual/pt_BR/index.php
