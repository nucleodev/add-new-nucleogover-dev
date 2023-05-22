# Testes para novos NúcleoGovers
## Teste 01: Lógica Condicional - Sequência de Fibonacci usando PHP

**Descrição:**
Neste teste, você será desafiado a criar um script em PHP capaz de imprimir a sequência de Fibonacci. A sequência de Fibonacci é uma série de números em que cada número é a soma dos dois números anteriores. Por exemplo, a sequência começa com 0 e 1, e os próximos números são calculados somando os dois números anteriores: 0, 1, 1, 2, 3, 5, 8, 13, 21, ...

**Instruções:**
Escreva um script em PHP que receba um número inteiro positivo como entrada, calcule e devolva o número presente na sequência Fibonacci para a posição informada. O script deve ser capaz de lidar com números grandes, evitando erros de overflow.

**Critérios de Avaliação:**
* O script deve estar escrito em PHP.
* O script deve receber um número inteiro positivo como entrada.
* O script deve calcular e imprimir corretamente o número da sequência Fibonacci para a posição inserida
* O script deve lidar adequadamente com números grandes, evitando erros de overflow.
* A solução deve ser eficiente e não deve causar lentidão excessiva para números grandes.

Dica: Você pode utilizar loops, recursão ou qualquer outra abordagem que preferir para calcular a sequência de Fibonacci. Lembre-se de testar sua solução com diferentes valores de entrada para garantir seu funcionamento e eficiência.

---
# Teste 02: Wordpress - Criação de blocos de consulta

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
- Seguir o modelo sugerido, presente no arquivo modelo.pdf
