<?php
class RankingTable{
    public $players = array();
    function __construct($playerNames) {
        foreach ($playerNames as $playerName) {
            $this->players[$playerName] = array(
                'score' => 0,
                'gamesPlayed' => 0
            );
        }
      }
      public function recordResult($playerName, $score) {
        if (isset($this->players[$playerName])) {
            $this->players[$playerName]['score'] += $score;
            $this->players[$playerName]['gamesPlayed']++;
        }
    }

    public function playerRank($rank) {
        $rankedPlayers = $this->players;

        uasort($rankedPlayers, function ($player1, $player2) {
            if ($player1['score'] !== $player2['score']) {
                return $player2['score'] <=> $player1['score'];
            } elseif ($player1['gamesPlayed'] !== $player2['gamesPlayed']) {
                return $player1['gamesPlayed'] <=> $player2['gamesPlayed'];
            } else {
                return -1;
            }
        });

        $rankedPlayerNames = array_keys($rankedPlayers);

        if (isset($rankedPlayerNames[$rank - 1])) {
            return $rankedPlayerNames[$rank - 1];
        } else {
            return null;
        }
    }


}
?>