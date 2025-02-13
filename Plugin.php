<?php

namespace Kanboard\Plugin\TaskAssignDueDateOnCreationByPriority;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskAssignDueDateOnCreationByPriority\Action\TaskAssignDueDateOnCreationByPriority;

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskAssignDueDateOnCreationByPriority($this->container));
    }

        public function getPluginName()
    {
        return 'TaskAssignDueDateOnCreationByPriority';
    }

    public function getPluginDescription()
    {
        return t('Assign a due date on task creation based on priority');
    }

    public function getPluginAuthor()
    {
        return 'Lasse Faber';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/DKFZ-NGSCF/kanboard-TaskAssignDueDateOnCreationByPriority';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.43';
    }
}