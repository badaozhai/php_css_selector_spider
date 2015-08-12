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
            <form role="form">
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="请输入名称">
                </div>
                <div class="form-group">
                    <label for="info">描述信息</label>
                    <input type="text" class="form-control" id="info" name="info"
                           placeholder="请输入描述信息">
                </div>
                <div class="form-group">
                    <label for="inputfile">案例截图</label>
                    <input type="file" id="inputfile">
                </div>
                <div class="form-group">
                    <label for="unit_reg">单元格正则</label>
                    <input type="text" class="form-control" id="unit_reg" name="unit_reg"
                           placeholder="请输入单元格正则">
                </div>
                <div class="form-group">
                    <label for="name_reg">名字正则</label>
                    <input type="text" class="form-control" id="name_reg" name="name_reg"
                           placeholder="请输入名字正则">
                </div>
                <div class="form-group">
                    <label for="phone_reg">电话正则</label>
                    <input type="text" class="form-control" id="phone_reg" name="phone_reg"
                           placeholder="请输入电话正则">
                </div>
                <div class="form-group">
                    <label for="max_page">最大页数</label>
                    <input type="text" class="form-control" id="max_page" name="max_page"
                           placeholder="请输入最大页数">
                </div>
                <div class="form-group">
                    <label for="page_key">分页单词</label>
                    <input type="text" class="form-control" id="page_key" name="page_key"
                           placeholder="请输入分页单词">
                </div>
                <div class="form-group">
                    <label>分页词是否在?中</label>
                    <select class="form-control">
                        <option>是</option>
                        <option>否</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
    <div class = "row">
        规则demo图预览区域
    </div>
</div>
</body>
</html>