<?php

namespace Sowl\JsonApi\Action\Resource;

use Sowl\JsonApi\AbstractAction;
use Sowl\JsonApi\Response;

class UpdateResourceAction extends AbstractAction
{
    public function handle(): Response
    {
        $resource = $this->request()->resource();
        $resource = $this->manipulator()->hydrateResource($resource, $this->request()->getData());

        $this->em()->flush();

        return $this->response()->item($resource);
    }
}
