<?php 

//将验证信息抽离出来成为一个方法|验证用户名输入
function sanitizeFormUsername($inputText){
   $inputText = strip_tags($inputText);  //去掉标签
   $inputText = str_replace(" ","",$inputText);  //去除空格，第一是匹配空格，第二是替换 第三格式对象
   $inputText = ucfirst(strtolower($inputText));  //单词首字母大写
   return $inputText;   //返回出去
}

//验证姓名和邮箱
function sanitizeFormString($inputText){
   $inputText = strip_tags($inputText);  //去掉标签
   $inputText = str_replace(" ","",$inputText);  //去除空格，第一是匹配空格，第二是替换 第三格式对象
   $inputText = ucfirst(strtolower($inputText));  //单词首字母大写
   return $inputText;   //返回出去
}

//验证密码
function sanitizeFormPassword($inputText){
    $inputText = strip_tags($inputText);
    return $inputText;
}

//注册触发
if(isset($_POST["registerBotton"])){

    $username = sanitizeFormUsername($_POST["username"]);  //用封装的方法，进行判断
    $name = sanitizeFormString($_POST["name"]);  //验证名字
    $email = sanitizeFormString($_POST["email"]);   //验证邮箱
    $password = sanitizeFormPassword($_POST["password"]);   //验证密码
    $password2 = sanitizeFormPassword($_POST["password2"]);   //验证密码2
    

    //将拿到的值传到Accouot.php中
    //$issuccessful是说，如果已经验证成功了，进行跳转
    $issuccessful =$account->register($username,$name,$email,$password,$password2);
    if($issuccessful){
        //如果成功跳转
        header("Location:index.php");
    }

}


?>