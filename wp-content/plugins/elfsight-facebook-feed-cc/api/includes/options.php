<?php

if (!defined('ABSPATH')) exit;


if (!class_exists('ElfsightFacebookFeedApiCoreOptions')) {
	class ElfsightFacebookFeedApiCoreOptions {
		public $apiUrl;
		public $apiAction;

		public $editorConfig;

		public function __construct($helper, $config) {
			$this->helper = $helper;

			$this->apiUrl = admin_url('admin-ajax.php');
			$this->apiAction = $this->helper->getOptionName('api');

			$this->editorConfig = &$config['editor_config'];

			add_filter($this->helper->getOptionName('shortcode_options'), array($this, 'shortcodeOptionsFilter'));
			add_filter($this->helper->getOptionName('widget_options'), array($this, 'widgetOptionsFilter'));

			$this->addOptions();
		}

		private function addOptions() {
			if (is_array($this->editorConfig['settings'])) {
				array_push($this->editorConfig['settings']['properties'], array(
					'id' => 'apiUrl',
					'name' => 'API URL',
					'tab' => 'more',
					'type' => 'hidden',
					'defaultValue' => $this->apiUrl
				));
				array_push($this->editorConfig['settings']['properties'], array(
					'id' => 'apiAction',
					'name' => 'API Action',
					'tab' => 'more',
					'type' => 'hidden',
					'defaultValue' => $this->apiAction
				));
			}
		}

		public function shortcodeOptionsFilter($options) {
			if (is_array($options)) {
				$options['apiUrl'] = $this->apiUrl;
				$options['apiAction'] = $this->apiAction;
			}

			return $options;
		}

		public function widgetOptionsFilter($options_json) {
			$options = json_decode($options_json, true);

			if (is_array($options)) {
				unset($options['apiUrl']);
				unset($options['apiAction']);
			}

			return json_encode($options);
		}
	}
}