<?php

use PostTypes\PostType;
use PostTypes\Taxonomy;

$events = new PostType('event');
$events->columns()->hide([ 'date', 'author', 'body', 'comments', 'author', 'cb', 'editor' ]);
$events->filters([]);
$events->icon('dashicons-calendar-alt');
$events->register();
$types = new Taxonomy('type');
$types->options(['hierarchical' => false]);
$types->register();

add_action('acf/init', function () {
    acf_add_local_field_group(array(
      'key' => 'group_5c50d8d402f57',
      'title' => 'Event',
      'fields' => array(
        array(
          'key' => 'field_5c50d8ec936f1',
          'label' => 'Location',
          'name' => 'location',
          'type' => 'google_map',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'center_lat' => '',
          'center_lng' => '',
          'zoom' => '',
          'height' => '',
        ),
        array(
          'key' => 'field_5c50d909936f2',
          'label' => 'Street',
          'name' => 'street',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5c50d927936f3',
          'label' => 'City',
          'name' => 'city',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5c50d92f936f4',
          'label' => 'State',
          'name' => 'state',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5c50d933936f5',
          'label' => 'Zip Code',
          'name' => 'zip_code',
          'type' => 'number',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'min' => '',
          'max' => '',
          'step' => '',
        ),
        array(
          'key' => 'field_5c50d943936f6',
          'label' => 'Date',
          'name' => 'time',
          'type' => 'date_time_picker',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'display_format' => 'd/m/Y g:i a',
          'return_format' => 'd/m/Y g:i a',
          'first_day' => 1,
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'event',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'acf_after_title',
      'style' => 'seamless',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'permalink',
        1 => 'the_content',
        2 => 'excerpt',
        3 => 'discussion',
        4 => 'comments',
        5 => 'revisions',
        6 => 'slug',
        7 => 'author',
        8 => 'format',
        9 => 'page_attributes',
        10 => 'featured_image',
        11 => 'categories',
        12 => 'tags',
        13 => 'send-trackbacks',
      ),
      'active' => 1,
      'description' => '',
    ));
});
