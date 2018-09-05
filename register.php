<?php
//引入公共模块
include("includes/classes/Account.php");

//实例化一个对象
$account = new Account();

//引入注册php模块
include("includes/handlers/register-handler.php");

//引入登录php模块
include("includes/handlers/login-handler.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人音乐平台</title>
</head>
<body>
    <div class="iputContainer">
        <!-- 登录表单 -->
        <form action="register.php" id="loginForm" method="POST">
            <h2>登录您的账户</h2>
            <p>
                <label for="loginUsername">用户名：</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="请输入用户名" require>
            </p>
            <p>
                <label for="loginPassword">密码：</label>
                <input type="password" id="loginpassword" name="loginpassword" placeholder="请输入密码">
            </p>
            <button type="submit" name="loginButton">登录</button>
        </form>
        <!-- 注册表单 -->
        <form action="register.php" id="loginForm" method="POST">
            <h2>注册新的账户</h2>
            <p>
                <?php  echo $account->getError("用户名的长度要在5~25位字符之间！"); ?>
                <label for="name">用户 </label>
                <input type="text" id="username" name="username" placeholder="请输入您的用户名" require>
            </p>
            <p>
                <?php  echo $account->getError("名字长度要在2~25位之间"); ?>
                <label for="name">名字 </label>
                <input type="text" id="name" name="name" placeholder="请输入您的真实姓名" require>
            </p>
            <p>
                <?php  echo $account->getError("邮箱地址不合法"); ?>
                <label for="email">邮箱</label>
                <input type="email" id="email" name="email" placeholder="请输入您的邮箱" require>
            </p>
            <p>
                <?php  echo $account->getError("密码不一致"); ?>
                <?php  echo $account->getError("密码只能是数字和字母组成"); ?>
                <?php  echo $account->getError("密码的长度要在5~25位字符之间！"); ?>
                <label for="Password">密码：</label>
                <input type="password" id="password" name="password" placeholder="请输入您密码">
            </p>
            <p>
                <label for="Password2">确认密码：</label>
                <input type="password" id="password2" name="password2" placeholder="请输入您密码">
            </p>
            <button type="submit" name="registerBotton">注册</button>
        </form>
    </div>
</body>
</html>