<div align="center">
    
  ![Descrição do GIF](https://res.cloudinary.com/dgztg4ry9/image/upload/v1778105610/1gif_pnvoot.gif)
  
</div>

# Cliento

Aplicação de CRM enxuta criada com Laravel, Blade, Tailwind CSS e PostgreSQL. O objetivo é demonstrar um fluxo comercial simples: empresas, contatos, oportunidades, atividades e um dashboard autenticado.

## Stacks

- PHP 8.3;
- Laravel 13;
- Laravel Breeze;
- Blade;
- Tailwind CSS;
- PostgreSQL;
- Vite.

## Recursos Implementados

- Autenticação com cadastro, login, redefinição de senha e perfil;
- Dashboard com indicadores de empresas, contatos, oportunidades abertas e forecast ponderado;
- Cadastro, edição, listagem e remoção de empresas;
- Cadastro, edição, listagem e remoção de contatos vinculados a empresas;
- Estrutura de banco para oportunidades e atividades comerciais;
- Seeder com usuário e dados de demonstração.

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

Usuário demo criado pelo seeder:

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
<div align="center">
    
  ![Descrição do GIF](https://res.cloudinary.com/dgztg4ry9/image/upload/v1778105740/2gif_jecjr8.gif)
  
</div>
