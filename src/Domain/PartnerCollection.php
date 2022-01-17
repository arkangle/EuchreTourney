<?php
declare(strict_types=1);
namespace Domain;

class PartnerCollection extends ShuffleCollection
{
  protected $itemType = "Domain\\Partners";

  static function FromPlayerCollection(PlayerCollection $collection): PartnerCollection
  {
    $players = $collection->items();
    $count = $collection->count();
    $PartnerCollection = new PartnerCollection();
    for($i = 0; $i < $count; $i++) {
      for($j = $i + 1; $j < $count; $j++) {
        $Partners = new Partners($players[$i], $players[$j]);
        $PartnerCollection->add($Partners);
      }
    }
    return $PartnerCollection;
  }
}
