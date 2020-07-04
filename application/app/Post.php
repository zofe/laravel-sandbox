<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'Post'
 *
 * @property integer $id
 * @property string $sef
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Post extends Model {


	protected $table = 'posts';
    
	public function user(){
		return $this->belongsTo('User');
	}
    
    public static function rate($id, $value)
    {
        $value = min($value, 5);
        
        $post = Post::find($id);

        if (isset($post)){
            if($post->rating_count == 0){
               
                $post->rating = $value;
                $post->rating_count = 1;
            } else {
                $post->rating = round(($post->rating * $post->rating_count +  $value)  / ($post->rating_count + 1), 2);
                $post->rating_count = $post->rating_count+1; 
            }
            $post->save();
            return (object)$post->getAttributes();
        }
        return false;

    }
}