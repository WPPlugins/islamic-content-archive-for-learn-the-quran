<?php
$opicltq_categories_lang = array();



// ======================   Titles ==============================
												
$ltqcategories["learn_the_quran"] 		= array(
													'title'=>"Learn the Qur'an",
													'url'=>"http://www.learning-quran.com",
													'logo'=>"learning-quran.png",
												);

// =================== English ===========================



$opicltq_categories_lang['eng']['learn_the_quran']['url'] 				   =  $ltqcategories["learn_the_quran"]['url'];
$opicltq_categories_lang['eng']['learn_the_quran']['cat'] 				   =  $ltqcategories["learn_the_quran"]['url'].'/api/get_category_index/';
$opicltq_categories_lang['eng']['learn_the_quran']['importurl'] 		 	=  $ltqcategories["learn_the_quran"]['url'].'/api/get_category_posts/?slug=';

?>