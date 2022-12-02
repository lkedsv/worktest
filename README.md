PROJETO EGETTEST

> CRIAR BASE POSTGRESQL:

CREATE DATABASE "eGetTestDB"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

> CRIAR PROJETO

composer create-project laravel/laravel egettest

> TERMINAL:

php artisan serve

> Arquivo .env:

APP_NAME=eGetTestAPP
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=eGetTestDB
DB_USERNAME=postgres
DB_PASSWORD=123 (SENHA DO SGBD)


> Gerar as primeiras tabelas (user model e cliente model):

> TERMINAL:

php artisan make:migration create_clientes_table

php artisan migrate




> OU SQL PARA a TABELA CLIENTES:

-- Table: public.clientes

-- DROP TABLE IF EXISTS public.clientes;

CREATE TABLE IF NOT EXISTS public.clientes
(
    id bigint NOT NULL DEFAULT nextval('clientes_id_seq'::regclass),
    nome character varying(255) COLLATE pg_catalog."default" NOT NULL,
    cpf character varying(255) COLLATE pg_catalog."default" NOT NULL,
    categoria character varying(255) COLLATE pg_catalog."default" NOT NULL,
    cep character varying(255) COLLATE pg_catalog."default" NOT NULL,
    rua text COLLATE pg_catalog."default" NOT NULL,
    bairro text COLLATE pg_catalog."default" NOT NULL,
    uf character varying(255) COLLATE pg_catalog."default" NOT NULL,
    complemento text COLLATE pg_catalog."default" NOT NULL,
    telefone character varying(255) COLLATE pg_catalog."default" NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT clientes_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.clientes
    OWNER to postgres;







