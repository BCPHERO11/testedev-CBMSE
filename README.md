# Aplicação para a Prova Prática CBMSE -- CRUD de Produtos com Relacionamento de Categorias

---

## Configurando o ambiente
A aplicação utiliza docker para facilitar a configuração e execução do projeto.

### Requisitos de Instalação
 - Docker
 - Docker Compose

### Iniciando o ambiente
1. Clonando o repositório
    ```bash
    git clone https://github.com/BCPHERO11/testedev-CBMSE.git
    cd testedev-CBMSE
    ```

2. Subindo os contêineres no docker
    ```bash
    docker compose up --build
    ```

3. Acessando o contêiner da aplicação:
    ```bash
    docker exec -it laravel_app bash 
    ```

4. Dentro do contêiner, é necessário executar os seguites comandos
    ```bash
    composer install
    php artisan key:generate
    npm install
    npm run build
    ```
Com esses comandos iremos configurar nossos pacotes do php e do node
    
5. Para montarmos o banco de dados usamos o comando
    ```bash
    php artisan migrate
    ```

---

## Acessando a aplicação
Com o amiente configurado a aplicação deve estar no endereço: [CRUDS](http://localhost:8078)