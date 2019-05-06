<?php

namespace ZFNotification\Channel;

class AbstractChannel
{

    /**
     * @var array
     */
    protected $option;

    /**
     * Set the channel option
     *
     * @param  array
     * @return this
     */
    public function setOption($option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Return the current option
     *
     * @return array
     */
    public function getOption()
    {
        return $this->$option;
    }

}
