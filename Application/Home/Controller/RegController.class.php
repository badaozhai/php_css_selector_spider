<?php
namespace Home\Controller;
use Think\Controller;
class RegController extends Controller {

    public function index(){
        $list = M('Reg')->select();
        $this->assign('list',$list);
        $this->display();
    }
   public function add()
   {
       if(IS_POST){
           $data = I('post.');
           M('Reg')->save($data);
       }
       $this->display();
   }
    public function update(){
        $id = I('get.id');
        $reg = M('Reg')->find($id);
        if(IS_POST){
            $reg->save(I('post.'));
        }
        $this->assign('reg',$reg);
        $this->display();
    }
    public function del(){
        $id = I('get.id');
        M('Reg')->delete($id);
    }
}