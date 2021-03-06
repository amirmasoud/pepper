<?php

namespace Pepper\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

class ResultAggregateType extends GraphQLType
{
    protected $attributes = [];

    protected $instance;

    public function __construct($pepper)
    {
        // Dynamic definition of common attributes.
        $this->instance = new $pepper;
        $this->attributes['name'] = $this->instance->getResultAggregateTypeName();
        $this->attributes['description'] = $this->instance->getResultAggregateTypeDescription();
    }

    public function fields(): array
    {
        return $this->instance->getResultAggregateFields();
    }
}
