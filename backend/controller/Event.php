<?php

class Event extends Controller
{
	public function create()
	{
		$this->checkAdminLogin();

        $this->loadModel('event');
        $event = new eventModel();
        
        if (isset($_POST['btnCreate'])) 
        {
        	
           $err = [];
           if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $event->name = $_POST['name'];


            }
            else
            {
                $err['name'] = "Enter the name";
            }

            if (isset($_POST['participants']) && !empty($_POST['participants']))
            {
                $event->participants = $_POST['participants'];

            }
            else
            {
                $err['participants'] = "Enter the Participants";
            }
            if (isset($_POST['start']) && !empty($_POST['start']))
            {
                $event->start = $_POST['start'];

            }
            else
            {
                $err['start'] = "Enter the Start Date time for Event";
            }
             
            if (isset($_POST['end']) && !empty($_POST['end']))
            {
            	$event->end = $_POST['end'];
            }
            else
            {
                $err['end'] = "Enter End daye time for Events";
            }
            if (isset($_POST['description']) && !empty($_POST['description']))
            {
            	$event->description = $_POST['description'];
            }
            else
            {
                $err['description'] = "Enter description for Events";
            }

            if (count($err)== 0) {

            	$eveData = $event->create();

            	 if ($eveData)
             {
                $this->view->message['sucess'] = 'Event Created Sucessfully';
              
              }
             else
             {
                $this->view->message['fail'] = 'Event cannot be Created';
             }
            }

        }

		$this->view->loadview('admin/event_create');
	}


	function view()
	{
		$this->checkAdminLogin();

        $this->loadModel('event');
        $event = new eventModel();

        $eventData = $event->selectAllEvent();

        $this->view->eveData = $eventData;

		$this->view->loadview('admin/event_view');

	}

	function eventRemove($id)
	{
		$this->checkAdminLogin();

        $this->loadModel('event');
        $event = new eventModel();
        $event->id = $id;
        $eventById = $event->eventSelectById($id);
        $name = $eventById[0]->name;

        $eventDel = $event->remove($id);
        if ($eventDel)
        {
            $this->view->message['sucess'] = "Event Removed Sucessfully named  " . $name;
            $this->view();
        }
        else
        {
        	$this->view();
            $this->view->message['fail'] = "Failed to Remove event named  " . $name;
        }
     
	}

	function eventEdit($id)
	{
		$this->checkAdminLogin();

        $this->loadModel('event');
        $event = new eventModel();
        $event->id = $id;
        $eventById = $event->eventSelectById($id);

        print_r($eventById);

        $this->view->eveData = $eventById[0];
      $this->view->loadview('admin/event_edit');
	}
}





?>