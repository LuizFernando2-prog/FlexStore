## FlexStore

### Tecnologias Utilizadas:
- **PHP:** Utilizado para a lógica de back-end e interação com o banco de dados.
- **Bootstrap:** Framework front-end para o desenvolvimento de interfaces responsivas e amigáveis.
- **MySQL:** Sistema de gerenciamento de banco de dados relacional para armazenamento de dados.

### Pontos Positivos de Utilizar as Tecnologias Escolhidas:
1. **PHP:** Linguagem robusta e amplamente utilizada, com uma grande comunidade de suporte e vasta documentação.
2. **Bootstrap:** Facilita o desenvolvimento de interfaces de usuário visualmente atraentes e responsivas, com um conjunto de componentes pré-construídos.
3. **MySQL:** Banco de dados confiável e de alto desempenho, com suporte para consultas SQL poderosas e eficientes.

### Pontos Negativos de Utilizar as Tecnologias Escolhidas:
1. **PHP:** Pode ser propenso a vulnerabilidades de segurança se não for utilizado corretamente, como injeção de SQL e XSS.
2. **Bootstrap:** Pode gerar páginas com um código HTML mais pesado e complexo, o que pode afetar o desempenho do site.
3. **MySQL:** Pode ser menos adequado para cenários de escalabilidade extrema em comparação com bancos de dados NoSQL.

### Não Utilização de Framework:
Optei por não utilizar um framework devido à simplicidade da aplicação. Pontos positivos incluem:
- **Flexibilidade:** Sem um framework, tenho total liberdade para estruturar o código de acordo com as necessidades específicas do projeto.
- **Simplicidade:** Evitar a sobrecarga de aprender um novo framework pode acelerar o desenvolvimento e simplificar a manutenção.
- **Conhecimento Profundo:** Desenvolver sem um framework permite um entendimento mais profundo dos conceitos fundamentais da linguagem e da arquitetura do aplicativo.

Pontos negativos incluem:
- **Reinventar a Roda:** Sem um framework, pode ser necessário desenvolver soluções para problemas comuns que já foram abordados em frameworks estabelecidos.
- **Falta de Convenções:** A ausência de um framework pode resultar em uma falta de padrões de codificação e arquitetura, dificultando a colaboração e a manutenção do código.
- **Complexidade Futura:** Projetos sem um framework podem se tornar mais difíceis de manter à medida que crescem em escopo e complexidade, devido à falta de uma estrutura definida.

### Configuração do Projeto:
1. **XAMPP:** Instale o XAMPP, que inclui Apache, MySQL, PHP e phpMyAdmin.
2. **Localhost:** Coloque os arquivos do projeto dentro da pasta `htdocs` do diretório XAMPP.
3. **Banco de Dados:** Importe o arquivo SQL `create.sql` para criar o banco de dados e as tabelas necessárias.
4. **Config.php:** Configure o arquivo config.php na pasta config com as credenciais do seu banco de dados.
5. **Acesso ao Projeto:** Acesse o projeto através do navegador usando o seguinte URL: `http://localhost/flexstore/app/views/products/index.php`.

### Arquitetura MVC:
A arquitetura utilizada é o Modelo-Visão-Controlador (MVC), com um ponto positivo sendo a separação clara de responsabilidades entre a lógica de negócios (Modelo), a interface do usuário (Visão) e o controle do fluxo de dados (Controlador). Um ponto negativo é que a estruturação inicial pode ser mais complexa e exigir mais tempo em comparação com outras abordagens mais simples.

Para criar o diagrama do banco de dados, podemos representar visualmente a estrutura das tabelas e seus relacionamentos. Aqui está o diagrama para o seu banco de dados FlexStore:

```
                    +------------------+
                    |    categories    |
                    +------------------+
                    | id (PK)          |
                    | name             |
                    +------------------+
                            |
                            |
                            |
                            V
                    +------------------+
                    |  subcategories   |
                    +------------------+
                    | id (PK)          |
                    | name             |
                    | category_id (FK) |
                    +------------------+
                            |
                            |
                            |
                            V
                    +------------------+
                    |     products     |
                    +------------------+
                    | id (PK)          |
                    | name             |
                    | description      |
                    | category_id (FK) |
                    | subcategory_id (FK)|
                    | image            |
                    +------------------+
```

Neste diagrama:
- Cada tabela é representada por um retângulo.
- Os campos de cada tabela são listados dentro do retângulo, com a chave primária (PK) em destaque.
- As setas indicam os relacionamentos entre as tabelas, onde a chave estrangeira (FK) em uma tabela faz referência à chave primária correspondente em outra tabela.

Esse diagrama mostra que:
- A tabela `categories` armazena as categorias dos produtos.
- A tabela `subcategories` armazena as subcategorias, relacionadas às categorias.
- A tabela `products` armazena os produtos, relacionados tanto às categorias quanto às subcategorias.