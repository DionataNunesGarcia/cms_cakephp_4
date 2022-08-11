<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class EventsFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Events');
        parent::__construct($controller);
    }

    public function getFeed() :array
    {
        $vars = $this->_request->getQuery();
        $conditions = [
            'Events.start >=' => $vars['start'],
            'Events.start <=' => $vars['end'],
            'Events.user_id' => $this->_userSession['id'],
            'Events.status !=' => StatusEnum::EXCLUDED,
        ];
        $events = $this->__table
            ->find()
            ->where($conditions)
            ->contain([
                'EventsTypes'
            ])
            ->toArray();
        $this->response['data'] = [];
        foreach($events as $event) {
            $allDay = false;
            $end = $event->end;
            if($event->all_day) {
                $allDay = true;
                $end = $event->start;
            }
            $this->response['data'][] = array(
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $end,
                'allDay' => $allDay,
                'url' => Router::url([
                    'controller' => 'Events',
                    'action' => 'view',
                    $event->id
                ]),
                'details' => $event->details,
                'className' => $event->events_type->color,
                'backgroundColor' => $event->events_type->color,
                'borderColor' => $event->events_type->color
            );
        }
        return $this->response['data'];
    }
}
