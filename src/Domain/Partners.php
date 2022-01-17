<?php
declare(strict_types=1);
namespace Domain;

class Partners
{
  private $Players;
  function __construct(Player $Player1, Player $Player2)
  {
    $this->Players = [$Player1, $Player2];
  }
  
  function hasPlayer(Player $Player)
  {
    return in_array($Player, $this->Players);
  }

}
