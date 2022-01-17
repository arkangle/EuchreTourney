<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use Domain\Player;
use Domain\Partners;
use Domain\PartnerCollection;;
use PHPUnit\Framework\TestCase;

class PartnerCollectionTest extends TestCase
{
  private $PartnerCollection;
  private $PlayerCollection;

  protected function setUp(): void
  {
    $PlayerList = [
      new Player("Player 1"),
      new Player("Player 2"),
      new Player("Player 3"),
      new Player("Player 4"),
    ];
    $this->PlayerCollection = new PlayerCollection($PlayerList);
  }
  function testFromPlayerCollection(): void
  {
    $PartnerCollection = PartnerCollection::FromPlayerCollection($this->PlayerCollection);
    $this->assertEquals(6, $PartnerCollection->count());
  }
}
