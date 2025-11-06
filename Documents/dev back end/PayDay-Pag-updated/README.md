 Payday Pag

**Payday Pag** é um sistema de pagamentos que tem como objetivo
possibilitar transações financeiras seguras entre usuários e comércios,
utilizando carteiras digitais e múltiplos métodos de pagamento.

------------------------------------------------------------------------

 Escolhas de Modelagem

A modelagem do banco de dados foi pensada para refletir os principais
requisitos de um sistema de pagamentos digitais:

-   **Usuários (`users`)**: responsáveis por autenticação e
    identificação dos clientes.\
-   **Carteira (`carteira`)**: cada usuário possui uma carteira
    vinculada para armazenar saldo e controlar entradas/saídas de
    valores.\
-   **Métodos de Pagamento (`metodos_pagamento`)**: abstração que
    permite registrar diferentes formas de pagamento (cartão, PIX,
    boleto, etc.), atendendo à flexibilidade do sistema.\
-   **Transações (`transacao`)**: entidade central que registra toda
    movimentação financeira, garantindo rastreabilidade e consistência
    das operações.\
-   **Comércio (`comercio`)**: possibilita que estabelecimentos sejam
    cadastrados como recebedores de pagamentos.\
-   **Cache e Jobs (`cache`, `jobs`)**: implementados para otimizar o
    desempenho e suportar tarefas assíncronas, como processamento de
    transações em fila.

------------------------------------------------------------------------

  Justificativa

Esse modelo atende ao tema **sistema de pagamento** porque:\
- Permite que usuários tenham **controle sobre seus saldos** via
carteira.\
- Dá suporte a **diversos meios de pagamento**, aumentando a
aplicabilidade do sistema.\
- Mantém **registro detalhado das transações**, fundamental em qualquer
solução financeira.\
- Facilita a **integração com comércios**, cumprindo o objetivo de ser
uma plataforma de pagamentos.\
- Garante **escalabilidade** com o uso de filas e cache, evitando
gargalos em operações críticas.

------------------------------------------------------------------------

 Autores

Desenvolvido por Júlio Cesar Guzzo Küster, Felipe Queiroz Hyczy, Andrew Bertelli, Josué de Castilho.


## Atualizações - Padrões de Projeto, Strategy e CQRS (Entrega Parcial 1)

Foram feitas as seguintes alterações para atender aos requisitos da Entrega Parcial 1:

### Padrão Factory Method
- `app/Patterns/Factory/ProductCreator.php` (abstract)
- `app/Patterns/Factory/SimpleProductCreator.php` (concrete)
- `app/Patterns/Factory/DigitalProductCreator.php` (concrete)
Implementa a criação de instâncias de `Produto` por meio de um método de fábrica (`factoryMethod`) que encapsula a lógica de instanciação. A vantagem é separar a lógica de criação da lógica de negócio.

### Padrão Strategy
- `app/Patterns/Strategy/NameStrategyInterface.php`
- `app/Patterns/Strategy/UpperCaseStrategy.php`
- `app/Patterns/Strategy/SlugStrategy.php`
- `app/Patterns/Strategy/NameContext.php`
Usado para separar políticas de formatação de nomes (ex.: uppercase, slug). A `NameContext` recebe uma implementação de estratégia via injeção de dependência.

### CQRS (início)
- `app/CQRS/Commands/CreateCategoriaCommand.php` (comando de escrita)
- `app/CQRS/Queries/ListCategoriaQuery.php` (consulta de leitura)
A controller `CategoriaController` agora usa injeção de dependência para receber os handlers de comando e query, demonstrando a separação inicial entre escrita e leitura.

### Injeção de Dependência e SOLID
- `app/Providers/AppServiceProvider.php` foi atualizado para registrar bindings no container, demonstrando Dependency Inversion e Single Responsibility nas classes criadas (cada classe tem uma única responsabilidade).
- `CategoriaController` depende de abstrações/handlers ao invés de instanciar lógica internamente.

### Como testar rapidamente
- Endpoints existentes continuam disponíveis.
- Para criar uma categoria via comando (com formatação aplicada), use `POST /categorias` com JSON `{ "nome": "Minha Categoria" }`.
- Para listar categorias via query, use `GET /categorias`.

