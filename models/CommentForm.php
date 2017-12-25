<?php
namespace app\models;
use Yii;
use yii\base\Model;
class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,250]]
        ];
    }
    public function saveComment($article_id)
    {
        $user1=User::findOne(2);
        $comment = new Comment;
        $comment->text = $this->comment;
        if(!Yii::$app->user->isGuest)
            $comment->user_id=$user1;
        else
        $comment->user_id = Yii::$app->user->id;
        $comment->article_id = $article_id;
        $comment->status = 0;
        //$comment->date = date('Y-m-d');
        return $comment->save();
    }
}