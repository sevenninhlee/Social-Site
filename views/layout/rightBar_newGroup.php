<div class="space30"></div>
<h3 class="f700">New Groups</h3>
<?php foreach($this->newBookGroups as $key => $newBookGroup) { ?>
<div class="white_box no-padding">
    <div class="img-box">
    <a href="<?php echo RootURL."book-groups/".$newBookGroup['slug'] ?>"><img src="<?php echo RootREL; ?>media/upload/<?= ($newBookGroup['featured_image']) ? 'book_groups/'.$newBookGroup['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
    </div>
    <div class="img-desc">
    <h4 class="f700"><a style="color: #333" href="<?php echo RootURL."book-groups/".$newBookGroup['slug'] ?>"><?= $newBookGroup['title'] ?></a></h4>
    <p>Category: <span class="f400"><?= $newBookGroup['book_categories_name'] ?></span></p>
    </div>              
</div>
<?php } ?>