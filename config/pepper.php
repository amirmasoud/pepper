<?php

return [
    'frontend_url' => env('FRONTEND_URL', env('APP_URL')),

    'namespace' => [
        /*
        |-----------------------------------------------------------------------
        | Default Generated Classes Root Namespace
        |-----------------------------------------------------------------------
        |
        | This option sets the default location of the generated classes in your
        | Laravel application.
        |
        | Example: 'App\Pepper' or 'Pepper'
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

        'models' => 'App\Models',
    ],

    /*
    |-----------------------------------------------------------------------
    | Available Pepper classes
    |-----------------------------------------------------------------------
    |
    | You can have a full list of Pepper Pepper classes. {{studly}} and
    | {{snake}} are replaced by their model base class name.
    |
    */
    'available' => [
        'type' => [
            '{{studly}}ResultAggregateType' => \Pepper\GraphQL\Types\ResultAggregateType::class,
            '{{studly}}FieldAggregateUnresolvableType' => \Pepper\GraphQL\Types\FieldAggregateUnresolvableType::class,
            '{{studly}}FieldAggregateType' => \Pepper\GraphQL\Types\FieldAggregateType::class,
            '{{studly}}AggregateType' => \Pepper\GraphQL\Types\AggregateType::class,
            '{{studly}}Type' => \Pepper\GraphQL\Types\Type::class,
        ],
        'mutation' => [
            'update_{{snake}}' => \Pepper\GraphQL\Mutations\UpdateMutation::class,
            'insert_{{snake}}' => \Pepper\GraphQL\Mutations\InsertMutation::class,
            'delete_{{snake}}' => \Pepper\GraphQL\Mutations\DeleteMutation::class,
            'update_{{snake}}_by_pk' => \Pepper\GraphQL\Mutations\UpdateByPkMutation::class,
            'delete_{{snake}}_by_pk' => \Pepper\GraphQL\Mutations\DeleteByPkMutation::class,
            'insert_{{snake}}_one' => \Pepper\GraphQL\Mutations\InsertOneMutation::class,
        ],
        'query' => [
            '{{snake}}_by_pk' => \Pepper\GraphQL\Queries\ByPkQuery::class,
            '{{snake}}_aggregate' => \Pepper\GraphQL\Queries\AggregateQuery::class,
            '{{snake}}' => \Pepper\GraphQL\Queries\Query::class,
        ],
        'input' => [
            '{{studly}}MutationInput' => \Pepper\GraphQL\Inputs\MutationInput::class,
            '{{studly}}OrderInput' => \Pepper\GraphQL\Inputs\OrderInput::class,
            '{{studly}}Input' => \Pepper\GraphQL\Inputs\Input::class,
        ],
    ],

    /*
    |-----------------------------------------------------------------------
    | Global Pepper classes
    |-----------------------------------------------------------------------
    |
    | These clesses are shared among all of the generated classes. you can
    | override any of them if you want to. The keys cannot be overridden.
    |
    */
    'global' => [
        'Upload' => \Rebing\GraphQL\Support\UploadType::class,
        'AllUnion' => \Pepper\GraphQL\Unions\AllUnion::class,
        'AnyScalar' => \Pepper\GraphQL\Scalars\AnyScalar::class,
        'OrderByEnum' => \Pepper\GraphQL\Enums\OrderByEnum::class,
        'ConditionInput' => \Pepper\GraphQL\Inputs\ConditionInput::class,
    ],

    /*
    |-----------------------------------------------------------------------
    | Extra optional features
    |-----------------------------------------------------------------------
    |
    | These Extra are those features that are completely optional and you can
    | them to add extra features to your application or you can implement
    | them yourself if you see they do not fit your app requirements.
    |
    | 1. Auth
    | 2. Cache
    |
    */
    'auth' => [
        'disabled' => true,
        // default user model to look at
        'model' => \App\Models\User::class,
        'available' => [
            'mutation' => [
                'register' => \Pepper\Extra\Auth\GraphQL\Mutations\RegisterMutation::class,
                'forgot_password' => \Pepper\Extra\Auth\GraphQL\Mutations\ForgotPasswordMutation::class,
                'reset_password' => \Pepper\Extra\Auth\GraphQL\Mutations\ResetPasswordMutation::class,
            ],
            'query' => [
                'login' => \Pepper\Extra\Auth\GraphQL\Queries\LoginQuery::class,
            ],
        ],

        'global' => [
            'JWTType' => \Pepper\Extra\Auth\GraphQL\Types\JWTType::class,
            'ForgotPasswordStatusType' => \Pepper\Extra\Auth\GraphQL\Types\ForgotPasswordStatusType::class,
            'ResetPasswordStatusType' => \Pepper\Extra\Auth\GraphQL\Types\ResetPasswordStatusType::class,
        ],
        'password_reset' => '/password/reset',
    ],

    'cache' => [
        'disabled' => false,
        'ttl' => 24 * 60 * 60, // 1 day
        'response' => false,
        'config' => true,
    ],
];
