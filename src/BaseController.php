<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

    /**
     * Class BaseController.
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

        public function runUpdateChecker(string $plugin_name)
        {
            return $this->update_check($plugin_name, 'cranleighschool');
        }

        private function update_check(string $plugin_name, string $user): void
        {
        }
    }
