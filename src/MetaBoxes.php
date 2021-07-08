<?php


	namespace FredBradley\CranleighEPQShowcase;


	/**
	 * Class MetaBoxes
	 *
	 * @package CranleighSchool\Policies
	 */
	class MetaBoxes
	{
		public const PREFIX = "epq_showcase_";

		/**
		 * MetaBoxes constructor.
		 */
		public static function register() {
			new self();
		}
		public function __construct()
		{
			add_filter('rwmb_meta_boxes', array($this, 'meta_boxes'));
		}

		/**
		 * meta_boxes function.
		 * Uses the 'rwmb_meta_boxes' filter to add custom meta boxes to our custom post type.
		 * Requires the plugin "meta-box"
		 *
		 * @access public
		 *
		 * @param array $meta_boxes
		 *
		 * @return array $meta_boxes
		 */
		public static function meta_boxes(array $meta_boxes)
		{

			$meta_boxes[] = array(
				'id'         => 'dedicated_meta',
				'title'      => 'Meta Data',
				'post_types' => array('epq-showcase'),
				'context'    => 'side',
				'priority'   => 'high',
				'autosave'   => true,
				'fields'     => array(
					array(
						'name'             => __('Job title', 'cranleigh-2016'),
						'id'               => self::PREFIX."jobtitle",
						'type'             => 'text',
						'desc'             => 'Job Title',
					),
					array(
						'name'             => __('Start Date', 'cranleigh-2016'),
						'id'               => self::PREFIX."startdate",
						'type'             => 'date',
						'desc'             => 'The date that they started working at Cranleigh',
					),
					array(
						'name'             => __('Retired Date', 'cranleigh-2016'),
						'id'               => self::PREFIX."enddate",
						'type'             => 'date',
						'desc'             => 'The date that they left Cranleigh',
					),

				),

			);

			return $meta_boxes;
		}
	}
