<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            min-width: 1200px;
            /* background-color: lightgreen; */
            font-size: 15px;
            font-family: 'Courier New', Courier, monospace;
            background: url(img/earth.jpg) no-repeat no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        a{
            text-decoration: none;
            color: green;
            font-size: 18px;
        }
        form {
            width: 30%;
            height: 380px;
            background-color: lightskyblue;
            margin: auto;
            opacity: 0.9;
            box-shadow: 5px 5px 5px 5px grey;
        }

         #login{
            padding-top: 10px;
            background-color: maroon;
            display: block;
            font-size: 30px;
        }
        #choice{
            width: 25%;
            height: 15px;
            display: inline-block;
            margin: 10px 5px;
            border: 3px solid black;
            border-radius: 10px;
            outline: none;
        }
        input{
            width: 80%;
            height: 25px;
            margin: 20px;
            border: 3px solid black;
            border-radius: 10px;
            outline: none;
        }
        span{
            display:inline-block;
        }
    </style>
</head>

<body>
    <div style="width: 100%;height:150px;"></div>
    <form action="adduser_action.php" method="POST">
        <center>
            <span id="login">添加一个用户</span>
            <input type="text" name="username" required placeholder="请添加用户名" autocomplete="off" >
            <input type="password" name="password" required placeholder="请添加用户登陆密码" autocomplete="off" >
            <input type="password" name="repassword" required placeholder="请确认用户登陆密码" autocomplete="off" >
            <input type="submit" value="添加用户一个新账号" style="background-color: green;color: white;">
        </center>
    </form>
    <div style="width: 100%;height:150px;"></div>
</body>
        
</html>