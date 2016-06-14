<?php
add_action('cmb2_admin_init', 'eventpro_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function eventpro_metaboxes()
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_eventpro_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id' => 'event-metabox',
        'title' => __('Event Metabox', 'cmb2'),
        'object_types' => array('page', 'events'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ));

    $cmb->add_field(array(
        'name' => __('Sub Title'),
        'desc' => 'Subtitle of this event',
        'default' => '',
        'id' => $prefix . 'sub_title',
        'type' => 'text'
    ));

    $cmb->add_field( array(
        'name' => __('Event Date',''),
        'id'   => $prefix . 'event_date',
        'type' => 'text_date_timestamp',
        'desc' => __('Event Date', 'cmb2'),
        // 'timezone_meta_key' => 'wiki_test_timezone',
         'date_format' => 'm/d/Y',
    ) );
    $cmb->add_field(array(
        'name' => __('Open At'),
        'id' => $prefix . 'open_at',
        'type' => 'text_time',
        'time_format' => 'h:i',
        'desc' => __('Open At', 'cmb2'),
        'cmb-type-text-time'=>'open-at'
    ));
    $cmb->add_field( array(
        'name' => __( 'Start At', 'cmb2' ),
        'id' => $prefix .'start_at',
        'type' => 'text_time',
        'desc' => __('Start At', 'cmb2'),
        'time_format' => 'h:i',
        'cmb-type-text-time'=>'open-at'
    ) );
    $cmb->add_field( array(
        'name'    => __('Status', 'cmb2'),
        'id' => $prefix . 'status',
        'desc' => __('Published Status', 'cmb2'),
        'type'    => 'radio_inline',
        'default' => 'live',
        'options' => array(
            'live' => __( 'Live', 'cmb2' ),
            'none'   => __( 'none', 'cmb2' ),
        ),
    ) );

    $cmb->add_field(array(
        'name' => __('ADV'),
        'desc' => 'Adv Cost',
        'id' => $prefix . 'adv',
        'type' => 'text_money',
        'before_field' => '¥', // Replaces default '$'
    ));

    $cmb->add_field(array(
        'name' => __('Door'),
        'desc' => 'Door Cost',
        'id' => $prefix . 'door',
        'type' => 'text_money',
        'before_field' => '¥', // Replaces default '$'
    ));

    $cmb->add_field(array(
        'name' => __('Drink'),
        'desc' => 'Drink Cost',
        'id' => $prefix . 'drink',
        'type' => 'text_money',
        'before_field' => '¥', // Replaces default '$'
    ));

    // Add other metaboxes as needed

}