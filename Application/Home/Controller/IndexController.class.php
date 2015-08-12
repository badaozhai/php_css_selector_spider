<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        if(IS_POST){
            $url = "http://cs.ganji.com/banjia/";//前端输入的抓取url
            $reg = M('Reg')->find(1);//前端选择的抓取规则
            $referer = "http://cs.ganji.com";//前端输入的初始请求来源
            //第一页
            $this->firstPage($url,$reg,$referer);
            //其他页
            $this->otherPage($url,$reg);
        }else{
            $regs = M('Reg')->select();
            $this->assign('regs',$regs);
            $this->display();
        }
    }

    /**
     * Description:抓取第一页数据
     * @param $url
     * @return array
     * Created by ChenJian.
     */
    public function firstPage($url,$reg,$referer){
        $html = getHtml($url,$referer);
        parse($url,$reg,$html);
    }

    /**
     * Description:抓剩下几十页的数据
     * Created by ChenJian.
     */
    public function otherPage($url,$reg){
        $page_key = $reg['page_key'];
        $max_page = $reg['max_page'];
        for($p=2;$p<=$max_page;$p++){
            if($p==2){
                //第二页的时候refere是第一页
                $referer = $url;
                $newUrl = str_replace('?',$page_key.''.$p.'/?',$url);
            }else{
                //往后面的页数就是上一页的来源
                $referer = str_replace('?',$page_key.''.($p-1).'/?',$url);;
                $newUrl = str_replace('?',$page_key.''.$p.'/?',$url);
            }
            $html = getHtml($newUrl,$referer);
            parse($html);
        }
    }

    /**
     *
     */
    public function excel(){

        if(IS_POST){
            $start = I('post.start');
            $end = I('post.end');
            $map = array();
            $map['id'] = array('between',$start.','.$end);
            $res = M('User')->where($map)->select();
            header("Content-type:application/vnd.ms-excel");
            header("Content-Disposition:attachment;filename=数据--".$start."--".$end.".xls");
            //输出内容如下：
            echo   "编号"."\t";
            echo   "姓名"."\t";
            echo   "手机"."\t";
            echo   "\n";

            foreach($res as $row){
                echo   $row['id']."\t";
                echo   $row['name']."\t";
                echo   $row['phone']."\t";
                echo   "\n";
            }
        }else{
            $users = M('User')->select();
            $this->assign('users',$users);
            $this->display('excel');
        }

    }
}