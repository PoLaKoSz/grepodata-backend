<?php

namespace Grepodata\Library\Controller\IndexV2;

use Grepodata\Library\Model\User;
use Illuminate\Database\Eloquent\Collection;

class Notes
{

  /**
   * @param \Grepodata\Library\Model\Indexer\IndexInfo $oIndex
   * @return Collection|\Grepodata\Library\Model\IndexV2\Notes[]
   */
  public static function allByIndex(\Grepodata\Library\Model\Indexer\IndexInfo $oIndex)
  {
    return \Grepodata\Library\Model\IndexV2\Notes::where('index_key', '=', $oIndex->key_code)
      ->orderBy('id', 'desc')
      ->get();
  }

  /**
   * @param $Keys array list of Index identifiers
   * @param $Id int Town identifier
   * @return Collection|\Grepodata\Library\Model\IndexV2\Notes[]
   */
  public static function allByTownIdByKeys($Keys, $Id)
  {
    return \Grepodata\Library\Model\IndexV2\Notes::whereIn('index_key', $Keys, 'and')
      ->where('town_id', '=', $Id)
      ->orderBy('id', 'desc')
      ->get();
  }

  /**
   * @param $Keys array list of Index identifiers
   * @param $PosterName string name of poster
   * @return Collection|\Grepodata\Library\Model\IndexV2\Notes[]
   */
  public static function allByKeysByPoster($Keys, $PosterName)
  {
    return \Grepodata\Library\Model\IndexV2\Notes::whereIn('index_key', $Keys, 'and')
      ->where('poster_name', '=', $PosterName)
      ->orderBy('id', 'desc')
      ->get();
  }

  /**
   * @param $Keys array list of Index identifiers
   * @param $NoteId int note id
   * @return Collection|\Grepodata\Library\Model\IndexV2\Notes[]
   */
  public static function allByKeysByNoteId($Keys, $NoteId)
  {
    return \Grepodata\Library\Model\IndexV2\Notes::whereIn('index_key', $Keys, 'and')
      ->where('note_id', '=', $NoteId)
      ->orderBy('id', 'desc')
      ->get();
  }

  /**
   * @param User $oUser
   * @param $World
   * @param $TownId
   * @return \Grepodata\Library\Model\IndexV2\Intel[]
   */
  public static function allByUserForTown(User $oUser, $World, $TownId)
  {
    return \Grepodata\Library\Model\IndexV2\Notes::select(['Indexer_notes.*'])
      ->join('Indexer_roles', 'Indexer_roles.index_key', '=', 'Indexer_notes.index_key')
      ->where('Indexer_roles.user_id', '=', $oUser->id)
      ->where('Indexer_notes.town_id', '=', $TownId)
      ->where('Indexer_notes.world', '=', $World)
      ->orderBy('created_at', 'asc')
      ->distinct('Indexer_intel.id')
      ->get();
  }

}