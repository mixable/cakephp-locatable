<?php
declare(strict_types=1);

namespace Locatable\Model\Entity;

use Cake\ORM\Entity;

/**
 * Class Coordinate
 *
 * @package Locatable\Model\Entity
 * @author Mathias Lipowski
 * @property int $id
 * @property int|null $foreign_key
 * @property string|null $model
 * @property string|null $latitude
 * @property string|null $longitude
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Coordinate extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'foreign_key' => true,
        'model' => true,
        'latitude' => true,
        'longitude' => true,
        'created' => true,
        'modified' => true,
    ];
}
