<?php

namespace Tests\App\Transformers;

use League\Fractal\Resource\Item;
use Sowl\JsonApi\AbstractTransformer;
use Tests\App\Entities\Page;
use Tests\App\Entities\User;

class PagesTransformer extends AbstractTransformer
{
    protected array $availableIncludes = [
        'user',
    ];

    public function transform(Page $page): array
    {
        return [
            'id' => $page->getId(),
            'title' => $page->getTitle(),
            'content' => $page->getContent(),
        ];
    }

    public function includeUser(Page $page): Item
    {
        return $this->item($page->getUser(), new UserTransformer(), User::getResourceType());
    }
}
