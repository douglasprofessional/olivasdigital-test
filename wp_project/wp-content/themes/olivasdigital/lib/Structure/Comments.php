<?php
/**
 * OD Comments.
 *
 * WARNING: This file is part of the OD Base theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package OD\Theme\Structure
 * @author  OlivasDigital
 * @license GPL-2.0+
 * @link    https://olivas.digital/
 */

namespace OD\Theme\Structure;

/**
 * Content rendering functions for the comments.
 *
 * @since  1.0.0
 * @author OlivasDigital
 */
class Comments {


	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	public function ready() {
		add_filter( 'comment_form_fields', array( $this, 'move_comment_field_to_bottom' ) );
	}

	/**
	 * Move the comment field to bottom in the comments form.
	 *
	 * @since 1.0.0
	 * @param array $comment_fields The comment fields.
	 */
	public function move_comment_field_to_bottom( $comment_fields ) {

		if ( empty( $comment_fields['comment'] ) ) {
			return $comment_fields;
		}

		$comment = $comment_fields['comment'];
		unset( $comment_fields['comment'] );
		$comment_fields['comment'] = $comment;

		return $comment_fields;
	}
}
