<!-- START ADVERT BLOCK -->
<div style="margin-top:1.2em;">
	<!-- GOOGLE AD CODE -->
</div> 
<!-- END ADVERT BLOCK -->
<?php wp_footer(); ?>
<footer id="footer">
	<div class="copy">All Rights Reserved</div>
	<div class="copyright">&copy; <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a> | Theme author <a href="https://blog.mons.ws/">Mons</a></div> 
</footer>
<script>
function change(idName) {
  if(document.getElementById(idName).style.display=='none') {
    document.getElementById(idName).style.display = '';
  } else {
    document.getElementById(idName).style.display = 'none';
  }
  return false;
}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" >
$('img').on('error',function(){
  $(this).attr('src', '<?php bloginfo('template_url'); ?>/img/splash.svg');
})
</script>
</body>
</html>
