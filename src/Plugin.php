<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

class Plugin extends BaseController
{
    /**
     * @var
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
        Template::register();
        if (is_admin()) {
	        $settings = new Settings($this->post_type);
        }
	    /*
		 * Retrieve this value with:
		 * $epq_showcase_settings_options = get_option( 'epq_showcase_settings_option_name' ); // Array of All Options
		 * $blurb_from_jlt_0 = $epq_showcase_settings_options['blurb_from_jlt_0']; // Blurb from JLT
		 */

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
