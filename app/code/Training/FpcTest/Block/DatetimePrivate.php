<?php

namespace Training\FpcTest\Block;


class DatetimePrivate extends Datetime
{
    /**
     * @return bool
     */
    public function isScopePrivate()
    {
        return true;
    }

    /**
     * @return null
     */
    public function getCacheLifetime()
    {
        return null; // TODO: Change the autogenerated stub
    }

}