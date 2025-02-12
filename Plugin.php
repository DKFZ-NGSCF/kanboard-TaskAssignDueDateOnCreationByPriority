<?php

namespace Kanboard\Plugin\AutomaticAction;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\AutomaticAction\Action\TaskAssignDueDateOnCreationByPriority;

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskAssignDueDateOnCreationByPriority($this->container));
    }
}