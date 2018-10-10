<?php
// Context array
$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;
 
// Timber ender().
Timber::render( 'index.html.twig', $context );