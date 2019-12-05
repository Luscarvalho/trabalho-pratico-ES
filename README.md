# TRABALHO PRÁTICO ENGENHARIA DE SOFTWARE 2019/2
Repositório para o trabalho prático de Engenharia de Software

## Equipe Chomsky 
<img src="https://i.ibb.co/5xvsnvH/logo-chomsky.png" height="150" width="150">

### Integrantes:
- Gabriela Rodrigues
- Lucas de Carvalho

<br><br>

## Projeto

### Planilha com as tarefas do trabalho:
https://docs.google.com/spreadsheets/d/1FQvOTPGXo6NEMVj79Aovx7LCH5Q4Tsr-ycxp82Z3B_I/edit#gid=1743131327

- [x] Fase 0
- [x] Fase 1
- [x] Fase 2
- [ ] Fase 3



### Tecnologias utilizadas:

Tecnologia     |     Versão
---------------|:-------------:
Windows 10 | 10/2019
Visual Estudio Code | 1.38
HTML | 5
CSS | 4
XAMPP | 7.3.9
Apache | 2.4.41
PHP | 7.3.9
phpMyAdmin | 4.9.0.1
Materialize | 1.0.0

<br><br>

## Proposta do sistema:
O sistema tem como finalidade implementar um simulador de batalhas Pokémon. Para isso os treinadores deverão estar cadastrado dentro do banco de dados do sitema, juntamente com os pokémon. As simulações são feitas apartir de calculos, levando em conta o nível do treinador e o tipo do pokémon.
Ao batalhar, o treinador deve escolher um oponente e os pokemons que irão batalhar. Durante a batalha, o sistema, faz a leitura dos dados do treinador e do pokemon para atribuir os pontos da batalha, ganha quem tiver a maior pontuação. Após a batalha, o sistema atualiza os dados do pokémon e do treinador. Para finalizar, a batalha é salva no banco de dados para consultas posteriores.

### Tabelas:
Treinador <br>
(__TreinadorID__, nomeTreinador, senha, foto, vitorias, derrotas, nivel)

Treinador_pokemon<br>
(__TreinadorId__, pokemon1, pokemon2, pokemon3, pokemon4, pokemon5, pokemon6)

Pokemon <br>
(__pokemonId__, nomePokemon, imagem, tipoId)

Tipo <br>
(__tipoId__, tipoNome, forca,fraqueza, imagem)

PokemonNivel<br>
(__treinadorId__, pokemonId, vitorias, derrotas, nivel)

Batalha <br>
(__numBatalha__, treinador1, treinador2, ganhador)

