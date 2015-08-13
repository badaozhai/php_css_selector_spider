<?php
namespace Home\Controller;

use Think\Controller;

class ExcelController extends Controller
{


    /**
     *
     */
    public function excel()
    {

        if (IS_POST) {
            $start = I('post.start');
            $end = I('post.end');
            $map = array();
            $map['id'] = array('between', $start . ',' . $end);
            $res = M('User')->where($map)->select();
            header("Content-type:application/vnd.ms-excel");
            header("Content-Disposition:attachment;filename=数据--" . $start . "--" . $end . ".xls");
            //输出内容如下：
            echo "编号" . "\t";
            echo "姓名" . "\t";
            echo "手机" . "\t";
            echo "\n";
            foreach ($res as $row) {
                echo $row['id'] . "\t";
                echo $row['name'] . "\t";
                echo $row['phone'] . "\t";
                echo "\n";
            }
        } else {
            $users = M('User')->select();
            $this->assign('users', $users);
            $this->display('excel');
        }
    }

    public function test(){
        $url = "http://cs.ganji.com/banjia/";
        $reg = M('Reg')->find(1);
        $this->otherPage($url,$reg);
    }
}