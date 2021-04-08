<?php
declare(strict_types=1);

namespace Locatable\Model\Behavior;

use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
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
        'implementedEvents' => [
            'Model.beforeSave' => 'beforeSave',
        ],
        'implementedFinders' => [],
        'implementedMethods' => [],
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
            $this->setConfig('modelClass', $this->getTable()->getAlias());
        }

        $this->_table->hasOne('Coordinates')
            ->setClassName($this->getConfig('locatableClass'))
            ->setForeignKey($this->getConfig('foreignKey'))
            ->setConditions([
                $this->getConfig('locatableClass') . '.' . $this->getConfig('modelKey') => $this->getConfig('modelClass'),
            ])
            ->setDependent(true);

        $this->_table->Coordinates->belongsTo($this->getConfig('modelClass'))
            ->setClassName($this->getConfig('modelClass'))
            ->setForeignKey($this->getConfig('foreignKey'));
    }

    /**
     * beforeSave callback
     *
     * @param \Cake\Event\EventInterface $event The beforeSave event that was fired
     * @param \Cake\Datasource\EntityInterface $entity The entity that is going to be saved
     * @param \ArrayObject $options The options for the query
     * @return void
     */
    public function beforeSave(EventInterface $event, EntityInterface $entity, \ArrayObject $options)
    {
        if ($entity->has('coordinate') && $entity->get('coordinate')->isNew()) {
            // Automatically set model of association
            if (!$entity->get('coordinate')->has('model')) {
                $entity->get('coordinate')->set('model', $this->getTable()->getAlias());
            }
        }
    }
}
