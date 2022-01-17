<?php
declare(strict_types=1);
namespace Domain;

class ShuffleCollection implements \Iterator, \Countable
{
  private $items = [];
  private $position = 0;
  protected $itemType = "string";

  function __construct(array $items = [])
  {
    foreach($items as $item) {
      $this->validateType($item);
    }
    $this->items = $items;
  }

  function add($item): void
  {
    $this->validateType($item);
    $this->items[] = $item;
  }

  private function validateType($item): void
  {
    $type = gettype($item);
    if($type == "object") {
      $type = get_class($item);
    }
    if($type != $this->itemType) {
      throw new \TypeError(sprintf("Invalid Type: %s != %s", $type, $this->itemType));
    }
  }

  function items(): array
  {
    return $this->items;
  }

  function shuffle(): void
  {
    shuffle($this->items);
  }

  function count(): int
  {
    return count($this->items);
  }

  function rewind(): void
  {
    $this->position = 0;
  }

  function current(): mixed
  {
    return $this->items[$this->position];
  }

  function key(): mixed
  {
    return $this->position;
  }

  function next(): void
  {
    ++$this->position;
  }

  function valid(): bool
  {
    return isset($this->items[$this->position]);
  }
}
