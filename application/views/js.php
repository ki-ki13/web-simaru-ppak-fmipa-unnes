
       

<script src="<?= base_url('assets/JS/script.js')?>"></script>
<script>
$('.button').hover(
	  function() {
	    $('ul', this).stop().slideDown(200);
	  },
	  function() {
	    $('ul', this).stop().slideUp(200);
	  }
	);
</script>