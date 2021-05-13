<?php

namespace App\Exports;

use App\Models\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostsExport implements FromCollection, WithTitle, WithHeadings, WithMapping
{

    protected $post;

    function __construct($post) {
        $this->post = $post;
    }
    
    public function collection() {
        // if($this->keyword != '') {
        //     $userid = User::where('name',$this->keyword)->value('id');
        //     if(Auth::User()->type=='0') {
        //         $posts_info = Posts::select('*')
        //         ->where('title','LIKE','%'.$this->keyword.'%')
        //         ->orWhere('description','LIKE','%'.$this->keyword.'%')->get();
        //         $posts_user = Posts::select('*')->where('create_user_id',$userid)->paginate(10);
        //         if(count($posts_info)>0){
        //             $posts = $posts_info;
        //         }else {
        //             $posts = $posts_user;
        //         }
        //     }else {
        //         $posts_tit = Posts::select('*')
        //         ->where('create_user_id',Auth::User()->id)
        //         ->where('title','LIKE','%'.$this->keyword.'%')->get();
        //         $posts_desc = Posts::select('*')
        //         ->where('create_user_id',Auth::User()->id)
        //         ->where('description','LIKE','%'.$this->keyword.'%')->get();
        //         $posts_user = Posts::where('create_user_id',Auth::User()->id)
        //         ->where('create_user_id',$userid)->get();
        //         if(count($posts_tit)>0) {
        //             $posts = $posts_tit;
        //         }elseif(count($posts_desc)>0) {
        //             $posts = $posts_desc;
        //         }else {
        //             $posts = $posts_user;
        //         }
        //     }
        // }
        return $this->post;
    }

    public function map($post) : array {
        return [
            $post->title,
            $post->description,
            $post->created_user_id,
            $post->created_at->format('Y/m/d'),
        ];
    }

    public function headings(): array
    {
        return [
            'Title',
            'Description',
            'Posted User',
            'Posted Date',
        ];
    }

    public function title(): string
    {
        return 'Search Results';
    }
}