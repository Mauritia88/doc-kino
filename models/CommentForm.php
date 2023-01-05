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

    public function saveComment($film_id)
    {
        $comment = new Comment;
        $comment->review = $this->comment;
        $comment->id_user = Yii::$app->user->id;
        $comment->id_film = $film_id;
        $comment->status = 0;
        $comment->date = date('Y-m-d');
        return $comment->save();

    }
}
