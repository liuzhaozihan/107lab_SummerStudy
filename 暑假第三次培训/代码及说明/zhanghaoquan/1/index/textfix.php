<?php
    header("Content-type:text/html;charset=UTF-8");
    session_start();
    $link = mysqli_connect('localhost','root','123456');
    $select = mysqli_select_db($link,'text');
    mysqli_set_charset($link,'utf8');
    if($link){
        $sql = "select * from main;";
        $top_url = "select title from main where id = '1';";
        $top_result =mysqli_query($link,$top_url);
        $top=mysqli_fetch_row($top_result);
        $result = mysqli_query($link,$sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        $rows=array_reverse($rows);
        $_SESSION['top']=$top[0];
    }else{
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>理论学习-统战部</title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/more.css">
    <link rel="stylesheet" href="../css/moreleft.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../js/header.js"></script>
    <script type="text/javascript" src="../js/moreleft.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <a name="top"><img src="../images/top-bj2.gif" alt="NO FOUND"></a>
            <div class="headerfunc">
                <p>设为首页</p>
                <p><span>|</span></p>
                <p>加入收藏</p>
            </div>
            <div class="search">
                <div class="searchip">
                    <input type="text" placeholder="请输入搜索关键字">
                </div>
                <div class="searchbt">
                    <button>搜索</button>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="menu">
            <ul class="menupart">
                <a href="../index.php"><li>首页</li></a>
                <li><a href="bmjs.html">部门介绍</a>
                    <ul class="selected">
                        <li><a href="gzzz.html">工作职责</a></li>
                        <li><a href="gzzz.html">机构及人员</a></li>
                        <li><a href="gzzz.html">领导小组</a></li>
                    </ul>
                </li>
                <li><a href="dptt.html">党派团体</a>
                    <ul class="selected">
                        <li>民革河南大学支部</li>
                        <li>民盟河南大学委员会</li>
                        <li>民进河南大学总支委员会</li>
                        <li>民建河南大学总支委员会</li>
                        <li>农工党河南大学委员会</li>
                        <li>九三学社河南大学委员会</li>
                        <li>河南大学侨联</li>
                        <li>河南大学知联会</li>
                        <li>河南大学留联会</li>
                    </ul>
                </li>
                <li><a href="rdzx.html">人大政协</a>
                    <ul class="selected">
                        <li>人大政协</li>
                    </ul>
                </li>
                <li><a href="jyxc.html">建言献策</a>
                    <ul class="selected">
                        <li><a href="jyxc.html">建言献策</a></li>
                    </ul>
                </li>
                <li><a href="zcfg.html">政策法规</a>
                    <ul class="selected">
                        <li>理论经纬</li>
                        <li>学习资料</li>
                        <li>会议纪要</li>
                        <li>工作记事</li>
                    </ul>
                </li>
                <li><a href="mzzj.html">民族宗教</a>
                    <ul class="selected">
                        <li>民族工作</li>
                        <li>宗教工作</li>
                    </ul>
                </li>
                <li><a href="xzzq.html">下载专区</a>
                    <ul class="selected">
                        <li><a href="zlxz.html">资料下载</a></li>
                    </ul>
                </li>
                <li><a href="lxwm.html">联系我们</a>
                    <ul class="selected">
                        <li><a href="lyb.html">留言板</a></li>
                        <li>微博</li>
                        <li>联系方式</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="left">
                <div class="left1">
                    <li class="title">理论学习
                        <li><a href="llxx.html">理论学习</a></li>
                        <li><a href="tzgg.html">通知公告</a></li>
                        <li><a href="xwsd.html">新闻速递</a></li>
                        <li><a href="tzyw.html">统战忆往</a></li>
                        <li><a href="">人物风采</a></li>
                    </li>
                </div>
                <div class="left3">
                    <li class="title">校园风光</li>
                    <div class="leftpic">
                        <img src="../images/nature2.jpg" alt="NO FOUND">
                        <img src="../images/nature3.jpg" alt="NO FOUND">
                        <img src="../images/nature4.jpg" alt="NO FOUND">
                    </div> 
                </div>
                <div class="left2">
                    <li class="title">相关链接
                        <li><a href="">中共中央统一战线工作部</a></li>
                        <li><a href="">中共河南省委统战部</a></li>
                        <li><a href="">开封市委统战部</a></li>
                        <li><a href="">河南大学</a></li>
                        <li><a href="">"河大统战"杂志</a></li>
                    </li>
                </div>
            </div>
            <div class="right">
                <div class="righttitle">
                    <img src="../images/icon-index.png" alt="NO FOUND">
                    <p>当前位置：</p>
                    <a href="../index.html"><p>首页 </p></a>
                    <p>> 理论学习 </p>
                    <p> ></p>
                </div>
                <div class="rightmain">
                    <div class="rightpoint">
                    <?php foreach($rows as $key => $v) {
                            echo '<img src="../images/dotted.gif" alt="NO FOUND">';
                        }
                        ?>
                    </div>
                    <div class="righttext">
                    <?php 
                    if($top){
                    echo "<font color='red'>{$top[0]}*</font>";
                    echo "<a href='textqxzd.php'><font size='2px' color='gray'>&nbsp;&nbsp;取消置顶</font></a>";
                    }
                    ?>    
                    <?php foreach($rows as $key => $v) {
                            if($v['id']==0){
                                echo '<li><a href="zw01.html" target="_blank" title="中国共产党统一战线工作条例(示例)">';
                                echo  $v['title'];
                                echo '</a></li>';
                            }       
                        }
                    ?>
                    </div>
                    <div class="rightdate">
                    <?php foreach($rows as $key => $v) {
                            echo '<li>';
                            echo $v['time'];
                            echo '</li>';
                        }
                    ?>
                    </div>
                    <form action="textfixck.php" method="post">
                        <table class="delete">
                            <td>
                                <th>请输入要修改的文章标题：</th>
                                <th><input type="text" name="pasttitle" placeholder="要修改的标题" autocomplete="off"></th>
                                <th><input type="text" name="update" placeholder="新标题" autocomplete="off"></th>
                                <th><input type="text" name="date" placeholder="新日期" autocomplete="off"></th>
                                <th><input type="submit" name="del" value="确定"></th>
                            </td>  
                        </table>
                    </form>
                    <div class="rightfunc">
                        <p>共73条</p>
                        <p>1/8</p>
                        <p class="btn">首页</p>
                        <p class="btn">上页</p>
                        <p class="btn">下页</p>
                        <p class="btn">尾页</p>
                        <p>转到<input type="text">页</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
            <div class="footertitle"></div>
            <div class="footerp">
                <p>Copyright © 2019 河南大学党委统战部 技术支持河南大学 107网站工作室 管理后台</p>
                <p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
            </div>
        </div>
    </footer>
    <div class="function">
        <a href="#top"><img src="../images/dian.png" alt="NO FOUND"></a>
    </div>
</body>
</html>