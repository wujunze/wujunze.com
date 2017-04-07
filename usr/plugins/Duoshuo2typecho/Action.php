<?php

class Duoshuo2typecho_Action extends Typecho_Widget implements Widget_Interface_Do
{
    private $pluginPath; //插件路径
    private $filePath;  //上传文件路径
    private $threadsArr;  //文章数组
    private $postsArr;  //评论数组
    private $adminName;  //多说管理员昵称

    public function __construct($request, $response, $params)
    {
        parent::__construct($request, $response, $params);
        $this->pluginPath = '.'. __TYPECHO_PLUGIN_DIR__.'/Duoshuo2typecho/';
    }

    public function action()
    {
        $this->widget('Widget_User')->pass('administrator');
        if (isset($_FILES)) {
            $this->adminName = $this->request->get('admin_name');
            $this->upload($_FILES);
        }
    }

    /**
     * 导入
     */
    public function startImport()
    {

        $this->getJsonArr();
        $db = Typecho_Db::get();
        $totalCount = 0;
        $repeatCount = 0;
        foreach ($this->postsArr as $post) {
            unset($data);
            $data = array(
                'post_id' => intval($post['post_id']),
                'created' => strtotime($post['created_at']),
                'author' => $this->removeEmoji($post['author_name']),
                'authorId' => $post['author_name'] == $this->adminName ? 1 : 0,
                'ownerId' => 1,
                'mail' => $post['author_email'],
                'url' => $post['author_url'],
                'ip' => $post['ip'],
                'agent' => 'Duoshuo2typecho Plugin',
                'text' => $this->removeEmoji($post['message']),
                'type' => 'comment',
                'status' => 'approved',
            );
            $threadId = $post['thread_id'];
            $foundThread = array_filter($this->threadsArr, function($thread) use ($threadId) { return $thread['thread_id'] == $threadId; });
            foreach ($foundThread as $thread) {
                $data['cid'] = $thread['thread_key'];
            }
            if (count($post['parents']) != 0) {
                $parentId = intval($post['parents'][0]);
                $parent = $db->fetchRow($db->select('coid')->from('table.comments')->where('post_id=?', $parentId));
                if (is_array($parent)) $data['parent'] = intval($parent['coid']);
            }
            $haveComment = $db->fetchRow($db->select('coid')->from('table.comments')
                                                    ->where('text=?', $data['text'])->where('author=?', $data['author'])
                                                    ->where('created=?', $data['created']));
            if (empty($haveComment)) {
                //如果为非重复评论，则插入到评论表里
                $insert = $db->insert('table.comments')->rows($data);
                $insertId = $db->query($insert);
                $totalCount ++;
            } else {
                //若已有重复评论，则不做插入动作，并计数
                $repeatCount ++;
            }
        }
        unset($this->postsArr,$this->threadsArr);
        unlink($this->filePath); //删除上传的json文件
        $this->widget('Widget_Notice')->set(_t('评论已导入成功，共计 ' . $totalCount . ' 条，过滤重复评论 ' .$repeatCount. ' 条。'), NULL, 'success');
        $this->response->goBack();
    }

    /**
     * 读取json
     */
    public function getJsonArr()
    {
        $arr = json_decode(file_get_contents($this->filePath), true);
        $this->threadsArr = $arr['threads'];
        $this->postsArr = $arr['posts'];
        unset($arr);
        if (empty($this->threadsArr) || empty($this->postsArr)) {
            $this->widget('Widget_Notice')->set(_t('没有要导入的评论，或者导入的文件内容格式不正确'), NULL, 'error');
            $this->response->goBack();
        }
    }

    /**
     * 上传文件
     * @param $file
     */
    public function upload($file)
    {
        $commentJson =  $file['comment_json'];
        if ($commentJson['error'] == UPLOAD_ERR_OK) {
            $tempName = $commentJson['tmp_name'];
            $fileName = explode('.',$commentJson['name']);
            if (end($fileName) != 'json') {
                $this->widget('Widget_Notice')->set(_t('上传文件格式不正确，必须是.json后缀文件！'), NULL, 'error');
            } else {
                $fileName = time() . rand(1, 100) . '.' . end($fileName);
                if (move_uploaded_file($tempName, $this->pluginPath . $fileName)) {
                    $this->filePath = $this->pluginPath . $fileName;
                    $this->startImport();
                } else {
                    $this->widget('Widget_Notice')->set(_t('上传失败，可能是由于插件目录没有写入权限。'), NULL, 'error');
                }
            }
        } else {
            $this->widget('Widget_Notice')->set(_t('上传文件格式不正确，必须是.json后缀文件！'), NULL, 'error');
        }
        $this->response->goBack();
    }

    /**
     * 移除Emoji
     */
    public function removeEmoji($str)
    {
          return preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $str);

    }
}
