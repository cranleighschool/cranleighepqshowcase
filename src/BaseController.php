<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

/**
 * Class BaseController
 *
 * @package FredBradley\CranleighEPQShowcase
 */
abstract class BaseController
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->setupPlugin();
    }

    /**
     * @return mixed
     */
    abstract public function setupPlugin();
}
