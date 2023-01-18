<?php foreach($news as $n):  ?>
  <div style="border: 1px solid green">
      <h2><?=$n['title']?></h2>
      <p><?=$n['description']?></p>
      <div><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong>
      </div>
  </div>
<?php endforeach; ?>
<a style="text-decoration: none" href="<?=route('category')?>"><h2>Back</h2></a>