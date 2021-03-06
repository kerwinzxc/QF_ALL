<?php
/**
 * MessageController.class.php UTF-8
 * 消息控制中心
 *
 * @date    : 2016年10月8日下午3:06:32
 *
 * @license 这不是一个自由软件，未经授权不许任何使用和传播。
 * @author  : wuyonghong <wyh@huosdk.com>
 * @version : H5 2.0
 */
namespace Mobile\Controller;

use Common\Controller\MobilebaseController;

class MessageController extends MobilebaseController {
    function _initialize() {
        parent::_initialize();
        $this->assign('msgactive', 'active');
        $this->assign('title', '我的消息');
    }

    function _mymsg(){
        $_mem_id = $_SESSION['user']['id'];
        $app_id = $_SESSION['app']['app_id'];
        $_join1 = 'LEFT JOIN '.C('DB_PREFIX').'mem_message mm on mm.message_id=msg.id AND mm.mem_id='.$_mem_id;
        $_map['msg.mem_id'] = ['in', '0,'.$_mem_id];
        $_extra_map = "msg.app_id = ".$app_id." and mm.is_delete =2  OR mm.is_delete is null";
        $_field = $this->getListfield();
        $_field['mm.status'] = 'readed';
        $_order = "msg.id DESC ";
        $_list = M('message')
                   ->alias('msg')
                   ->field($_field)
                   ->join($_join1)
                   ->where($_map)
                   ->where($_extra_map)
                   ->order($_order)
                   ->select();
        $this->assign('mymsg', $_list);
        $this->display();
    }
    private function getListfield() {
        $_field = [
            'msg.id'        => 'msgid',
            'msg.title'     => 'title',
            'msg.app_id'    => 'gameid',
            'msg.type'      => 'type',
            'msg.send_time' => 'createtime',
        ];

        return $_field;
    }

    /**
     * 我的消息
     */
    function mymsg() {
        // 获取消息数据
        $mymsg = $this->getMessage();
        $this->assign('mymsg', $mymsg);
        $this->display();
    }

    /**
     * 获取消息数据
     */
    protected function getMessage() {
        $app_id = $_SESSION['app']['app_id'];
        $map['app_id'] = $app_id;
        $map['post_status'] = 2; // post状态,2已审核,1未审核 3 审核不通过 0 伪删除
        $field = "p.*, u.user_nicename, CONCAT('/".C('UPLOADPATH').C('POSTS')."/' , p.smeta) icon, g.name";
        $msgdata = M('posts')->alias('p')->field($field)->join(
            'LEFT JOIN '.C('DB_PREFIX').'users u on u.id = p.post_author'
        )->join(
            'LEFT JOIN '.C('DB_PREFIX').'game g on g.id = p.app_id'
        )->where($map)->order(
            'p.is_top desc, p.recommended desc, p.post_modified desc'
        )-> // 置顶，推荐
        select();
        return $msgdata;
    }
}