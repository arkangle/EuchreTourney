<?php
declare(strict_types=1);
require __DIR__ . "/../../../vendor/autoload.php";
use Domain\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
  private $playerName = "Player1";
  private $Player;
  protected function setUp(): void
  {
    $this->Player = new Player($this->playerName);
  }

  function testGetName(): void
  {
    $this->assertEquals($this->playerName, $this->Player->getName());
  }
}

