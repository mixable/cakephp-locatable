<?php
declare(strict_types=1);

namespace Locatable\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;

/**
 * Class LocatableBehavior
 *
 * @package App\Model\Behavior
 * @author Mathias Lipowski
 * @property \Locatable\Model\Table\CoordinatesTable $Coordinates
 */
class LocatableBehavior extends Behavior
{
    /**
     * Default settings
     *
     * @var array
     */
    protected $_defaultConfig = [
        'modelClass' => null,
        'locatableClass' => 'Coordinates',
        'foreignKey' => 'foreign_key',
        'modelKey' => 'model',
    ];

    /**
     * Setup
     *
     * @param array $config default config
     * @return void
     */
    public function initialize(array $config): void
    {
        if (empty($this->getConfig('modelClass'))) {
            $this->setConfig('modelClass', $this->_table->getAlias());
        }

        $this->_table->hasOne('Coordinates')
            ->setClassName($this->getConfig('locatableClass'))
            ->setForeignKey($this->getConfig('foreignKey'))
            ->setConditions([
                $this->getConfig('locatableClass') . '.' . $this->getConfig('modelKey') => $this->_table->getAlias(),
            ])
            ->setDependent(true);

        $this->_table->Coordinates->belongsTo($this->getConfig('modelClass'))
            ->setClassName($this->getConfig('modelClass'))
            ->setForeignKey($this->getConfig('foreignKey'));
    }
}
