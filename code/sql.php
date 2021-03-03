<?php

// Get all product have title 'product title' and price is set.
global $wpdb;

$title = 'product title';

$sql = "
SELECT ID
FROM {$wpdb->prefix}posts
INNER JOIN {$wpdb->prefix}postmeta
ON ({$wpdb->prefix}posts.ID = {$wpdb->prefix}postmeta.post_id)
WHERE
	(
		{$wpdb->prefix}posts.post_type='product'
		AND
		{$wpdb->prefix}posts.post_status='publish'
		AND
		{$wpdb->prefix}posts.post_title
		LIKE '%{$title}%'
	)
	AND
	(
		{$wpdb->prefix}postmeta.meta_key='_price'
		AND
		{$wpdb->prefix}postmeta.meta_value <> 0
	)";

$results = $wpdb->get_results( $sql, ARRAY_A ); // phpcs:ignore