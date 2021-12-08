<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createPost($data)
    {
        DB::table('posts')->insert($data);
    }
    public function updatePost($data)
    {
        DB::table('posts')->whereId($data['id'])->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $data['image'],
        ]);
    }

    public function deletePost($id)
    {
        DB::table('posts')->whereId($id)->delete();

        return redirect()->route('posts')->with('pesan', 'Data berhasil dihapus !!');
    }
    public function detailPost($id)
    {
        $dataDetail = DB::table('posts')->where('id', $id)->get();
        return $dataDetail;
    }

}
