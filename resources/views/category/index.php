<?php foreach($category as $n):  ?>
  <div style="border: 2px solid black">
  <a style="text-decoration: none" href="<?=route('news', ['id' => $n['id']])?>"><h2><?=$n['title']?></h2></a> 
  </div>
<?php endforeach; ?>
<a style="text-decoration: none" href="<?=route('news')?>"><h2>Back</h2></a>