<?php

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function understrap_posted_on() {
    $post = get_post();
    if ( ! $post ) {
        return;
    }

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( 'c' ) ), // @phpstan-ignore-line -- post exists
        esc_html( get_the_date() ), // @phpstan-ignore-line -- post exists
        esc_attr( get_the_modified_date( 'c' ) ), // @phpstan-ignore-line -- post exists
        esc_html( get_the_modified_date() ) // @phpstan-ignore-line -- post exists
    );

    $posted_on = apply_filters(
        'understrap_posted_on',
        sprintf(
            '<span class="posted-on"><span class="sr-only">%1$s</span> %3$s</span>',
            esc_html_x( 'Posted ', 'post date', 'understrap' ),
            esc_url( get_permalink() ), // @phpstan-ignore-line -- post exists
            apply_filters( 'understrap_posted_on_time', $time_string )
        )
    );

    echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}





function understrap_categories_list() {
    $categories_list = get_the_category_list( understrap_get_list_item_separator() );
    if ( $categories_list && understrap_categorized_blog() ) {
        /* translators: %s: Categories of current post */
        printf( '<span class="cat-links">' . esc_html__( 'Categories: %s', 'understrap' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}




function understrap_all_excerpts_get_more_link( $post_excerpt ) {
    return $post_excerpt . '...';
}