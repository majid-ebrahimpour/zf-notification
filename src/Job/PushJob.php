<?php

namespace ZFNotification\Job;

class PushJob extends AbstractNotificationJob
{
    protected function getErrorMessage()
    {
        return 'An Exception On PushJob :::::::::::::::::::::: ';
    }
    
    protected function getSuccessMessage()
    {
        return 'DONE PushJob ...';
    }
}