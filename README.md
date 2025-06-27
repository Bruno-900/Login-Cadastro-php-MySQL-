# 🔐 Sistema de Login em PHP

Este projeto é um sistema simples de login de usuários, desenvolvido em PHP com suporte a sessões e conexão com banco de dados MySQL. Ele serve como base para aplicações que requerem autenticação de usuários.

## 📸 Captura de Tela

## Login
![Captura de tela 2025-06-27 153509](https://github.com/user-attachments/assets/c2b3015c-3dc7-407b-9159-e1032a14a954)

## Cadastro

## Pagina principal (usuario logado)

![Captura de tela 2025-06-27 153535](https://github.com/user-attachments/assets/2acc16e3-57d3-48e6-ab1e-636938d9d40f)

## 🚀 Funcionalidades

- Cadastro de usuários
- Login com verificação de senha (criptografada)
- Sessões para controle de acesso
- Logout
- Feedback de erro para login inválido

## 🛠️ Tecnologias Utilizadas

- PHP (versão 7+ ou 8)
- MySQL
- HTML5 & CSS3
- (Opcional) Bootstrap para layout responsivo

## ⚙️ Como Usar

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
Importe o banco de dados:

Crie um banco de dados no MySQL (ex: sistema_login)

Importe o arquivo banco.sql (se houver) no phpMyAdmin ou via terminal

Configure a conexão com o banco de dados:

Abra o arquivo conexao.php ou similar

Ajuste as variáveis de conexão:

php
Copiar
Editar
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sistema_login';
Rode o projeto localmente usando um servidor PHP (XAMPP, WAMP, Laragon, etc):

Copie os arquivos para a pasta htdocs

Acesse via navegador: http://localhost/Sistema de Login/

🧾 Estrutura de Pastas
pgsql
Copiar
Editar
Sistema de Login/
├── index.php
├── login.php
├── cadastro.php
├── conexao.php
├── logout.php
└── README.md
