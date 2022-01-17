<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use Domain\Player;
use Domain\PlayerCollection;
use PHPUnit\Framework\TestCase;

class PlayerCollectionTest extends TestCase
{
  use \phpmock\phpunit\PHPMock;

  private $PlayerCollection;
  protected function setUp(): void
  {
    $this->PlayerCollection = new PlayerCollection();
    for($i = 1; $i<=4; $i++) {
      $this->PlayerCollection->add(new Player("Player $i"));
    }
  }

  function testAddWithValidType()
  {
    $test = new Player("test");
    try {
      $this->PlayerCollection->add($test);
      $this->assertTrue(true);
    } catch(\TypeError $e) {
      $this->fail();
    }
  }

  function testAddWithInValidType()
  {
    $test = "test";
    try {
      $this->PlayerCollection->add($test);
      $this->fail();
    } catch(\TypeError $e) {
      $this->assertTrue(true);
    }
  }
}
