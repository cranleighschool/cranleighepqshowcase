<?php


	namespace FredBradley\CranleighEPQShowcase;


	class Template
	{
		public static function plugin_dir_path(): string
		{
			return plugin_dir_path(__DIR__);
		}

		public static function getTemplate(string $templateName): string
		{
			return self::plugin_dir_path() . '/templates/' . $templateName . '.php';
		}

		public static function register()
		{
			$instance = new self();

			add_filter('template_include', [$instance, 'selectTemplate']);
			add_action('pre_get_posts', array($instance, 'showAllPosts'));
			add_action('wp_head', array($instance, 'my_custom_styles'), 100);

		}

		function my_custom_styles()
		{
			if (is_singular('adedicatedcommunity')) {
				echo "<style>.person-meta {
background: #ccc;
padding:5px;
border: 1px #999 solid;
}
.person-meta dt {
margin-top:5px;
}</style>";
			}
		}

		public static function yearFromDate($type = 'start')
		{
			$date = get_post_meta(get_the_ID(), 'dedcomm_' . $type . 'date', true);

			$timeFromDate = strtotime($date);

			return date("F Y", $timeFromDate);

		}

		public function selectTemplate(string $template): string
		{
			if (is_post_type_archive('adedicatedcommunity')) {
				$template = self::getTemplate('archive');
			}
			if (is_singular('adedicatedcommunity')) {
				$template = self::getTemplate('single');
			}

			return $template;
		}

		public function showAllPosts($query)
		{
			if ($query->is_main_query() && is_post_type_archive('adedicatedcommunity')) {
				$query->set('posts_per_page', -1);
			}
		}
	}
