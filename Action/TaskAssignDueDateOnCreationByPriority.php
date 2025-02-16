<?php

namespace Kanboard\Plugin\TaskAssignDueDateOnCreationByPriority\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

/**
 * Set the due date of task
 *
 * @package Kanboard\Action
 * @author  Lasse Faber
 */
class TaskAssignDueDateOnCreationByPriority extends Base
{
    /**
     * Get automatic action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Automatically set the due date on task creation based on priority');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_CREATE,
        );
    }

    /**
     * Get the required parameter for the action (defined by the user)
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'priority' => t('Priority'),
            'duration' => t('Duration in days')
        );
    }

    /**
     * Get the required parameter for the event
     *
     * @access public
     * @return string[]
     */
    public function getEventRequiredParameters()
    {
        return array(
            'task_id',
            'task' => array(
                'project_id',
            ),
        );
    }

    /**
     * Execute the action (set the task color)
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        $priority = (int)$this->getParam('priority');

        if ($priority == $data['task']['priority']) {
            $values = array(
                'id' => $data['task_id'],
                'date_due' => strtotime('+'.$this->getParam('duration').'days'),
            );

            return $this->taskModificationModel->update($values, false);
        }
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return true;
    }
}