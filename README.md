# MicroCRM

Aplicacao de CRM enxuta criada com Laravel, Blade, Tailwind CSS e PostgreSQL. O objetivo e demonstrar um fluxo comercial simples: empresas, contatos, oportunidades, atividades e um dashboard autenticado.

## Stack

- PHP 8.3
- Laravel 13
- Laravel Breeze
- Blade
- Tailwind CSS
- PostgreSQL
- Vite

## Recursos Implementados

- Autenticacao com cadastro, login, redefinicao de senha e perfil.
- Dashboard com indicadores de empresas, contatos, oportunidades abertas e forecast ponderado.
- Cadastro, edicao, listagem e remocao de empresas.
- Cadastro, edicao, listagem e remocao de contatos vinculados a empresas.
- Estrutura de banco para oportunidades e atividades comerciais.
- Seeder com usuario e dados de demonstracao.

## Como Rodar

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure o PostgreSQL no `.env`:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=micro_crm
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

Crie o banco no PostgreSQL e rode as migrations:

```bash
php artisan migrate --seed
npm run build
php artisan serve
```

Usuario demo criado pelo seeder:

```text
email: demo@microcrm.test
senha: password
```

## Desenvolvimento

```bash
npm run dev
php artisan serve
```

## Testes

```bash
php artisan test
```
