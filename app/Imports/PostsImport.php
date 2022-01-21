<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'id'     => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'created_at'    => $row['created_at'],
            'updated_at'    => $row['updated_at'],
        ]);
    }
}