<?php
function connectDb()
{
    $link = mysqli_connect("localhost", "root", "123456");
    if ($link) {
        mysqli_select_db($link, 'mydb');
        mysqli_query($link, "SET NAMES 'utf8'");
    } else {
        echo mysqli_error($link);
    }
    return $link;
}
 
 
$link = connectDb();
$result = mysqli_query($link, "SELECT * FROM photo");
$dataCount = mysqli_num_rows($result);
$show = false;
for ($i = 0; $i < $dataCount; $i++) {
    $result_arr = mysqli_fetch_assoc($result);
    $icon=$result_arr['photos'];
    $show = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>培养当代大学生的家国情怀和国际视野-统战部</title>
    <link rel="stylesheet" href="../css/moreleft.css">
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/zw01.css">
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
                    <a href="../index.php"><p>首页 </p></a>
                    <a href="llxx.php"><p>> 理论学习 </p></a>
                    <p> ></p>
                    <p>正文</p>
                </div>
                <div class="rightcontent">
                    <div class="contenttitle">
                        <p>培养当代大学生的家国情怀和国际视野</p>
                        <p>——访全国政协委员、河南大学校长宋纯鹏</p>
                        <span>发布时间：2020-04-09 10:38:21   作者：人民政协报</span>
                        <p>（一）</p>
                    </div>
                    <div class="contenttext">
                        <p>2020年初春的新冠肺炎疫情是新中国成立以来，传播速度最快、感染范围最广、防控难度最大的重大突发公共卫生事件，也是我们经历的一次最艰巨、最严峻的考验，在党中央坚强有力的领导下，在万千白衣战士舍生忘死的奋战中，全国人民携手同心，坚决打赢这场没有硝烟的战争。如今，中国国内疫情防控形势持续向好，然而，随着疫情在全球的蔓延，世界上众多国家正面临着疫情迅速攀升的严酷现实。此时，中国积极对外开展援助，向多个国家捐赠医疗防护物资、派驻医疗队，很多刚从国内抗疫一线撤下来的医护人员，不顾疲劳，又匆匆奔赴异国他乡的抗疫前线。全国政协委员、河南大学校长宋纯鹏说，在这种重大疫情面前，不分国界，不分种族，需要全人类共同面对。</p>
                        <p>宋纯鹏说，这次由新冠病毒引起的突发疫情，提出了许多重大问题，包括公共卫生管理、尊重生物多样性规则等，值得我们重视和反思。人类在面对“生物共生共存”的挑战时，充分发挥了各种能力和手段，运用智慧积极应对。“这次疫情中，我们欣喜地看到‘理解、包容、互助’等成为主流关键词，人们摒弃地域、种族、文化甚至政见的不同，以邻里般的姿态给需要援助的国家或人们送去温暖。网上流传的一则则国与国之间、城市与城市之间的互助故事令人感怀，所涌现出来的个人事迹也令人感动。作为一名大学校长，我自然而然地联想到了一个实质问题———那就是青年人的培养。”宋纯鹏坦言，当今世界全球互联、万物互联，对新时代青年人的思想、格局提出新的要求，思想有多远路就有多远，格局有多大天地就有多大。</p>
                    </div>
                    <div class="upimage">
                        <?php
                        if($show==true){
                            echo "<img src='{$icon}' height='300px' width='300px'>";
                            echo "<a href='delimg.php'><button>删除图片</button></a>";
                        }else{
                            echo "<a href='setting.php'><button>上传图片</button></a>";
                        }
                        ?>
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