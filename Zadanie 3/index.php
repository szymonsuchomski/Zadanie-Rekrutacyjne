<?php
    //stworzenie klasy RankingTable
    class RankingTable {
        private $players = [];

        //konstruktor
        public function __construct(...$names){
            foreach( $names as $name)
            {
                $this->players[$name] = [
                    'score' => 0,
                    'gamesPlayed' => 0
                ];
            }
        }

        //funkcja dodająca wynik do gracza
        public function recordResult($player, $score) {
            $this->players[$player]['score'] += $score;
            $this->players[$player]['gamesPlayed']++;
        }
    
        //funkcja zwracająca imię gracza na podanej pozycji
        public function playerRank($rank) {
            //sortowanie zgodnie z podanymi założeniami
            uasort($this->players, function($a, $b) {
                if ($a['score'] !== $b['score']) {
                    return $b['score'] - $a['score'];
                }
                if ($a['gamesPlayed'] !== $b['gamesPlayed']) {
                    return $a['gamesPlayed'] - $b['gamesPlayed'];
                }
                return 0;
            });
            
            //wyszukanie gracza na podanej pozycji
            $playersByRank = array_keys($this->players);
            if (isset($playersByRank[$rank - 1])) {
                return $playersByRank[$rank - 1];
            }
    
            return null;
        }
    }


    //przykładowe wykorzystanie programu
    $table = new RankingTable('Jan', 'Maks', 'Monika');

    $table->recordResult('Jan', 2);
    $table->recordResult('Maks', 5);
    $table->recordResult('Monika', 6);
    echo $table->playerRank(1)
?>