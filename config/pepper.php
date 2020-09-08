<?php

return [
    'namespace' => [
        /*
        |-----------------------------------------------------------------------
        | Default Generated Classes Root Namespace
        |-----------------------------------------------------------------------
        |
        | This option sets the default location of the generated classes in your
        | Laravel application.
        |
        | Example: 'App\GraphQL' or 'GraphQL'
        |
        */

        'root' => 'App',

        /*
        |-----------------------------------------------------------------------
        | Default Model Namespace
        |-----------------------------------------------------------------------
        |
        | This option sets and take care of the default location for the models
        | in the your application. Alternative locations may be setup and used
        | as needed;
        |
        | Example: 'App\Models' or 'App\Supports'
        |
        */

        'models' => 'App',
    ],

    /*
    |-----------------------------------------------------------------------
    | Available GraphQL classes
    |-----------------------------------------------------------------------
    |
    | You can have a full list of Pepper GraphQL classes. {{studly}} and
    | {{snake}} are replaced by their model base class name.
    |
    */
    'available' => [
        'Types' => [
            '{{studly}}ResultAggregateType' => \Pepper\GraphQL\Types\ResultAggregateType::class,
            '{{studly}}FieldAggregateUnresolvableType' => \Pepper\GraphQL\Types\FieldAggregateUnresolvableType::class,
            '{{studly}}FieldAggregateType' => \Pepper\GraphQL\Types\FieldAggregateType::class,
            '{{studly}}AggregateType' => \Pepper\GraphQL\Types\AggregateType::class,
            '{{studly}}Type' => \Pepper\GraphQL\Types\Type::class,
        ],
        'Mutations' => [
            '{{snake}}_update' => \Pepper\GraphQL\Mutations\UpdateMutation::class,
            '{{snake}}_insert' => \Pepper\GraphQL\Mutations\InsertMutation::class,
            '{{snake}}_delete' => \Pepper\GraphQL\Mutations\DeleteMutation::class,
            'update_{{snake}}_by_pk' => \Pepper\GraphQL\Mutations\UpdateByPkMutation::class,
            'delete_{{snake}}_by_pk' => \Pepper\GraphQL\Mutations\DeleteByPkMutation::class,
            'insert_{{snake}}_one' => \Pepper\GraphQL\Mutations\InsertOneMutation::class,
        ],
        'Queries' => [
            '{{snake}}_by_pk' => \Pepper\GraphQL\Queries\ByPkQuery::class,
            '{{snake}}_aggregate' => \Pepper\GraphQL\Queries\AggregateQuery::class,
            '{{snake}}' => \Pepper\GraphQL\Queries\Query::class,
        ],
        'Inputs' => [
            '{{studly}}MutationInput' => \Pepper\GraphQL\Inputs\MutationInput::class,
            '{{studly}}OrderInput' => \Pepper\GraphQL\Inputs\OrderInput::class,
            '{{studly}}Input' => \Pepper\GraphQL\Inputs\Input::class,
        ],
    ],

    /*
    |-----------------------------------------------------------------------
    | Global GraphQL classes
    |-----------------------------------------------------------------------
    |
    | These clesses are shared among all of the generated classes. you can
    | override any of them if you want to. The keys cannot be overridden.
    |
    */
    'global' => [
        'AllUnion' => \Pepper\AllUnion::class,
        'AnyScalar' => \Pepper\AnyScalar::class,
        'OrderByEnum' => \Pepper\OrderByEnum::class,
        'ConditionInput' => \Pepper\ConditionInput::class,
    ],
];
