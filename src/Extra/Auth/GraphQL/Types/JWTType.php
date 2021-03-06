<?php

namespace Pepper\Extra\Auth\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class JWTType extends GraphQLType
{
    protected $attributes = [
        'name' => 'JWTType',
        'description' => 'Login type',
    ];

    public function __construct()
    {
        $this->attributes['model'] = config('pepper.auth.model');
    }

    public function fields(): array
    {
        return [
            'token' => [
                'name' => 'token',
                'type' => Type::string(),
            ],
        ];
    }
}
