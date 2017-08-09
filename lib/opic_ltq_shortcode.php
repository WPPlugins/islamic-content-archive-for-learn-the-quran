<?php
function opicltq_orginalurl_fun($value='')
{
	global $post;
	$meta_val = get_post_meta($post->ID,'orginal_url',true);
	$title= get_option(OPICLTQ_Input_SLUG.'source');
	return sprintf("<a href='%s' target='_blank'>%s</a>",$meta_val,$title);
}
add_shortcode('opic_orginalurl', 'opicltq_orginalurl_fun');
?>