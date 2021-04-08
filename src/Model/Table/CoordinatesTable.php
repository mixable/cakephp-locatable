<?php
declare(strict_types=1);

namespace Locatable\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coordinate Model
 *
 * @author Mathias Lipowski
 * @method \App\Model\Entity\Coordinate newEmptyEntity()
 * @method \App\Model\Entity\Coordinate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coordinate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Coordinate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coordinate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coordinate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoordinatesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('coordinates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('foreign_key')
            ->allowEmptyString('foreign_key');

        $validator
            ->scalar('model')
            ->maxLength('model', 128)
            ->allowEmptyString('model');

        $validator
            ->decimal('latitude')
            ->allowEmptyString('latitude');

        $validator
            ->decimal('longitude')
            ->allowEmptyString('longitude');

        return $validator;
    }
}
