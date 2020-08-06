<?php

namespace Pepper\Commands;

use Illuminate\Filesystem\Filesystem;
use Pepper\Helpers\ResourceHttpCreator;
use Pepper\Helpers\ResourceTypeCreator;
use Pepper\Helpers\ResourceQueryCreator;
use Pepper\Helpers\ResourceInputCreator;
use Pepper\Helpers\ResourceOrderCreator;
use HaydenPierce\ClassFinder\ClassFinder;
use Pepper\Helpers\ResourceMutationCreator;
use Pepper\Helpers\ResourceAggregateCreator;
use Pepper\Helpers\ResourceFieldAggregateCreator;
use Pepper\Helpers\ResourceResultAggregateCreator;

class AddCommand extends BaseCommand
{
    /** @var string */
    protected $signature = 'pepper:add';

    /** @var string */
    protected $description = '...';

    public function handle()
    {
        $classes = [];
        foreach (ClassFinder::getClassesInNamespace(config('pepper.namespace')) as $class) {
            $classes[] = $class;
        }
        $selected = $this->choice(
            'Select models to be included (Separate by comma)',
            array_merge(['-- select all --'], $classes),
            null,
            null,
            true
        );

        if (in_array('-- select all --', $selected)) {
            foreach ($classes as $model) {
                $this->createHttp($model);
            }
        } else {
            foreach ($selected as $model) {
                $this->createHttp($model);
            }
        }
    }

    private function createHttp($model)
    {
        $fs = new Filesystem();
        $rq = new ResourceHttpCreator($fs);

        $rq->create(class_basename($model));

        $model = 'App\Http\Pepper\\' . class_basename($model);

        $instance = (new \ReflectionClass($model))->newInstanceArgs();

        // Create type
        $rq = new ResourceTypeCreator($fs);
        $rq->create($instance->getTypeName(), $instance->getName(), $instance->getTypeDescription(), $model);

        // create query
        $rq = new ResourceQueryCreator($fs);
        $rq->create($instance->getQueryName(), $instance->getName(), $instance->getQueryDescription(), $model);

        // create input
        $rq = new ResourceInputCreator($fs);
        $rq->create($instance->getInputName(), $instance->getName(), $instance->getInputDescription(), $model);

        // create order
        $rq = new ResourceOrderCreator($fs);
        $rq->create($instance->getOrderName(), $instance->getName(), $instance->getOrderDescription(), $model);

        // create mutation
        $rq = new ResourceMutationCreator($fs);
        $rq->create($instance->getMutationName(), $instance->getName(), $instance->getMutationDescription(), $model);

        // field aggregate
        $rq = new ResourceFieldAggregateCreator($fs);
        $rq->create($instance->getFieldAggregateName(), $instance->getName(), $instance->getFieldAggregateDescription(), $model);

        // result aggregate
        $rq = new ResourceResultAggregateCreator($fs);
        $rq->create($instance->getResultAggregateName(), $instance->getName(), $instance->getResultAggregateDescription(), $model);

        // aggregate
        $rq = new ResourceAggregateCreator($fs);
        $rq->create($instance->getAggregateName(), $instance->getName(), $instance->getAggregateDescription(), $model);
    }
}
