<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class jobPosting extends Mutation
{
    protected $attributes = [
        'name' => 'jobPosting',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'jobTitle' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the job',
            ],
            'jobDescription' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The job description',
            ],
            'location' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Job location',
            ],
            'company' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Company name',
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return [];
    }
}
