<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- 可选的Bootstrap主题文件（一般不使用） -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap-theme.min.css"></script>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title></title>
    <style type="text/css">
        /* Custom Styles */
        ul.nav-tabs{
            width: 140px;
            margin-top: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
        }
        ul.nav-tabs li{
            margin: 0;
            border-top: 1px solid #ddd;
        }
        ul.nav-tabs li:first-child{
            border-top: none;
        }
        ul.nav-tabs li a{
            margin: 0;
            padding: 8px 16px;
            border-radius: 0;
        }
        ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
            color: #fff;
            background: #0088cc;
            border: 1px solid #0088cc;
        }
        ul.nav-tabs li:first-child a{
            border-radius: 4px 4px 0 0;
        }
        ul.nav-tabs li:last-child a{
            border-radius: 0 0 4px 4px;
        }
        ul.nav-tabs.affix{
            top: 30px; /* Set the top position of pinned element */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>数据抓取系统</h1>
    </div>
    <div class="row">
        <div class="col-xs-2" id="myScrollspy">
            
    <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="125">
        <li class = "<?php echo (CONTROLLER_NAME.'/'.ACTION_NAME=='Index/index'?'active':'');?>">
            <a href="<?php echo U('Index/index');?>">抓取入口</a>
        </li>
        <li class = "<?php echo (CONTROLLER_NAME.'/'.ACTION_NAME=='Reg/index'?'active':'');?>">
            <a href="<?php echo U('Reg/index');?>">规则列表</a>
        </li>
        <li class = "<?php echo (CONTROLLER_NAME.'/'.ACTION_NAME=='Reg/add'?'active':'');?>">
            <a href="<?php echo U('Reg/add');?>">添加规则</a>
        </li>
        <li class = "<?php echo (CONTROLLER_NAME.'/'.ACTION_NAME=='Index/excel'?'active':'');?>">
            <a href="<?php echo U('Index/excel');?>">导出到excel</a>
        </li>
    </ul>

        </div>
        <div class="col-xs-10">
            <form class="form-inline" role="form" method="post">
                <div class="form-group">
                    <label for="start">开始编号</label>
                    <input type="text" class="form-control" id="start" name = "start"
                           placeholder="开始编号">
                </div>
                <div class="form-group">
                    <label  for="end">结束编号</label>
                    <input type="text" class="form-control" id="end" name = "end"
                           placeholder="结束编号">
                </div>

                <button type="submit" class="btn btn-primary">导出excel</button>
            </form>
            <table class="table table-bordered">
                <caption>数据列表</caption>
                <thead>
                <tr>
                    <th>编号</th>
                    <th>名称</th>
                    <th>电话</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo['id']); ?></td>
                        <td><?php echo ($vo['name']); ?></td>
                        <td><?php echo ($vo['phone']); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class = "row">
        规则demo图预览区域
    </div>
</div>
</body>
</html>