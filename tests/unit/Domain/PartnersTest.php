<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class PartnersTest extends TestCase
{
  private $Players = [];
  private $Partners;

  protected function setUp(): void
  {
    $this->Players[] = new Player("Player 1");
    $this->Players[] = new Player("Player 2");
    $this->Partners = new Partners($this->Players[0], $this->Players[1]);
  }
  
  function testHasPlayerIsTrue()
  {
    for($i = 0; $i<2; $i++) {
      $this->assertTrue($this->Partners->hasPlayer($this->Players[$i]));
    }
  }
  function testHasPlayerIsFalse()
  {
    $UnKnownPlayer = new Player("Testing");
    $this->assertFalse($this->Partners->hasPlayer($UnKnownPlayer));
  }
}
