<?php
$LTQHtml = new html_ltq_helper();
global $ltqcategories,$opicltq_categories_lang;
 
$category_slug = esc_attr($_GET['cat_slug']);

$opicltq_lang = get_option(OPICLTQ_Input_SLUG.'language');
$link = $opicltq_categories_lang[$opicltq_lang][$category_slug]['url'];
$jsoncaturl = $opicltq_categories_lang[$opicltq_lang][$category_slug]['cat'];
$slug = $category_slug.'_'.$opicltq_lang;
$cat_options = $LTQHtml->categoryFromTransient($jsoncaturl,$slug);
 
?>
<div class="category-head">
	<table width="100%">
		<tr>
			<td width="80px"><span class="category-logo"><?php echo opicltq_cat_logo($category_slug,array('width'=>'80px','class'=>$category_slug)) ?></span></td>
			<td><h1 class="category-title"><a target="_blank" href="<?php echo $link; ?>"><?php echo $this->getLang($category_slug); ?></a></h1></td>
		</tr>
	</table>

</div>
<hr />
<?php
	echo $LTQHtml->Input('checkbox',array('name'=>'category_'.$opicltq_lang.'_'.$category_slug.'[]','options'=>$cat_options));
?>
