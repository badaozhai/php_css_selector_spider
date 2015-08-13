<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
        if (IS_POST) {
            $reg_id = I('post.reg_id');
            // print_r($reg_id);exit;
            $url = I('post.url'); //前端输入的抓取url
            // print_r($url);exit;
            $reg = M('Reg')->find($reg_id); //前端选择的抓取规则
            //第一页
            $this->firstPage($url, $reg);
            //其他页
            $this->otherPage($url, $reg);
        } else {
            $regs = M('Reg')->select();
            $this->assign('regs', $regs);
            $this->display();
        }
    }

    /**
     * Desc:抓取第一页数据
     * @param $url
     * @param $reg
     * by ChenJian.
     */
    public function firstPage($url, $reg)
    {
        $referer = $reg['referer_url'];
        $html = getHtml($url, $referer);
        parse_and_save($url, $reg, $html);
    }

    /**
     * Description:抓剩下几十页的数据
     * Created by ChenJian.
     */
    public function otherPage($url, $reg)
    {
        $max_page = $reg['max_page'];
        for ($p = 2; $p <= $max_page; $p++) {
            $referer = getNewReferer($url,$reg,$p);
            $newUrl = getNewUrl($url,$reg,$p);
            $html = getHtml($newUrl, $referer);
            parse_and_save($newUrl,$reg,$html);
        }
    }

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