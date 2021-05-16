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