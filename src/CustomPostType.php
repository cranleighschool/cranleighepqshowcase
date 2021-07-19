<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

class CustomPostType
{
    /**
     * @var array
     */
    public $labels = [
        'name' => 'EPQ Showcase',
        'singular_name' => 'EPQ Item',
        'add_new' => 'Add New Post',
        'not_found' => 'No EPQ posts found',
    ];

    public $names = [
        'name' => 'EPQ Showcase',
        'singular' => 'Post',
        'plural' => 'EPQ Showcase',
        'slug' => 'epq-showcase',
    ];

    /**
     * @var string
     */
    public $post_type_key;

    /**
     * @var array
     */
    private $supports = [
        'thumbnail',
        'title',
        'editor',
    ];

    /**
     * @var array
     */
    private $options = [
        'menu_position' => 29,
        'menu_icon' => 'dashicons-visibility',
        'label' => 'EPQ Showcase',
        'has_archive' => true,
        'public' => true,
        'rewrite' => [
            'slug' => 'our-school/academics/departments/epq/showcase',
            'with_front' => false,
        ],
    ];

    /**
     * CustomPostType constructor.
     */
    public function __construct(string $post_key, array $options = [], array $labels = [])
    {
        $this->setPostTypeKey($post_key);

        $this->labels = array_merge($this->labels, $labels);

        $this->options['supports'] = $this->supports;
        $this->options['labels'] = $this->labels;

        $this->options = array_merge($options, $this->options);
    }

    public function register(): void
    {
        add_action('init', function (): void {
            register_post_type($this->post_type_key, $this->options);
        });

        $this->setTaxonomies();
        $this->registerMetaBoxes();
    }

    private function registerMetaBoxes(): void
    {
        new MetaBoxes($this);
    }

    private function setPostTypeKey(string $key): void
    {
        $key = str_replace(' ', '-', $key);
        $this->post_type_key = strtolower($key);
    }

    private function setTaxonomies(): void
    {
    }
}
