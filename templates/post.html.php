<p><?=$totalPost?> Post have been submitted to the Internet Post Database. </p>

<?php foreach($posts as $post): ?>
        <blockquote>
        <?=htmlspecialchars($post['posttext'], ENT_QUOTES, 'UTF-8')?>
        <br /><?=htmlspecialchars($post['moduleName'], ENT_QUOTES, 'UTF-8')?>
        <form action="deletepost.php" method="post">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <!-- <input type="submit" value="Delete"> -->

        (by<a href="mailto:<?=htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($post['name'],ENT_QUOTES, 'UTF-8'); ?></a>)

        <!-- <a href="editpost.php?id=<?=$post['id']?>">Edit</a> -->

        <!-- <form action="deletepost.php" method="post"> -->

        </form>
        <?php $display_date = date("D d M Y", strtotime($post['postdate']))?>
        <?=htmlspecialchars($display_date,ENT_QUOTES, 'UTF-8')?>
        <img height="100px" src="img/<?=htmlspecialchars($post['post_pic'], ENT_QUOTES ,'UTF-8'); ?>"/>
        </blockquote>
        <?php endforeach;?>