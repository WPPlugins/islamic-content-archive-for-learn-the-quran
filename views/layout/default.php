<form method="post" action="<?php admin_url( 'options-general.php?page='.OPICLTQ_Page_SLUG ); ?>">
<?php
	echo wp_nonce_field( "edc-settings-page" ); 
	
	$LTQHtmlHelper = new html_ltq_helper();
	$LTQHtmlHelper->opic_admin_tabs();
	$LTQHtmlHelper->MainContent($mainViewFile);
?>
   <p class="submit" style="clear: both;">
      <input type="submit" name="Submit"  class="button-primary" value="<?php echo $LTQHtmlHelper->getLang('btn-updatesetting') ?>" />
      <input type="hidden" name="ilc-settings-submit" value="Y" />
   </p>
</form>