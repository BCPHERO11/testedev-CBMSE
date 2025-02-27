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
    docker compose up -d --build
    ```

3. Verifique se os contêineres estão criados com o comando
    ```bash
    docker ps
    ```

4. Crie uma cópia do arquivo nomeado ".env.example" dentro do próprio diretório e o renomeie para ".env" apenas.

5. Acessando o contêiner da aplicação:
    ```bash
    docker exec -it laravel_app bash 
    ```

6. Dentro do contêiner, é necessário executar os seguites comandos para configurar nossos pacotes do php e do node
    ```bash
    composer install
    php artisan key:generate
    npm install
    npm run build
    ```
    
7. Para montarmos o banco de dados usamos o comando
    ```bash
    php artisan migrate
    ```

---

## Acessando a aplicação
Com o amiente configurado a aplicação deve estar no endereço: [CRUDS](http://localhost:8078/home)