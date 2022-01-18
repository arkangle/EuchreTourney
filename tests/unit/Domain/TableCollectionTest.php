<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class TableCollectionTest extends TestCase
{
  use \phpmock\phpunit\PHPMock;

  private $TableCollection;
  protected function setUp(): void
  {
    $this->TableCollection = new TableCollection();
    for($i = 1; $i<=4; $i++) {
      $this->TableCollection->add(new Table("Table $i"));
    }
  }

  function testAddWithValidType()
  {
    $test = new Table("test");
    try {
      $this->TableCollection->add($test);
      $this->assertTrue(true);
    } catch(\TypeError $e) {
      $this->fail();
    }
  }

  function testAddWithInValidType()
  {
    $test = "test";
    try {
      $this->TableCollection->add($test);
      $this->fail();
    } catch(\TypeError $e) {
      $this->assertTrue(true);
    }
  }
}
