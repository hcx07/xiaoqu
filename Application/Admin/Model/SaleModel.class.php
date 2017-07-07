<?php
namespace Admin\Model;
use Think\Db;
use Think\Model;

class SaleModel extends Model{
    protected $_validate  = [
        ['tel', 'require', '电话不能为空'],
        ['title', 'require', '标题不能为空'],
//        ['title', 'unique', '标题不能重复'],
        ['price', 'require', '价格不能为空'],
        ['content', 'require', '内容不能为空'],
        ['describe', 'require', '简单描述不能为空'],
        ['end_time', 'require', '截止时间不能为空',],
        ['img', 'require', '图片不能为空',self::MODEL_INSERT],
        ];
    protected $_auto = [
        ['time',NOW_TIME],
        ['username','admin'],
    ];
    public function Sale(){
        $list=$this->select();
        return $list;
    }
    public function Edit($id){
        $one=$this->where('id='.$id)->find();
        return $one;
    }
}