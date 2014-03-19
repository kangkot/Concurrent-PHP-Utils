<?php

namespace ConcurrentPhpUtils;

trait AtomicStackableTrait
{
    /**
     * Performs a compare and swap operation on a class member
     *
     * @param $member
     * @param $oldValue
     * @param $newValue
     * @return bool
     */
    public function casMember($member, $oldValue, $newValue)
    {
        $set = false;

        $this->lock();
        if ($this[$member] == $oldValue) {
            $this[$member] = $newValue;

            $set = true;
        }
        $this->unlock();

        return $set;
    }
}
