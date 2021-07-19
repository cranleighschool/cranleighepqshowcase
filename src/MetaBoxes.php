<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

class MetaBoxes
{
    public const PREFIX = 'epq_showcase_';

	/**
	 * @var \FredBradley\CranleighEPQShowcase\CustomPostType
	 */
	public $post_type;

    public function __construct(CustomPostType $post_type)
    {
        $this->post_type = $post_type;
        add_filter('rwmb_meta_boxes', [$this, 'meta_boxes']);
    }

    /**
     * meta_boxes function.
     * Uses the 'rwmb_meta_boxes' filter to add custom meta boxes to our custom post type.
     * Requires the plugin "meta-box".
     *
     * @return array $meta_boxes
     */
    public function meta_boxes(array $meta_boxes)
    {
        $meta_boxes[] = [
            'id' => 'epq_meta',
            'title' => 'Meta Data',
            'post_types' => [$this->post_type->post_type_key],
            'context' => 'side',
            'priority' => 'high',
            'autosave' => true,
            'fields' => [
                [
                    'name' => __('Pupil Name', 'cranleigh-2016'),
                    'id' => self::PREFIX.'pupil',
                    'type' => 'text',
                    'desc' => 'Pupil Name (eg: J Cooksley)',
                ],
            ],
        ];

        return $meta_boxes;
    }
}
