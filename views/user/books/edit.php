
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <?php 
			include_once 'views/user/books/_form.php';
		?>
      </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/js/slugify.js"></script>
<script>

	CKEDITOR.replace( 'description', {
    on: {
          change: function() {
            document.getElementById("btn_submit").disabled = false;    
          }
    } 
  });
  CKEDITOR.config.baseFloatZIndex = 100001;
  
  $("form").bind("change keyup", function(event){
    document.getElementById("btn_submit").disabled = false;
  });
  
  $("#books_form_title").keyup(function(){
      $("#books_form_slug").val(slugify($(this).val()));
  });

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
