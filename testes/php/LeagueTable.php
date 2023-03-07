<?php
/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

A classe LeagueTablr acompanha o score de cada jogador em uma liga. Depois de cada jogo, o score do jogador é salvo utilizando a função recordResult.

O Rank de jogar na liga é calculado utilizando a seguinte lógica:

1- O jogador com a pontuação mais alta fica em primeiro lugar. O jogador com a pontuação mais baixa fica em último.
2- Se dois jogadores estiverem empatados, o jogador que jogou menos jogos é melhor posicionado.
3- Se dois jogadores estiverem empatados na pontuação e no número de jogos disputados, então o jogador que foi o primeiro na lista de jogadores é classificado mais alto.


Implemente a funação playerRank que retorna o jogador de uma posição escolhida do ranking.

Exemplo:

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);


Todos os jogadores têm a mesma pontuação. No entanto, Arnold e Chris jogaram menos jogos do que Mike, e como Chris está acima de Arnold na lista de jogadores, ele está em primeiro lugar.

Portanto, o código acima deve exibir "Chris".


*/

class LeagueTable
{
    private array $standings;

	public function __construct(array $players)
    {
		$this->standings = array();
		foreach($players as $index => $p)
        {
			$this->standings[$p] = array
            (
                'index' => $index,
                'games_played' => 0, 
                'score' => 0
            );
        }
	}
		
	public function recordResult(string $player, int $score): void
    {
		$this->standings[$player]['games_played']++;
		$this->standings[$player]['score'] += $score;
	}
	
	public function playerRank(int $rank): string
    {
        uasort($this->standings, function ($a, $b) {
            if ($a['score'] != $b['score']) {
                return $b['score'] - $a['score'];
            } elseif ($a['games_played'] != $b['games_played']) {
                return $a['games_played'] - $b['games_played'];
            } else {
                return $a['index'] - $b['index'];
            }
        });
        
        $players = array_keys($this->standings);
        
        return $players[$rank - 1];
	}
}

// Para cada pessoa comparar o seus numeros de jogos e pontos, 
// o que tiver mais pontos com menor jogos ser o primeiro, caso esteja empatado retornar o primeiro que aparecer.
      
$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);
