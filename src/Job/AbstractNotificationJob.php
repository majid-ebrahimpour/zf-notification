<?php

namespace ZFNotification\Job;

use JobQueue\Queue\QueueAwareInterface;
use JobQueue\Job\AbstractJob;
use JobQueue\Queue\QueueAwareTrait;

abstract class AbstractNotificationJob extends AbstractJob implements QueueAwareInterface
{
    use QueueAwareTrait;

    public function __construct(

    )
    {

    }

    /**
     * @see \JobQueue\Job\JobInterface::execute()
     */
    public function execute()
    {
        $payload = $this->getContent();
        try {
            /**
    		 * execute the job
             */
        } catch (\Exception $e){
            var_dump($this->getErrorMessage() , $e->getMessage());
            exit(151);
        }

        if (true) {
            var_dump($this->getSuccessMessage());
        	echo 'DONE!!!!!!';
        }

        echo "FINISH JOB !!!";
    }
    
    protected function getErrorMessage()
    {
        return '';
    }
    
    protected function getSuccessMessage()
    {
        return '';
    }
}