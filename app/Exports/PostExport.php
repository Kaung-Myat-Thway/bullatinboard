<?php

namespace App\Exports;

use App\Models\Post;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        //return Post::select('title', 'description', 'status')->whereNull("deleted_at");
      //  return Post::select('id','title','description')->get();
        return Post::all();

        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'user_id' => $this->userName($this->user_id),
        //     'updated_at' => $this->updated_at,
        // ];

    }
    
 

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'status',
            'Description',
            'Posted Date',
            'Posted User'
           
        ];
    }

    public function map($post): array
    {
        
        return [
            $post -> id,
            $post -> title,
            $post -> status,
            $post -> description,
            $post -> created_at,
            $post -> user['name']
        ];
    } 

    
}
