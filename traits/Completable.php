<?php

namespace Renatio\Todos\Traits;

use Carbon\Carbon;

/**
 * Class Completable
 * @package Renatio\Todos\Traits
 */
trait Completable
{

    /**
     * @return void
     */
    public function complete()
    {
        $this->completed_at = Carbon::now();
        $this->forceSave();
    }

    /**
     * @return void
     */
    public function reopen()
    {
        $this->completed_at = null;
        $this->forceSave();
    }

}