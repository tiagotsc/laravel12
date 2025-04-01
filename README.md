# Desafio T�cnico: Gest�o de Propostas de Venda

## Objetivo
Desenvolver uma aplica��o para gerenciar propostas de venda, incluindo a cria��o, listagem e altera��o de status das propostas. O objetivo � avaliar suas habilidades em **PHP, Laravel e boas pr�ticas de desenvolvimento**.

## Requisitos
### 1. Estrutura da Proposta de Venda
Cada proposta de venda deve conter os seguintes campos:
- **ID** (Identificador �nico)
- **Data de Cadastro** (Preenchida automaticamente no momento da cria��o)
- **Data de Finaliza��o** (Preenchida apenas quando o status for "Finalizado")
- **Item Vendido** (Campo obrigat�rio, deve ter entre **5 e 50 caracteres**)
- **Valor (R$)** (Campo obrigat�rio, deve ser **positivo e maior que R$ 0,01**)
- **Status da Proposta** (Relacionado a outra tabela, com os seguintes valores fixos):
  - **Aberto** (padr�o ao cadastrar)
  - **Em An�lise**
  - **Finalizado**
  - **Cancelado**

### 2. Regras de Cadastro de Propostas
- O **Item Vendido** deve conter entre **5 e 50 caracteres**.
- O **Valor da Proposta** deve ser **positivo e maior que R$ 0,01**.
- O **Status da Proposta** sempre inicia como **"Aberto"**.
- O cadastro de status da proposta n�o precisa de tela, pois os valores s�o fixos.

### 3. Gest�o de Propostas
A aplica��o deve permitir:
- **Cadastrar uma nova proposta**
- **Alterar apenas o status e a data de finaliza��o da proposta**
  - Para cada altera��o, o usu�rio deve registrar uma **observa��o**
  - O sistema deve armazenar um **log** das altera��es realizadas, contendo:
    - Quem cadastrou a proposta
    - Quem alterou o status
    - Qual foi a descri��o da altera��o
    - Hor�rio da altera��o
- **Ap�s a finaliza��o de uma proposta, nenhuma altera��o ser� permitida**

### 4. Listagem de Propostas
- Criar uma tela para listar todas as propostas cadastradas.
- **N�o � necess�rio implementar pagina��o ou pesquisa.**
- As colunas exibidas devem ser:
  - **ID** (com link para visualizar os detalhes da proposta)
  - **Item Vendido**
  - **Valor**
  - **Status da Proposta**
  - **Data de Cadastro**
  - **Data de Finaliza��o**

## Tecnologias
O candidato tem liberdade para escolher as tecnologias do frontend, mas o backend deve ser desenvolvido utilizando **Laravel**.

## Entrega
- Disponibilizar o c�digo em um reposit�rio p�blico (GitHub, GitLab, Bitbucket).
- Criar um arquivo **README.md** com as instru��es para rodar o projeto:
  - Passos para configurar o ambiente
  - Como rodar as migrations e seeders
  - Informa��es sobre usu�rio e senha de teste para login (se houver necessidade)

## Crit�rios de Avalia��o
1. **Funcionamento**: O sistema atende a todos os requisitos funcionais?
2. **C�digo**: O c�digo est� bem estruturado, seguindo boas pr�ticas?
3. **Registro de altera��es**: A rastreabilidade das mudan�as est� bem implementada?
4. **Interface**: A interface � clara e intuitiva?

Boa sorte! ??

## **PASSO A PASSO RODAR APLICA��O**

### Aplica��o Laravel que cont�m o cadastro de proposta de venda, edi��o do status e data final e listagem das propostas
#### A aplica��o foi feita toda em Laravel 12 (�ltima vers�o at� a presente data). Na aplica��o n�o implementei o sistema de login, o log pega um usu�rio teste do banco de dados, mas j� deixe o log pr� pronto para conectar com o usu�rio autenticado faturamente.

### **Observa��o**
- � recomend�vel ter o docker rodando na m�quina para executar os passos abaixo

#### Fazendo uso do terminal, clone o projeto:
```powershell
git clone https://github.com/tiagotsc/laravel12.git
```   

#### Na pasta raiz (tem as pastas phpdocker, sistema e arquivos docker-compose.yml e README.md), rode:
```powershell
docker-compose up -d
```

#### Entre no container php com o comando:
```powershell
docker-compose exec php-fpm bash
```

#### Ainda dentro do container entre no diret�rio da aplica��o:
```powershell
cd laravel
```

#### Instale os pacotes com o seguinte comando:
```powershell
composer install
```

#### Cria as tabelas
```powershell
php artisan migrate
```

#### Alimenta as tabelas
```powershell
php artisan db:seed
```

#### No navegador, acesse a aplica��o atrav�s da seguinte URL:
- http://localhost

#### Tudo ocorrendo bem, voc�s ir�o se deparar com a seguinte tela:

![Tela inicial](tela-inicial.png "Tela inicial")
