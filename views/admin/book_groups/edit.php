<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>

<div class="col-md-10 col-sm-9 pad0">
  <div class="tab-content">
    <section>
      <?php
      include_once 'views/admin/book_groups/form.php';
      ?>
    </section>
  </div>
</div>

<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>

<script src="<?php echo RootREL; ?>media/admin/js/form_slug.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description', {});
  CKEDITOR.config.baseFloatZIndex = 100001;
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script>

  var book_group_id = <?php echo $this->record['id']; ?>;

  $('.book-group-edit').on('click', '.hide-text', function() {
    var ItemObjectID = $(this).attr('data');
    var action = $(this).attr('act') ? $(this).attr('act') : null;
    console.log('test', action);
    $(this).text(function(i, text) {
      $.ajax({
        type: "POST",
        url: rootUrl + 'user/book_groups/changeOwnerStatusGroupBook',
        data: {
          id: ItemObjectID,
          status: (text === "Hide") ? 2 : 1,
          action: action
        },
        success: function(res) {
          var resObject = JSON.parse(res);
          if (resObject.status == 1) {
            if (action === "current_read_status") {
              if (text === "Hide") {
                $('.book_found_curr .title-part-' + ItemObjectID).addClass('opacity4');
                $('.book_found_curr #hide_' + ItemObjectID).text("Unhide");
              } else {
                $('.book_found_curr .title-part-' + ItemObjectID).removeClass('opacity4');
                $('.book_found_curr #hide_' + ItemObjectID).text("Hide");
              }
            }

            if (action === "previous_read_status") {
              if (text === "Hide") {
                $('.book_found_pre .title-part-' + ItemObjectID).addClass('opacity4');
                $('.book_found_pre #hide_' + ItemObjectID).text("Unhide");
              } else {
                $('.book_found_pre .title-part-' + ItemObjectID).removeClass('opacity4');
                $('.book_found_pre #hide_' + ItemObjectID).text("Hide");
              }
            }

          } else {
            confirm(resObject.message);
          }
        }
      });
    });
  });

  $('.book-group-edit').on('click', 'button.moveItem-record', function() {
      var status = $(this).attr('act') ? $(this).attr('act') : null;
      if (status === "current_read_status") {
        var isDel = confirm("Are you sure to change this data becomes the previous read?");
      }

      if (status === "previous_read_status") {
        var isDel = confirm("Are you sure to change this data becomes the current read?");
      }
      var data = $(this).attr('alt');
      var data = data.split(',');
      var ItemID = parseInt(data[0]);
      var act = data[1].trim();
      if (isDel) {
        changeStatusUser(ItemID, status, act);
      }
    });

    function changeStatusUser(ItemID, ItemStatus, act) {
      urlEdit = rootUrl + 'user/' + ctl_page + '/' + act + '/id=' + ItemID;
      $.ajax({
          method: "POST",
          url: urlEdit,
          data: {
            status: ItemStatus
          }
        })
        .done(function(res) {
          var resObject = JSON.parse(res);
          if (resObject.status == true) {
            if (act === "deleteGroup") {
              window.location.href = rootUrl + "user/book_groups";
            } else {
              window.location.href = rootUrl + "admin/book_groups/edit/" + book_group_id;
            }
          } else {
            alert(resObject.error);
          }
        });
    }


</script>