<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Product> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Product> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->lengthBetween('name', [3, 50], 'Please, enter name between 3 and 50 characters.')
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Product name must be unique.'
            ]);

        $validator
            ->integer('quantity')
            ->notEmptyString('quantity')
            ->add('quantity', 'greaterEquelFuc', [
                'rule' => function ($value, $context) {
                    return $value >= 0 && $value <= 100;
                },
                'message' => 'Enter quantity between 0 and 100.'
            ])
            ->add('quantity', 'maxPriceForPromo', [
                'rule' => function ($value, $context) {

                    if ($context['data']['price'] > 100) {
                        if ($value >= 10) {
                            return true;
                        }
                        return false;
                    }
                    return true;
                },
                'message' => 'All products over £100 must have 10 or more quantity.'
            ]);

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price')
            ->add('price', 'numeric', [
                'rule' => 'numeric',
                'message' => 'Price must be a numarical number.'
            ])
            ->add('price', 'range', [
                'rule' => ['range', -1, 10001], // -1 would ensure number is 0 or greate i.e. 0.34 all the way to 1000 
                'message' => 'Enter price between 0 to 10,000.'
            ])
            ->add('price', 'maxPriceForPromo', [
                'rule' => function ($value, $context) {
                    $nameString = $context['data']['name'];
                    if (stripos($nameString, 'promo')) {
                        return $value < 50;
                    }
                    return true;
                },
                'message' => 'Promo product enter price less than 50.'
            ]);

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
