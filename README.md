# Descrição do projecto 

Este projecto visa desenvolver um Sistema Web de Gestão de Biblioteca Virtual, focado em disponibilizar 
material bibliográfico exclusivo e acessível para estudantes matriculados nos institutos Lore, Foco e IsLore.

O projecto será desenhado para permitir o gerenciamento de materiais (livros e audiolivros), usuários (estudantes) e categorias de forma simples, intuitiva e eficiente, com foco na visualização segura do conteúdo. 

# Requisitos funcionais do sistema

## 1. Autenticação e controle de acesso

- O sistema deve permitir **login** e **logout** de usuários.
- Deve autenticar somente estudantes das instituições **Lore**, **Foco** e **IsLore.**
- Deve validar se o usuário está **ativo**.
- Deve registrar **logs de auditoria** de login, com timestamp e IP.
- Deve restringir acesso a rotas e conteúdos por nível de permissão (Admin, Estudante).

## 2. Gerenciamento de Usuários

- O sistema deve permitir **cadastro de estudantes** com nome, endereço, telefone, e-mail, instituição.
- Deve permitir **listagem, edição e inativação** de usuários.
- Deve permitir o **encadeamento de validações** (formato de e-mail, máscara de telefone).
- Deve permitir **visualização do histórico de empréstimos** do usuário.
- Deve permitir que o Admin **promova ou altere o perfil** do usuário (por exemplo, para Bibliotecário/Admin).

## 3. Gerenciamento de Categorias e Subcategorias

- Deve permitir **cadastro de Categorias** (ex: Tecnologia, Saúde).
- Deve permitir **cadastro de Subcategorias** vinculadas a Categorias.
- Deve permitir **edição, listagem e remoção lógica (inativação)** de Categorias e Subcategorias.
- Deve impedir exclusão física quando houver materiais associados.

## 4. Gerenciamento de Materiais (Livros e Audiolivros)
- Deve permitir o **cadastro de materiais** com título, autor, editora, ano, tipo, subcategoria, arquivo protegido e capa.
- Deve permitir **upload seguro** para pasta privada no servidor.
- Deve permitir **edição, listagem com filtros e paginação.**
- Deve permitir **remoção lógica (status inativo)** dos materiais.
- Deve validar **duplicidade de título** sob mesma editora e subcategoria.

## 5. Visualização de Materiais

- Deve permitir que estudantes **visualizem livros online**, via PDF em iframe, sem download ou impressão.
- Deve permitir que estudantes **ouçam audiolivros online**, em player sem download.
- Deve proteger arquivos por **rotas seguras**, sem expor caminho real.

## 6. Fluxo de Empréstimos e Devoluções

- Deve permitir **registrar empréstimo**, selecionando estudante ativo, material disponível e datas.
- Deve usar **transações de banco de dados** para consistência.
- Deve calcular **multa automática** de R$ 1/dia em caso de atraso na devolução.
- Deve permitir **devolução**, atualizando estoque e status.
- Deve manter **histórico completo** de todas as transações.

## 7. Relatórios

- Deve gerar **relatório de livros disponíveis** em CSV ou PDF.
- Deve gerar **relatório de empréstimos** com filtros por período, usuário, livro.
- Deve permitir **exportar e enviar relatórios por e-mail** (SMTP simples).

# Requisitos não funcionais do sistema

## 1. Segurança
- O sistema deve proteger contra CSRF, XSS e SQL Injection.
- Deve proteger uploads em storage privado sem link direto.
- Deve validar dados no front-end e no back-end.

## 2. Desempenho
- Deve usar índices no banco de dados para melhorar consultas.
- Deve ter paginação em tabelas grandes e filtros dinâmicos.
- Deve suportar carregamento assíncrono (AJAX) se necessário.

## 3. Usabilidade
- O front-end deve ser responsivo, adaptado para desktop e tablets (Bootstrap).
- Deve ter layout claro, intuitivo, com formulários bem validados.
- Deve garantir navegação protegida e retorno claro de erros.

## 4. Manutenibilidade
- O código deve seguir padrões PSR-12 (Laravel).
- Deve usar separação de camadas (Controllers, Services, Repositories).
- Deve ter testes unitários com cobertura mínima de 70% para regras críticas.
- Deve ter pipelines automáticos (CI/CD) que rodem testes antes de merges (ex: GitHub Actions).

## 5. Ambiente
- Deve rodar localmente em ambiente controlado (XAMPP ou Docker).
- Deve versionar banco de dados com migrations e seeders.
- Deve ter repositório Git com branches claros e histórico limpo.

# Product Backlog

| ID   | User Story                                                                 | Prioridade | Responsável         |
|------|-----------------------------------------------------------------------------|------------|-----------------|
| US01 | Como estudante, quero fazer login para acessar livros e audiolivros.       | Alta       | Ofice        |
| US02 | Como estudante, quero cadastrar-me no sistema. | Média       | Ofice
| US03 | Como admin, quero cadastrar novos estudantes com nome, e-mail e instituição. | Alta       | Ofice        |
| US04 | Como admin, quero editar, listar e inativar usuários.                      | Alta       | Ofice        |
| US05 | Como admin, quero cadastrar categorias e subcategorias de materiais.       | Média      | Ofice        |
| US06 | Como admin, quero cadastrar livros e audiolivros com upload seguro.        | Alta       | Ofice        |
| US07 | Como estudante, quero visualizar livros em PDF sem download.               | Alta       | Ofice        |
| US08 | Como estudante, quero ouvir audiolivros online sem baixar.                 | Alta       | Ofice       |
| US09 | Como admin, quero registrar empréstimos de materiais para estudantes.      | Alta       | Ofice        |
| US10 | Como admin, quero registrar devoluções e calcular multa por atraso.        | Alta       | Ofice      |
| US11 | Como admin, quero gerar relatórios de livros disponíveis em CSV/PDF.       | Média      | Ofice        |
| US12 | Como admin, quero gerar relatórios de empréstimos com filtros por período. | Média      | Ofice       |
| US13 | Como admin, quero enviar relatórios por e-mail automaticamente.            | Baixa      | Ofice        |
| US14 | Como sistema, quero registrar logs de login para auditoria.                | Alta       | Ofice       |

# Sprints

As sprints têm duração de 4 dias úteis, com o último período de 2 dias para refinamentos finais. 

| Fase         | Datas (dia) | Objetivos                                                                                      |
|--------------|--------------|------------------------------------------------------------------------------------------------|
| Planejamento | 1 – 2         | Refinamento de requisitos, criação de user stories, estimativas, design UML inicial.          |
| Sprint 1     | 3 – 6         | CRUD de Materiais: migrations, models, controllers e views; validações e testes unitários.    |
| Sprint 2     | 7 – 10        | CRUD de Usuários e Autenticação: login, middleware e testes de autorização.                   |
| Sprint 3     | 11 – 14       | Empréstimos e Devoluções: lógica transacional, protocolo, cálculo de multas, testes integrados. |
| Finalização  | 15 – 18       | Documentação completa, testes de regressão, CI/CD, refinamentos e entrega final.             |

# Diagramas da UML

## 1. Diagrama de Entidade Relacionamento (ERD)

![Digrama de Entidade Relacionamento!](/resources/assets/images/Diagrama%20de%20ER.drawio.png "DER")

## 2. Diagrama de classes 

![Digrama de classes!](/resources/assets/images/Class%20Diagram0.png "Class Diagram")

## 3. Diagrama de Caso de Uso

![Digrama de Caso de Uso!](/resources/assets/images/UseCase%20Diagram0.png "Use Case")

### 3.1. Especificações de caso de uso

---

#### 3.1.1. Fazer Login

**Ator(es):** Convidado, Bibliotecário, Administrador  
**Descrição:** Permite ao usuário acessar o sistema com credenciais válidas.  
**Fluxo Principal:**  
1. Usuário acessa tela de login.  
2. Informa e-mail e senha.  
3. Sistema valida dados.  
4. Registra auditoria de login.  
5. Redireciona para Dashboard.  
**Pré-condição:** Usuário cadastrado e ativo.  
**Pós-condição:** Sessão iniciada.

---

#### 3.1.2. Registrar Auditoria de Login

**Ator:** Sistema  
**Descrição:** Registra tentativa de login com data, IP e resultado.  
**Fluxo Principal:**  
1. A cada tentativa de login, o sistema armazena registro em tabela de logs.  
**Pré-condição:** Tentativa de login feita.  
**Pós-condição:** Log registrado.

---

#### 3.1.3. Fazer Logout

**Ator:** Convidado, Bibliotecário, Administrador  
**Descrição:** Encerra a sessão ativa do usuário.  
**Fluxo Principal:**  
1. Usuário clica em “Logout”.  
2. Sistema destrói sessão e redireciona para página inicial.  
**Pré-condição:** Sessão iniciada.  
**Pós-condição:** Sessão encerrada.

---

#### 3.1.4. Fazer Cadastro

**Ator:** Convidado, Bibliotecário, Administrador  
**Descrição:** Registra novo usuário (estudante) no sistema.  
**Fluxo Principal:**  
1. Usuário preenche formulário de cadastro.  
2. Sistema valida dados.  
3. Registra novo usuário com status inicial.  
**Pré-condição:** Nenhuma.  
**Pós-condição:** Usuário criado.

---

#### 3.1.5. Visualizar Livro

**Ator:** Convidado, Bibliotecário, Administrador  
**Descrição:** Permite acessar um livro online sem download.  
**Fluxo Principal:**  
1. Usuário seleciona livro.  
2. Sistema valida permissão e status ativo.  
3. Abre PDF protegido em iframe.  
**Pré-condição:** Usuário autenticado.  
**Pós-condição:** Livro exibido online.

---

#### 3.1.6. Fazer Empréstimo

**Ator:** Convidado  
**Descrição:** Solicita ou registra empréstimo de material.  
**Fluxo Principal:**  
1. Usuário escolhe material disponível.  
2. Sistema verifica status ativo e saldo de empréstimos.  
3. Cria registro com data de retirada e devolução.  
4. Atualiza estoque.  
**Pré-condição:** Usuário autenticado e ativo.  
**Pós-condição:** Empréstimo ativo.

---

#### 3.1.7. Visualizar Meus Empréstimos

**Ator:** Convidado  
**Descrição:** Permite ao usuário verificar seus empréstimos ativos e devolvidos.  
**Fluxo Principal:**  
1. Usuário acessa seção “Meus Empréstimos”.  
2. Sistema busca histórico.  
3. Exibe lista com datas e status.  
**Pré-condição:** Usuário autenticado.  
**Pós-condição:** Histórico visível.

---

#### 3.1.8. Gerenciar Materiais

**Ator:** Bibliotecário, Administrador  
**Descrição:** CRUD de livros/audiolivros.  
**Fluxo Principal:**  
1. Admin/Bibliotecário cadastra, edita ou inativa materiais.  
2. Valida uploads e metadados.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Acervo atualizado.

---

#### 3.1.9. Gerenciar Usuários

**Ator:** Bibliotecário, Administrador  
**Descrição:** CRUD de estudantes, bibliotecários e permissões.  
**Fluxo Principal:**  
1. Admin/Bibliotecário cadastra ou edita usuários.  
2. Pode inativar, reativar ou consultar histórico.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Base de usuários atualizada.

---

#### 3.1.10. Gerenciar Curso

**Ator:** Bibliotecário, Administrador  
**Descrição:** CRUD de cursos vinculados a estudantes.  
**Fluxo Principal:**  
1. Admin/Bibliotecário cadastra ou edita cursos.  
2. Atualiza vínculo com estudantes.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Cursos atualizados.

---

#### 3.1.11. Gerenciar Categoria

**Ator:** Bibliotecário, Administrador  
**Descrição:** CRUD de categorias de materiais.  
**Fluxo Principal:**  
1. Admin/Bibliotecário cria, edita ou inativa categorias.  
2. Vincula subcategorias.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Categorias atualizadas.

---

#### 3.1.12. Gerenciar Subcategoria

**Ator:** Bibliotecário, Administrador  
**Descrição:** CRUD de subcategorias de materiais.  
**Fluxo Principal:**  
1. Admin/Bibliotecário cria, edita ou inativa subcategorias.  
2. Vincula a categorias.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Subcategorias atualizadas.

---

#### 3.1.13. Gerenciar Relatórios

**Ator:** Bibliotecário, Administrador  
**Descrição:** Geração de relatórios de acervo e empréstimos.  
**Fluxo Principal:**  
1. Admin/Bibliotecário aplica filtros.  
2. Gera PDF ou CSV.  
3. Pode enviar por e-mail.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Relatórios gerados.

---

#### 3.1.14. Promover Usuário a Administrador ou Bibliotecário

**Ator:** Bibliotecário, Administrador  
**Descrição:** Eleva permissões de outro usuário.  
**Fluxo Principal:**  
1. Admin/Bibliotecário seleciona usuário.  
2. Define nova role (Bibliotecário ou Admin).  
3. Sistema atualiza permissões.  
**Pré-condição:** Acesso administrativo.  
**Pós-condição:** Permissões atualizadas.

---


### 4. Diagrama de Sequência 
#### 4.1. Login

![Digrama de Sequência!](/resources/assets/images/login.png "Sequence Diagram login")

#### 4.2. Visualização de Materiais

![Digrama de Sequência visualização de materiais!](/resources/assets/images/Sequence%20Diagram2%20visualizacao%20de%20materiais.png "Sequence Diagram view materials")

#### 4.3. Empréstimo

![Digrama de Sequência Empréstimo!](/resources/assets/images/Sequence%20Diagram1%20emprestimo.png "Sequence Diagram view materials")

#### 4.4. Cadastro de estudante

![Digrama de Sequência cadastro de estudante!](/resources/assets/images/Sequence%20Diagram3%20cadastro.png "Sequence Diagram cadastro")

#### 4.5. Promover usuário

![Digrama de Sequência promoção de usuário!](/resources/assets/images/Sequence%20Diagram4%20promover.png "Sequence Diagram promoção")

#### 4.6. CRUD de usuários

![Digrama de Sequência CRUD de usuarios!](/resources/assets/images/Sequence%20Diagram5%20CRUD%20users.png "Sequence Diagram CRUD users")

#### 4.7. CRUD de materiais

![Digrama de Sequência CRUD de usuarios!](/resources/assets/images/Sequence%20Diagram6%20CRUD%20materias.png "Sequence Diagram CRUD materials")

#### 4.9. Relatório

![Digrama de Sequência relatório!](/resources/assets/images/Sequence%20Diagram7%20Relatorios.png "Sequence Diagram relatório")

#### 4.2. DEvolução

![Digrama de Sequência devolução!](/resources/assets/images/Sequence%20Diagram8%20Devolucao.png "Sequence Diagram devolução")

## 1. Tecnologias e Ferramentas

Para viabilizar um desenvolvimento produtivo e de qualidade, serão adotadas as seguintes tecnologias e ferramentas:

- **Back-end (Laravel 10+)**  
  Framework maduro que oferece estrutura sólida para rotas, controllers, Eloquent ORM, Form Requests para validações e sistema de autenticação integrado. Facilita a adoção de padrões PSR e separação de responsabilidades.

- **Banco de Dados (MySQL 8+)**  
  Ampla aceitação no mercado corporativo e compatibilidade com Laravel. Será utilizado por meio de migrations para versionamento de esquema e seeders para dados iniciais.

- **Front-end (HTML5, CSS3, JavaScript)**  
  Linguagens base para construção de interfaces web. Adicionalmente, a biblioteca **Bootstrap** será empregada para acelerar a criação de layouts responsivos, enquanto **jQuery** auxiliará em chamadas AJAX simples, quando necessário.

- **Controle de Versão (Git + GitHub/GitLab)**  
  Histórico de alterações, criação de branches por funcionalidade e pull requests para revisão de código mesmo em equipe de um único desenvolvedor.

- **Gerenciamento Ágil (Scrum)**  
  Metodologia ágil com sprints curtos de 4 dias úteis, permitindo entregas frequentes e feedback rápido.

- **Ferramenta de Backlog (Trello ou planilha)**  
  Organização de stories e tarefas, com campos de descrição, responsáveis e status.

- **Ambiente de Desenvolvimento (XAMPP ou Docker)**  
  Ambiente local com PHP, MySQL e servidor web. Docker opcional para simular produção.

Cada tecnologia e ferramenta tem um papel claro no fluxo de trabalho, reduzindo complexidade técnica e suportando a visão de produto incremental.



