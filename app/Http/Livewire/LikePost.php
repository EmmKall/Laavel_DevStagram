<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLike;
    public $likes;

    public function render()
    {
        return view('livewire.like-post');
    }

    public function mount( $post )
    {
        $this->isLike = $post->checkLikes( auth()->user() );
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if( $this->post->checkLikes( auth()->user() ) )
        {
            $this->post->likes()->where( 'post_id', $this->post->id )->delete();
            $this->isLike = false;
            $this->likes --;
        } else
        {
            $this->post->likes()->create([ 'user_id' => auth()->user()->id ]);
            $this->isLike = true;
            $this->likes ++;
        }
    }

}
