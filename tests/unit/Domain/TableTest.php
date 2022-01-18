<?php
declare(strict_types=1);
namespace Domain;
require __DIR__ . "/../../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
  private $tableName = "Table1";
  private $Table;
  protected function setUp(): void
  {
    $this->Table = new Table($this->tableName);
  }

  function testGetName(): void
  {
    $this->assertEquals($this->tableName, $this->Table->getName());
  }
}

