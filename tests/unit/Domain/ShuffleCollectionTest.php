<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class ShuffleCollectionTest extends TestCase
{
  use \phpmock\phpunit\PHPMock;

  private $Collection;
  protected function setUp(): void
  {
    $tests = [];
    for($i = 1; $i<=4; $i++) {
      $tests[] = "Test $i";
    }
    $this->Collection = new ShuffleCollection($tests);
  }

  function testItems()
  {
    $expected = ["Test 1", "Test 2", "Test 3", "Test 4"];
    $this->assertEquals($expected, $this->Collection->items());
  }

  function testAddAndCount()
  {
    $test = "test";
    $this->assertEquals(4, $this->Collection->count());
    $this->Collection->add($test);
    $this->assertEquals(5, $this->Collection->count());
  }

  function testAddWithValidType()
  {
    $test = "test";
    try {
      $this->Collection->add($test);
      $this->assertTrue(true);
    } catch(\TypeError $e) {
      $this->fail();
    }
  }

  function testAddWithInValidType()
  {
    $test = 1;
    try {
      $this->Collection->add($test);
      $this->fail();
    } catch(\TypeError $e) {
      $this->assertTrue(true);
    }
  }

  function testShuffle()
  {
    $shuffle = $this->getFunctionMock(__NAMESPACE__, "shuffle");
    $shuffle->expects($this->once());
    $this->Collection->shuffle(); 
  }

  function testForeach()
  {
    $count = 0;
    foreach($this->Collection as $test)
    {
      $count++;
      $this->assertEquals("Test $count", $test);
    }
  }
}
