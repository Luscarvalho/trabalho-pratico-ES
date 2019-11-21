# Padrões Adotados

## Regras de Verificação e Análise de Requisitos:

Especificação dos requisitos:
- Evitar frases com mais de 100 caracteres;
- Definir apenas uma funcionalidade por requisito;
- Evitar frases contendo palavras como: necessariamente, entretanto, mas, etc;
- Requisitos não funcionais devem ser verificáveis quantitativamente.
<br>

A nomenclatura dos requisitos seguirá a seguinte regra:
- RF[XXX]: Requisito Funcional;
	Onde XXX representa um número no esquema 001

- RNF[XXX]: Requisito Não Funcional número XXX.
	Onde XXX representa um número no esquema 001
<br>

## Mensagens de commit
- Usar modo imperativo ("Adiciona feature" não "Adicionando feature" ou "Adicionada feature")
- Primeira linha deve ter no máximo 72 caracteres
- Considere descrever com detalhes no corpo do commit
- Considere usar um emoji no início da mensagem de commit

Emoji | Code | Commit Type
------------ | ------------- | -------------
:tada: | `:tada:` | initial commit
:building_construction: | `:building_construction:` | quando melhorar a estrutura/formato do código
:hammer: | `:hammer:` | quando melhorar ou refatorar um código já existente
:memo: | `:memo:` | quando escrever alguma documentação
:bug: | `:bug:` | quando corrigir um bug
:heavy_check_mark: | `:heavy_check_mark:` | quando adicionar testes
:rocket: | `:rocket:` | nova feature
:arrow_up_down: | `:arrow_up_down:` | ao adicionar ou remover dependências.
:twisted_rightwards_arrows: | `:twisted_rightwards_arrows:` | merge em branchs
:rewind: | `:rewind:` | ao reverter versões
:whale: | `:whale:` | ao atualizar arquivos docker
:see_no_evil: | `:see_no_evil:` | gambiarra

[BASEADO EM](https://gist.github.com/viniciustpimenta/c58ada969cf30130f74c2daebf4f15cb)
<br>

## Práticas de codificação:

- Identar o código: 4 espaços para cada nível
- Colocar espaços dos dois lados dos operadores aritméticos
- Nomear variáveis e funções no modelo camelCase
- Nomear funçoes utilizando verbos no infinitivo
- Nomear variáveis utilizando subsantivos
- Criar variáveis no início do arquivo
