<?php
namespace Admin\Controller;
use Admin\Model\SaleModel;

class SaleController extends AdminController{
    public function index(){
        $model=new SaleModel();
        $sale=$model->sale();
//        var_dump($sale);exit;
        $this->assign('sale',$sale);
        $this->display();
    }
    public function edit(){
        $id=$_GET['id'];
//        var_dump($_POST);exit;
        if(IS_POST) {
            $User = D("Sale"); // 实例化User对象
            $_POST['time']=time();
            $_POST['username']='admin';
// 根据表单提交的POST数据创建数据对象
            if ($User->create()) {
                $result = $User->save(); // 写入数据到数据库
                if ($result) {
                    $this->success('修改成功', U('index'));
                } else {
                    $this->error('修改失败');
                }
            }else {
                $this->error($User->getError());
            }
        }
        $model=new SaleModel();
        $date=$model->Edit($id);
//        var_dump($date);exit;
        $this->assign('date',$date);
        $this->display();
    }
    public function add(){
        if(IS_POST) {
            $User = D("Sale"); // 实例化User对象
//            $_POST['time']=time();
//            $_POST['username']='admin';
// 根据表单提交的POST数据创建数据对象
            if ($User->create()) {
                $result = $User->add(); // 写入数据到数据库
                if ($result) {
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            }else {
                $this->error($User->getError());
            }
        }
        $this->display();
    }
    public function del(){
        $id=$_GET['id'];
        $Form = M('Sale');
        if($Form->delete($id)){
            $this->success('删除成功', U('index'));
        }else {
            $this->error('删除失败');
        }
        $this->display();
    }


}