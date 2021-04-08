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
 * @property \Locatable\Model\Table\GpsTable $Gps
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
        'locatableClass' => 'Gps',
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

        $this->_table->hasOne('Gps')
            ->setClassName($this->getConfig('locatableClass'))
//            ->setEntityClass('Gps')
            ->setForeignKey($this->getConfig('foreignKey'))
            ->setConditions([
                $this->getConfig('locatableClass') . '.' . $this->getConfig('modelKey') => $this->_table->getAlias(),
            ])
            ->setDependent(true);

        $this->_table->Gps->belongsTo($this->getConfig('modelClass'))
            ->setClassName($this->getConfig('modelClass'))
            ->setForeignKey($this->getConfig('foreignKey'));
    }

    /**
     * Create the finder comments
     *
     * @param \Cake\ORM\Query $query the current Query
     * @param array $options Options
     * @return \Cake\ORM\Query
     */
    public function findComments(Query $query, $options = [])
    {
        return $query->contain([
            'Comments' => function (Query $q) {
                return $q->find('threaded')->contain('Users')->order(['Comments.created' => 'ASC']);
            },
        ]);
    }
}
