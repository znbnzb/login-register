<!-- 用户登录需要用到的方法 -->

<?php
//创建一个名为 Account 的类
class Account {

    //定义一个属性来存储报错信息
    private $errorArray;

    //定义一个构造函数
    public  function __construct(){
        $this->errorArray=array(); 
    }

    //给外部提供一个公共的方法，因为设定了私有
    public function register($username,$name,$email,$password,$password2){
        $this->validateUsername($username); //用户名
        $this->validateName($name);  //姓名
        $this->validateEmail($email);  //邮箱
        $this->validatePassword($password,$password2);//密码

        //如果上面的验证都没有错误将执行下面的函数
        if(empty($this->errorArray) == true) {
            return true;
        }else{
            return false;
        }
    }
    //获取错误信息，给外部调用
    public function getError($error){
        //如果当前错误信息不存在赋值为空
        if(!in_array($error,$this->errorArray)){
            $error ="";
        }
        return "<span class='errorMessage'>$error</span>";

    }



    //验证用户名长度
    //private是一个私有的方法，当前的类可以使用
    private function validateUsername($un){
        //strlen 字符串方法，返回长度
        if(strlen($un) >25 || strlen($un) < 5) {
            array_push($this->errorArray,"用户名的长度要在5~25位字符之间！");
            return;
        }
        //满足添加了，接下来还需要增加 检查用户名是否存在
    }

    //验证名字长度
    private function validateName($nm){
        if(strlen($nm) >25 || strlen($nm) < 2) {
            array_push($this->errorArray,"名字长度要在2~25位之间");
            return;
        }
    }

    //验证邮箱
    private function validateEmail($em){
        if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray,"邮箱地址不合法");
            return;
        }
        //检查邮箱是否被注册过，是否存在...
    }
    //验证密码
    private function validatePassword($pw,$pw2){
        if($pw != $pw2){
            array_push($this->errorArray,"密码不一致");
            return;
        }
        //只有前面的方法成立了才会执行下面的函数
        if(preg_match('/[^A-Za-z0-9]',$pw)){
            array_push($this->errorArray,"密码只能是数字和字母组成");
            return;
        }
        //验证密码长度，要在5~25位之间
        if(strlen($pw) >25 || strlen($pw) < 5) {
            array_push($this->errorArray,"密码的长度要在5~25位字符之间！");
            return;
        }

    }
}

?>