<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Post::all();
    }

    public function headings(): array
    {
        return ['id', 'name', 'description', 'created_at', 'updated_at'];
        
    }
}
