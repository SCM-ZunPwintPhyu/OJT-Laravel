<?php

namespace App\Imports;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class PostsImport implements ToModel, WithValidation, WithHeadingRow, WithBatchInserts
{
    use Importable;

    public function model(array $row) {
        if (!isset($row['status'])) {
            $row['status'] = '1';
        }
        return new Post([
            'title'     => $row['title'],
            'description'    => $row['description'],
            'status'    => "0", 
            'created_user_id' =>Auth::user()->name,
            'updated_user_id' => "Not Updated",
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:255|unique:post,title,NULL,id,deleted_at,NULL',
            'description' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.'
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }
}