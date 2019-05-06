<?php

namespace ZFNotification\Job;

class SmsJob extends AbstractNotificationJob
{
    protected function getErrorMessage()
    {
        return 'An Exception On SmsJob :::::::::::::::::::::: ';
    }
    
    protected function getSuccessMessage()
    {
        return 'DONE SmsJob...';
    }
}