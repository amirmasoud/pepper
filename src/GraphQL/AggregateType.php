<?php

declare(strict_types=1);

namespace Pepper\GraphQL;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AggregateType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AggregateType',
        'description' => 'A type'
    ];

    protected $instance;

    public function __construct()
    {
        $this->instance = new \App\Http\Pepper\User;
    }

    public function fields(): array
    {
        return [
            'count' => [
                'type' => Type::int(),
                'selectable' => false,
                'resolve' => function ($root, $args, $context, ResolveInfo $resolveInfo) {
                    return $this->instance->getQueryResolve($root, $args, $context, $resolveInfo, function () {
                        /** */
                    })->count();
                }
            ]
        ];
    }
}