
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
<!-- <script src="/2018/project/php/village-ties/source-code/media/js/encode-character.js"></script> -->
<script src="<?php echo RootREL; ?>media/js/searchBook.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script>

	CKEDITOR.replace( 'description', {} );
  CKEDITOR.config.baseFloatZIndex = 100001;
  
  $("#import_gl").click(function() {
    var toggle = $("#form-addbook").attr("toggle");
    if(toggle==0){
      $("#form-addbook").hide();
    }
  });
  $('#import_gl').click(function () {
      $('#search_google').show();
  });
  var error = "<?php if(isset($this->errors)){ echo true; }else{ echo false; } ?>";
  if(error) {
    $("#form-addbook").show();
    $('#search_google').hide();
  }
  var data = <?php echo json_encode($this->records); ?>;
  var RootREL = "<?php echo RootREL; ?>";
  getDataSearchAutomatic(data, 'getFavTitleAuthor', 'favorite_title_author');
  getDataSearchAutomatic(data, 'getFavIsbn10', 'favorite_isbn');
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
