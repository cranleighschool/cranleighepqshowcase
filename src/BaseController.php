<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

/**
 * Class BaseController.
 */
abstract class BaseController
{
	public $post_type;

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
