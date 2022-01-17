<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use Domain\Player;
use Domain\Partners;
use PHPUnit\Framework\TestCase;

class PartnersTest extends TestCase
{

  private $Player1;
  private $Player2;
  private $Partners;
  protected function setUp(): void
  {
    $this->Player1 = new Player("Player 1");
    $this->Player2 = new Player("Player 2");
    $this->Partners = new Partners($this->Player1, $this->Player2);
  }
  
  function testHasPlayerIsTrue()
  {
    $this->assertTrue($this->Partners->hasPlayer($this->Player1));
  }
  function testHasPlayerIsFalse()
  {
    $UnKnownPlayer = new Player("Testing");
    $this->assertFalse($this->Partners->hasPlayer($UnKnownPlayer));
  }
}
