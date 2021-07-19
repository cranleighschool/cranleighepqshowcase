<?php

    declare( strict_types=1 );

    namespace FredBradley\CranleighEPQShowcase;

class Plugin extends BaseController
{
    /**
     * @var \FredBradley\CranleighEPQShowcase\CustomPostType
     */
    public $post_type;

    /**
     * Plugin constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function setupPlugin(): void
    {
        $this->createCustomPostType('EPQ Showcase')->register();
        Template::register($this->post_type->post_type_key);
        if (is_admin()) {
            new Settings($this->post_type);
        }
    }

    /**
     * @return \FredBradley\CranleighEPQShowcase\CustomPostType
     */
    private function createCustomPostType(string $post_type_key)
    {
        $this->post_type = new CustomPostType($post_type_key);

        return $this->post_type;
    }
}
