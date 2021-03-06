<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

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

