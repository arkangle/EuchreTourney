<?php
declare(strict_types=1);
namespace Domain;

class Player
{
  private $name;
  public function __construct($name)
  {
    $this->name = $name;
  }
  public function getName(): string
  {
    return $this->name;
  }
}
