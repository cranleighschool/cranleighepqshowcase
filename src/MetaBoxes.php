<?php

declare(strict_types=1);

namespace FredBradley\CranleighEPQShowcase;

    class MetaBoxes
    {
        public const PREFIX = 'epq_showcase_';

        public function __construct()
        {
            add_filter('rwmb_meta_boxes', [$this, 'meta_boxes']);
        }

        /**
         * MetaBoxes constructor.
         */
        public static function register(): void
        {
            new self();
        }

        /**
         * meta_boxes function.
         * Uses the 'rwmb_meta_boxes' filter to add custom meta boxes to our custom post type.
         * Requires the plugin "meta-box".
         *
         * @return array $meta_boxes
         */
        public static function meta_boxes(array $meta_boxes)
        {
            $meta_boxes[] = [
                'id' => 'dedicated_meta',
                'title' => 'Meta Data',
                'post_types' => ['epqshowcase'],
                'context' => 'side',
                'priority' => 'high',
                'autosave' => true,
                'fields' => [
                    [
                        'name' => __('Job title', 'cranleigh-2016'),
                        'id' => self::PREFIX.'jobtitle',
                        'type' => 'text',
                        'desc' => 'Job Title',
                    ],
                    [
                        'name' => __('Start Date', 'cranleigh-2016'),
                        'id' => self::PREFIX.'startdate',
                        'type' => 'date',
                        'desc' => 'The date that they started working at Cranleigh',
                    ],
                    [
                        'name' => __('Retired Date', 'cranleigh-2016'),
                        'id' => self::PREFIX.'enddate',
                        'type' => 'date',
                        'desc' => 'The date that they left Cranleigh',
                    ],
                ],
            ];

            return $meta_boxes;
        }
    }
