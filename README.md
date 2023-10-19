# Teste Técnico para novos NúcleoGovers

**Edição Outubro/2023**

## Como iniciar:

- Faça um fork deste repositório e execute o push do código-fonte criado.
- Nos encaminhe por e-mail, previamente uma estimativa em horas de desenvolvimento, e seu prazo (data) limite de entrega.
  - A estima de horas consiste no quanto de esforço considera necessário para a conclusão - requisito para entendermos que aceitou o desafio. O prazo limite, se refere a uma data, até onde podemos aguardar sua entrega ou considerar sua desistência pela vaga.
  - Nosso processo de contratação não possui limite de encerramento. Realizamos rodadas de entrevistas e testes técnicos com os candidatos, até ter o match do perfil técnico e compotamental com a vaga.
- Nosso e-mail para contato e envio dos prazos, ou dúvidas: talentos@nucleogov.com.br

---
# Teste Wordpress - Criação de blocos de consulta

**Descrição**

Neste teste, queremos analisar sua afinidade com os métodos de consulta do WordPress, e capacidade para criação de blocos especiais.
Crie um bloco para consulta e listagem de posts publicados, que exiba as últimas matérias publicadas, paginando a consulta em 4 itens por página.
Resolução do teste

## Para resolver o teste, você deve:
- Criar e inicializar um tema base simples com arquivo da home
- Criar as classes necessárias para compilação do bloco de consulta de posts
- Exibir a consulta dos posts na home do site, inserindo o bloco na Page definida como Home nas configurações do painel
- O bloco deve ser inserido usado o editor de site do WordPress

No front-end, os cards de matérias devem exibir:

- A thumbnail do post
- Título
- Botão Leia mais.
- A paginação dos posts

## Diferenciais para o teste
- O bloco ter suporte à shortcode usando a função `do_shortcode();` (opcional)
- Criar a single de leitura dos posts. (opcional)
- Seguir o modelo sugerido, presente no arquivo modelo do repositório
