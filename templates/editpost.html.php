<form action = "" method="post">
    <input type="hidden" name="postid" value="<?=$post['id'];?>">
    <label for='posttext'>Edit your post here;</label>
    <textarea name="posttext" rows="3" cols="40">
        <?=$post['posttext']?>
    </textarea>
    <label for="users">Select User:</label>
    <select name="users">
        <?php foreach ($users as $user): ?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                <?= $post['userid'] == $user['id'] ? 'selected' : '' ?>>
                <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="modules">Select Module:</label>
    <select name="modules">
        <?php foreach ($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                <?= $post['moduleid'] == $module['id'] ? 'selected' : '' ?>>
                <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label for="fileToUpload">Choose an image:</label><br>
    <input type="file" id="fileToUpload" name="fileToUpload" accept="uploads/" ><br><br>
    <input type="submit" name="submit" value="Save">
    
</form>
