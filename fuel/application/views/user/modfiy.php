
<!doctype html>
<html lang="cn">
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="/user/userinfo" method="post">
    <input name="a" value="add">
    <input name="g" value="user">
    <input name="m" value="add">
    <input type="text" name="username" value="<?php if(!empty($userinfo->username)){echo $userinfo->username;}?>" disabled>
    <input type="password" name="password" value="<?php if(!empty($userinfo->password)){echo $userinfo->password;}?>">
    <input type="text" name="mobile" value="<?php if(!empty($userinfo->mobile)){echo $userinfo->mobile;}?>">
    <input type="text" name="email" value="<?php if(!empty($userinfo->email)){echo $userinfo->email;}?>">
    <select name="status">
        <?php foreach ($statusVal as $key=>$item):
            $selected = "";
            if(!empty($userinfo->status) && ($key == $userinfo->status)){
                $selected="selected";
            }
            echo "<option value=".$key.$selected.">".$item."</option>";
         endforeach?>
    </select>
    <input type="text" name="remark" value="<?php if(!empty($userinfo->remark)){echo $userinfo->remark;}?>">
    <input type="text" name="role_id" value="<?php if(!empty($userinfo->role_id)){echo $userinfo->role_id;}?>" readonly>
    <input type="text" name="id" value="<?php if(!empty($userinfo->id)){echo $userinfo->id;}?>" hidden>
    <input type="submit" value="提交修改">
</form>
</body>