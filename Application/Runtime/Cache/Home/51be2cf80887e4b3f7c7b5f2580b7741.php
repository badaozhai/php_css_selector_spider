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
</head>
<body>
<table class="table table-bordered">
    <caption>所有抓取规则列表</caption>
    <thead>
    <tr>
        <th>编号</th>
        <th>名称</th>
        <th>详情</th>
        <th>单元格正则</th>
        <th>名称正则</th>
        <th>电话正则</th>
        <th>分页词</th>
        <th>最大页数</th>
        <th>编辑</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo['id']); ?></td>
            <td><?php echo ($vo['name']); ?></td>
            <td><?php echo ($vo['info']); ?></td>
            <td><textarea style="width: 300px"><?php echo ($vo['unit_reg']); ?></textarea></td>
            <td><textarea style="width: 300px"><?php echo ($vo['name_reg']); ?></textarea></td>
            <td><textarea style="width: 300px"><?php echo ($vo['phone_reg']); ?></textarea></td>
            <td><?php echo ($vo['page_key']); ?></td>
            <td><?php echo ($vo['max_page']); ?></td>
            <td><a href = "<?php echo U('Reg/update',array('id'=>$vo['id']));?>">修改</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</body>
</html>