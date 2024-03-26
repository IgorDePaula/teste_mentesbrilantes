Laravel
=======
Para rodar o projeto tenha os seguintes requisitis:

- Make
- docker (com docker compose)

Para executar siga os seguintes passos:

1. copie e cole o .env.example para .env (se houver necessidade altere as credenciais do banco de dados)
2. Execute na linha de comando: ```make docker-install```, ele instalará as dependências docker do projeto
3. Execute na linha de comando: ```make docker-migrate```, isso irá criar o banco de dados (pode ser que o mysql demore a subir alguns seguindos)
4. Execute na linha de comando: ```make docker-up```, isso fará com que o projeto esteja de pé

Por default a porta do projeto é 8000.
