<?php

defined('ABSPATH') || die();

if (!class_exists('ACFOptionPageLogger')) {
    /**
     * Class ACFOptionPageLogger
     */
    class ACFOptionPageLogger extends SimpleLogger
    {
        /**
         * The slug for this logger.
         *
         * @var string $slug
         */
        public $slug = __CLASS__;

        /**
         * @var string
         */
        private $menu_slug;

        /**
         * @var array
         */
        private $old_fields = [];

        /**
         * @var array
         */
        private $new_fields = [];

        /**
         * Get array with information about this logger
         *
         * @return array
         */
        function getInfo()
        {
            $arr_info = [
                'slug' => __CLASS__,
                'name' => 'ACF Option Page Logger',
                'description' => 'Logs when ACF Option Page fields values has been changed on WP',
                'messages' => [
                    'option_updated' => __( 'Updated "{page_title}"', 'simple-history' ),
                ],
                /*'labels' => [
                    'search' => [
                        'label' => _x( 'Theme Options', 'Theme Options logger: search', 'simple-history' ),
                        'options' => [
                            _x( 'Changed options', 'Theme Options logger: search', 'simple-history' ) => [
                                'option_updated'
                            ],
                        ],
                    ],
                ],*/
            ];

            return $arr_info;
        }

        /**
         * Method that is called automagically when logger is loaded by Simple History
         * Add your init stuff here
         *
         * @return void
         */
        function loaded()
        {
            add_filter('simple_history/user_can_clear_log', function ($user_can_clear_log) {
                $user_can_clear_log = false;

                return $user_can_clear_log;
            });

            add_action('acf/save_post', [$this, 'log_on_acf_save'], 5);
        }

        public function log_on_acf_save($post_id)
        {
            if ($post_id !== 'options') {
                return;
            }

            $this->menu_slug = $_GET['page'];

            $options = acf_get_options_page($this->menu_slug);

            // Get ACF fields before post saved
            $this->old_fields = get_fields($post_id, false);

            // Get current ACF fields of this post
            foreach ($_POST['acf'] as $acf_field_key => $acf_field_value) {
                $acf_field_value = is_string($acf_field_value) ? stripcslashes($acf_field_value) : $acf_field_value;

                $this->new_fields[get_field_object($acf_field_key)['name']] = $acf_field_value;
            }

            $meta_keys_to_ignore = array_diff_key($this->old_fields, $this->new_fields);

            foreach ($meta_keys_to_ignore as $meta_key => $meta_value) {
                unset($this->old_fields[$meta_key]);
            }

            $data_diff = array_diff_assoc($this->new_fields, $this->old_fields);

            if (!count($data_diff)) {
                return;
            }

            $context = [
                'post_id' => $post_id,
                'page_title' => $options['page_title'],
                'menu_title' => $options['menu_title'],
                'parent_slug' => $options['parent_slug'],
                'menu_slug' => $this->menu_slug,
            ];

            foreach ($data_diff as $meta_key => $meta_value) {
                $context['acf'][$meta_key] = [
                    'old' => $this->old_fields[$meta_key],
                    'new' => $this->new_fields[$meta_key],
                ];
            }

            $this->log(SimpleLoggerLogLevels::INFO, 'option_updated', $context);
        }

        /**
         * Modify plain output to include link to post.
         *
         * @param array $row Row data.
         * @return string
         */
        public function getLogRowPlainTextOutput($row)
        {
            $context = $row->context;

            // Default to original log message.
            $message = $row->message;

            // If post is not available any longer then we can't link to it, so keep plain message then.
            $edit_link = menu_page_url($context['menu_slug'], false);
            $edit_link = empty($edit_link) ? admin_url('admin.php?page=' . $context['menu_slug']) : '';

            $context['edit_link'] = $edit_link;

            // Also keep plain format if user is not allowed to edit post (edit link is empty).
            if ($message === 'option_updated' && $context['edit_link']) {
                $message = 'Updated {post_id} <a href="{edit_link}">"{page_title}"</a>';
            } else {
                $message = 'Updated {post_id} "{page_title}"';
            }

            return $this->interpolate($message, $context, $row);
        }

        /**
         * Use this method to output detailed output for a log row
         * Example usage is if a user has uploaded an image then a
         * thumbnail of that image can bo outputed here
         *
         * @param object $row
         * @return string HTML-formatted output
         */
        public function getLogRowDetailsOutput($row)
        {
            $context = $row->context;

            $output = '';

            $diff_table_output = '';
            $has_diff_values = false;

            if (isset($context['acf'])) {
                $context['acf'] = json_decode($context['acf'], true);

                $meta_changed_out = '';
                $has_diff_values = true;

                $meta_changed_out .= '<span class="SimpleHistoryLogitem__inlineDivided">' .
                    count($context['acf']) . ' changed</span>';

                $diff_table_output .= sprintf(
                    '<tr><td>%1$s</td><td>%2$s</td></tr>',
                    esc_html(__('Custom fields', 'simple-history')), $meta_changed_out
                );

                $meta_keys_attachment_id = [
                    'acf_option_header_logo_url',
                    'acf_option_footer_logo_url',
                    'acf_contact_form_logo',
                ];

                foreach ($context['acf'] as $meta_key => $meta_value) {
                    if (in_array($meta_key, $meta_keys_attachment_id)) {
                        $meta_value['old'] = wp_get_attachment_image_url($meta_value['old'], 'full');
                        $meta_value['new'] = wp_get_attachment_image_url($meta_value['new'], 'full');
                    }

                    $diff_table_output .= sprintf(
                        '<tr><td>%1$s</td><td>%2$s</td></tr>',
                        $meta_key,
                        simple_history_text_diff(
                            $meta_value['old'],
                            $meta_value['new']
                        )
                    );
                }
            }

            /**
             * Modify the formatted diff output of a saved/modified post
             *
             * @param string $diff_table_output
             * @param array $context
             * @return string
             */
            $diff_table_output = apply_filters(
                'simple_history/post_logger/post_updated/diff_table_output',
                $diff_table_output,
                $context
            );

            if ($has_diff_values || $diff_table_output) {
                $diff_table_output =
                    '<table class="SimpleHistoryLogitem__keyValueTable">' .
                    $diff_table_output .
                    '</table>';
            }

            $output .= $diff_table_output;

            return $output;
        }
    }
}
