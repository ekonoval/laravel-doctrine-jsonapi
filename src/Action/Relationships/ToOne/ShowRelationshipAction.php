<?php

namespace Sowl\JsonApi\Action\Relationships\ToOne;

use Sowl\JsonApi\AbstractAction;
use Sowl\JsonApi\Relationships\ToOneRelationship;
use Sowl\JsonApi\Response;

class ShowRelationshipAction extends AbstractAction
{
    public function __construct(protected ToOneRelationship $relationship)
    {
    }

    public function handle(): Response
    {
        $resource = $this->request()->resource();
        $field = $this->relationship->name();

        if ($relation = $this->manipulator()->getProperty($resource, $field)) {
            return $this->response()->item($relation, relationship: true);
        }

        return $this->response()->null();
    }
}
