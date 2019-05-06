<?php

namespace ZFNotification\Job;

class EmailJob extends AbstractNotificationJob
{
    protected function getErrorMessage()
    {
        return 'An Exception On EmailJob :::::::::::::::::::::: ';
    }
    
    protected function getSuccessMessage()
    {
        return 'DONE EmailJob ...';
    }
}