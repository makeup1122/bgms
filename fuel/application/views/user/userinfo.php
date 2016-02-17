
<!doctype html>
<html lang="cn">
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="/user/userinfo" method="post">
    <input type="text" name="username" value="<?php echo $userinfo->username;?>">
    <input type="password" name="password" value="<?php echo $userinfo->password?>">
    <input type="text" name="mobile" value="<?php echo $userinfo->mobile?>">
    <input type="text" name="email" value="<?php echo $userinfo->email?>">
    <select name="status">
        <?php foreach ($statusVal as $key=>$item): ?>
            <option value="<?=$key?>" <?php if ($key == $userinfo->status): ?>selected<?php endif; ?>><?=$item?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="remark" value="<?php echo $userinfo->remark?>">
    <input type="text" name="role_id" value="<?php echo $userinfo->role_id?>" readonly>
    <input type="text" name="id" value="<?php echo $userinfo->id?>" hidden>
    <input type="submit" value="提交修改">
</form>
</body>