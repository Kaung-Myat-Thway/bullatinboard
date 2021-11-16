<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new Post([
            'title' => $row['title'],
            'description'  => $row['description'],
            'status' => $row['status'],
           'create_user_id'=> Auth::user()->id,
           'updated_user_id'=> Auth::user()->id,
           
             
        ]);
    }
}
