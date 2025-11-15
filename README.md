# Payday Pag

**Payday Pag** é um sistema de pagamentos que tem como objetivo possibilitar transações financeiras seguras entre usuários e comércios, utilizando carteiras digitais e múltiplos métodos de pagamento.

## Escolhas de Modelagem

A modelagem do banco de dados foi pensada para refletir os principais requisitos de um sistema de pagamentos digitais:

- **Usuários (`users`)**: responsáveis por autenticação e identificação dos clientes. Cada usuário pode ter uma carteira, um comércio e múltiplos produtos.
- **Carteira (`carteiras`)**: cada usuário possui uma carteira vinculada (relacionamento um-para-um) para armazenar saldo e controlar entradas/saídas de valores.
- **Métodos de Pagamento (`metodos_pagamento`)**: abstração que permite registrar diferentes formas de pagamento (cartão, PIX, boleto, etc.), atendendo à flexibilidade do sistema. Um método de pagamento pode ser usado em muitas transações (um-para-muitos).
- **Transações (`transacoes`)**: entidade central que registra toda movimentação financeira, garantindo rastreabilidade e consistência das operações. Cada transação possui um pagador, um beneficiário e um método de pagamento.
- **Comércio (`comercios`)**: possibilita que estabelecimentos sejam cadastrados como recebedores de pagamentos. Relacionamento um-para-um com usuários.
- **Produtos (`produtos`)**: produtos cadastrados pelos usuários, relacionados a categorias (muitos-para-um) e usuários (muitos-para-um).
- **Categorias (`categorias`)**: categorias de produtos, com relacionamento um-para-muitos com produtos.
- **Cache e Jobs (`cache`, `jobs`)**: implementados para otimizar o desempenho e suportar tarefas assíncronas, como processamento de transações em fila.

### Relacionamentos Implementados

- **User ↔ Carteira**: Um-para-um (hasOne/belongsTo)
- **User ↔ Comercio**: Um-para-um (hasOne/belongsTo)
- **User ↔ Produto**: Um-para-muitos (hasMany/belongsTo)
- **User ↔ Transacao**: Um-para-muitos (hasMany como pagador e beneficiário)
- **Categoria ↔ Produto**: Um-para-muitos (hasMany/belongsTo)
- **MetodoPagamento ↔ Transacao**: Um-para-muitos (hasMany/belongsTo)

## Justificativa

Esse modelo atende ao tema **sistema de pagamento** porque:
- Permite que usuários tenham **controle sobre seus saldos** via carteira.
- Dá suporte a **diversos meios de pagamento**, aumentando a aplicabilidade do sistema.
- Mantém **registro detalhado das transações**, fundamental em qualquer solução financeira.
- Facilita a **integração com comércios**, cumprindo o objetivo de ser uma plataforma de pagamentos.
- Garante **escalabilidade** com o uso de filas e cache, evitando gargalos em operações críticas.

## Estrutura do Projeto

O projeto segue a estrutura padrão do Laravel:

- **Models**: `app/Models/` - Contém os modelos Eloquent (User, Carteira, Comercio, Transacao, MetodoPagamento, Produto, Categoria)
- **Controllers**: `app/Http/Controllers/` - Contém os controllers da aplicação
- **Migrations**: `database/migrations/` - Contém todas as migrations do banco de dados
- **Seeders**: `database/seeders/` - Contém os seeders para popular o banco com dados de teste
- **Routes**: `routes/` - Contém as rotas da aplicação (web.php e api.php)

## Instalação e Configuração

1. Instale as dependências:
```bash
composer install
```

2. Configure o arquivo `.env` com as credenciais do banco de dados MySQL.

3. Execute as migrations:
```bash
php artisan migrate
```

4. Execute os seeders para popular o banco com dados de teste:
```bash
php artisan db:seed
```

## Rotas e Endpoints

### Rotas de Exemplo (Públicas)

O projeto inclui rotas simples para demonstrar a configuração inicial:

- **GET `/hello`**: Retorna uma mensagem "Hello World!" em JSON
- **GET `/exemplo/lista`**: Retorna uma lista simples de dados em memória

Exemplo de uso:
```bash
curl http://localhost:8000/hello
# Retorna: {"message":"Hello World!"}
```

### Sistema de Autenticação

O projeto utiliza **Laravel Breeze** para autenticação, incluindo:
- Registro de usuários (`/register`)
- Login de usuários (`/login`)
- Recuperação de senha
- Verificação de email
- Senhas são automaticamente hasheadas usando bcrypt

### Endpoints CRUD Implementados

#### Transações (Requer Autenticação)
- **GET `/transacoes`**: Lista todas as transações do usuário autenticado
- **GET `/transacoes/create`**: Formulário para criar nova transação
- **POST `/transacoes`**: Cria uma nova transação (com validação de saldo)
- **GET `/transacoes/{id}`**: Exibe detalhes de uma transação específica

#### Produtos (API - Requer Autenticação Sanctum)
- **GET `/api/produtos`**: Lista todos os produtos com suas categorias
- **POST `/api/produtos`**: Cria um novo produto
- **GET `/api/produtos/{id}`**: Exibe um produto específico
- **PUT/PATCH `/api/produtos/{id}`**: Atualiza um produto
- **DELETE `/api/produtos/{id}`**: Deleta um produto

#### Categorias (API - Requer Autenticação Sanctum)
- **GET `/api/categorias`**: Lista todas as categorias
- **POST `/api/categorias`**: Cria uma nova categoria
- **GET `/api/categorias/{id}`**: Exibe uma categoria específica
- **PUT/PATCH `/api/categorias/{id}`**: Atualiza uma categoria
- **DELETE `/api/categorias/{id}`**: Deleta uma categoria

#### Carteira (Requer Autenticação)
- **GET `/carteira`**: Exibe o saldo da carteira do usuário
- **POST `/carteira/depositar`**: Realiza um depósito na carteira

#### Comércio (Requer Autenticação)
- **GET `/comercio`**: Exibe o comércio do usuário
- **GET `/comercio/create`**: Formulário para cadastrar comércio
- **POST `/comercio`**: Cadastra um novo comércio

### Validação de Dados

Todas as rotas implementam validação robusta usando as regras de validação do Laravel:

- **Transações**: Validação de beneficiário, método de pagamento, valor mínimo e saldo suficiente
- **Produtos**: Validação de nome, preço, categoria e usuário
- **Categorias**: Validação de nome obrigatório
- **Comércio**: Validação de nome da empresa e CNPJ único
- **Carteira**: Validação de valor mínimo para depósitos

### Middlewares de Autenticação

- Rotas protegidas utilizam o middleware `auth` para garantir que apenas usuários autenticados possam acessar
- Rotas de API utilizam `auth:sanctum` para autenticação via token
- O dashboard (`/dashboard`) requer autenticação e verificação de email

## Testes Automatizados

O projeto inclui testes unitários e de feature:

### Testes Unitários

1. **HelpersTest**: Testa funções auxiliares de sanitização de nomes
2. **ValidationRulesTest**: Testa regras de validação do Laravel (validação de email)
3. **ExampleTest**: Teste básico de exemplo

### Testes de Feature

- **ProdutoTest**: Testa operações CRUD de produtos (criar, atualizar, deletar)
- **AuthenticationTest**: Testa o fluxo de autenticação
- **ProfileTest**: Testa atualização de perfil

Para executar os testes:
```bash
php artisan test
```

## Tecnologias Utilizadas

- **Laravel 12**: Framework PHP
- **MySQL**: Banco de dados relacional
- **Laravel Breeze**: Scaffolding de autenticação
- **Laravel Sanctum**: Autenticação via API
- **PHPUnit**: Framework de testes
- **Eloquent ORM**: ORM do Laravel para interação com banco de dados

## Autores

Desenvolvido por Júlio Cesar Guzzo Küster, Felipe Queiroz Hyczy, Andrew Bertelli, Josué de Castilho.
