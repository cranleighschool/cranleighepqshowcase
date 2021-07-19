<?php

    declare( strict_types=1 );

    namespace FredBradley\CranleighEPQShowcase;

    use DOMDocument;

class Template
{
    public $post_type_key;

    public function __construct(string $post_type_key)
    {
        $this->post_type_key = $post_type_key;
    }

    public static function register(string $post_type_key): void
    {
        $instance = new self($post_type_key);

        add_filter('template_include', [ $instance, 'selectTemplate' ]);
        add_action('pre_get_posts', [ $instance, 'showAllPosts' ]);
        add_action('wp_head', [ $instance, 'my_custom_styles' ], 100);
        add_filter('frb_lead_content', [$instance, 'filter_lead_content']);
    }

    public function my_custom_styles(): void
    {
        if (is_singular($this->post_type_key)) {
        }
    }

    /**
     * @param string $content
     *
     * @return false|string
     */
    public function filter_lead_content(string $content)
    {
        $content = apply_filters('the_content', $content);
        $dom     = new DOMDocument();
        $dom->loadHTML($content);
        $firstParagraph = $dom->getElementsByTagName('p')->item(0);
        $firstParagraph->setAttribute("class", "lead");

        return $dom->saveHTML($dom);
    }

    public function selectTemplate(string $template): string
    {
        if (is_post_type_archive($this->post_type_key)) {
            $template = self::getTemplate('archive');
        }
        if (is_singular($this->post_type_key)) {
            $template = self::getTemplate('single');
        }

        return $template;
    }

    public static function getTemplate(string $templateName): string
    {
        return self::plugin_dir_path() . '/templates/' . $templateName . '.php';
    }

    public static function plugin_dir_path(): string
    {
        return plugin_dir_path(__DIR__);
    }

    public function showAllPosts($query): void
    {
        if ($query->is_main_query() && is_post_type_archive($this->post_type_key)) {
            $query->set('posts_per_page', - 1);
        }
    }
}
