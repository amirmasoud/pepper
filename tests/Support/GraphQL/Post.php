<?php

namespace Tests\Support\GraphQL;

use GraphQL\Type\Definition\Type;
use Pepper\Pepper;
use Rebing\GraphQL\Support\Facades\GraphQL as ParentGraphQL;

class Post extends Pepper
{
    public function setCoverType()
    {
        return ParentGraphQL::type('Upload');
    }

    public function setOptionalFields()
    {
        return [
            'cover_url' => [
                'type' => Type::string(),
                'selectable' => false,
                'resolve' => function ($root) {
                    $root->refresh();

                    return $root->cover;
                },
            ],
        ];
    }
}
