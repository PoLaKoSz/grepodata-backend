<?php

namespace Grepodata\Library\Model\IndexV2;

use Grepodata\Library\Controller\Indexer\CityInfo;
use \Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed user_id
 * @property mixed hash
 * @property mixed world
 * @property mixed source_type
 * @property mixed report_type
 * @property mixed town_id
 * @property mixed town_name
 * @property mixed player_id
 * @property mixed player_name
 * @property mixed alliance_id
 * @property mixed report_date
 * @property mixed parsed_date
 * @property mixed hero
 * @property mixed god
 * @property mixed silver
 * @property mixed buildings
 * @property mixed land_units
 * @property mixed sea_units
 * @property mixed fireships
 * @property mixed mythical_units
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed soft_deleted
 */
class Intel extends Model
{
  protected $table = 'Indexer_intel';

  public function getPublicFields()
  {
    return array(
      'id'          => $this->id,
      'hash'        => $this->hash,
      'town_id'     => $this->town_id,
      'town_name'   => $this->town_name,
      'player_id'   => $this->player_id,
      'player_name' => $this->player_name,
      'alliance_id' => $this->alliance_id,
      'date'        => $this->report_date,
      'parsed_date' => $this->parsed_date,
      'type'        => $this->report_type,
      'hero'        => $this->hero,
      'god'         => $this->god,
      'silver'      => $this->silver,
      'fireships'   => $this->fireships,
      'buildings'   => json_decode($this->buildings, true),
      'land'        => json_decode($this->land_units, true),
      'sea'         => json_decode($this->sea_units, true),
      'air'         => json_decode($this->mythical_units, true),
      'deleted'     => ($this->soft_deleted!=null?true:false)
    );
  }

  public function getMinimalFields()
  {
    return array(
      'id'          => $this->id,
      'date'        => $this->report_date,
      'type'        => $this->report_type,
      'hero'        => $this->hero,
      'god'         => $this->god,
      'silver'      => $this->silver,
      'fireships'   => $this->fireships,
      'parsed_date' => $this->parsed_date,
      'buildings'   => json_decode($this->buildings, true),
      'land'        => json_decode($this->land_units, true),
      'sea'         => json_decode($this->sea_units, true),
      'air'         => json_decode($this->mythical_units, true),
      'deleted'     => ($this->soft_deleted!=null?true:false)
    );
  }
}
