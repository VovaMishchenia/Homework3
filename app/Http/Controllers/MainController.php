<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use League\CommonMark\Inline\Element\Image;
class MainController extends Controller
{
    //головна сторінка
    public function Index(Request $request)
    {
        //дістаємо дані з таблиці категорії
        $categories=Category::query()->get();
        //дістаємо дані з таблиці постів
        $posts=Post::query()->get();
        //дістаємо дані з таблиці тегів
        $tags=Tag::query()->get();
        //повертаємо вигляд індекс, переславши туди категрії, пости, теги
        return view('index',['categories'=>$categories,'posts'=>$posts,'tags'=>$tags]);

    }
    //сторінка додавання поста
    public function  AddPost(Request $request)
    {
        //дістаємо дані з таблиці категорії
        $categories=Category::query()->get();
        //дістаємо дані з таблиці тегів
        $tags=Tag::query()->get();
        //повертаємо вигляд додавання постів, переславши туди категрії, теги
        return view('addPost',['categories'=>$categories,'tags'=>$tags]);

    }
    //сторінка зміни поста
    public function  UpdatePost($id)
    {//дістаємо дані з таблиці категорії
        $categories=Category::query()->get();
        //дістаємо дані з таблиці тегів
        $tags=Tag::query()->get();
        //дістаємо пост по id
        $post=Post::query()->find($id);
        //повертаємо вигляд зміни поста, переславши туди категрії, теги та пост, який буде змінений
        return view('updatePost',['categories'=>$categories,'tags'=>$tags,'post'=>$post]);

    }
    //сторінка деталбного вигляду поста
    public function  ShowPost($id)
    {
        //дістаємо пост по id
        $post=Post::query()->find($id);
        //повертаємо вигляд детального перегляду поста, переславши туди  пост
        return view('showPost',['post'=>$post]);

    }
    //метод для зберігання картинки на сервері
    public function UploadImage(Request $request)
    {
        //перевіряємо чи прийшла зміна file
        if ($request->hasFile('file')) {
            // перевірка чи валідний файл
            if ($request->file('file')->isValid()) {

               //дістаєио розширення файлу
                $extension = $request->file('file')->extension();
                //генеруємо рандомну назву для файла
                $name = sha1(microtime()) . "." . $extension;
                //зберігаємо файл на сервері під новою назвою
                $request->file('file')->storeAs('/public', $name);
                //дістаємо url файла
                $url = Storage::url($name);
                //повертаєсо сереалізований об'єкт json, в якому є посилання на файл
                return response()->json(['link' => $url]);
            }
        }
    }
    //метод додавання поста в БД
    public function CreatePost(Request $request)
    {
        $url='';
        //перевіряємо чи прийшла зміна file
        if ($request->hasFile('image')) {
            // перевірка чи валідний файл
            if ($request->file('image')->isValid()) {
                //дістаєио розширення файлу
                $extension = $request->image->extension();
                //генеруємо рандомну назву для файла
                $name = sha1(microtime()) . "." . $extension;
                //зберігаємо файл на сервері під новою назвою
                $request->image->storeAs('/public', $name);
                //дістаємо url файла
                $url = Storage::url($name);

            }
        }
      //зберігаємо новий пост в БД та дістаємо id щойно створеного поста
       $id= DB::table('post')->insertGetId([
            'title'=> $request->title,
            'description'=> $request->description,
            'shortDescription' => $request->shortDescription,
            'urlSlug' => $url,
            'category_id' => $request->category_id,
           'postedOn' => Carbon::now()->format('Y-m-d H:i:s'),
           'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
           'published' => true,
           'meta' => 'none'
        ]);
        //проходимось по вибраним тегам
        foreach ($request->tags as $tag_id)
        {
            //додаємо зв'язки багато до багатьох в табличку post_tag_map
            DB::table('post_tag_map')->insert([
               'post_id'=>$id,
               'tag_id'=>$tag_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
       //редірект на головну сторінку
        return redirect()->route('post.list');

    }
   //метод зміни поста в БД
    public  function ChangePost(Request $request)
    {
        //змінюємо пост за id, який прийшов із запиту
        DB::table('post')->where('id',$request->id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'shortDescription' => $request->shortDescription,
            'category_id' => $request->category_id,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //видаляємо всі зв'язки багато до багатьох, які пов'язані з даним постом
        DB::table('post_tag_map')->where("post_id",$request->id)->delete();
        //проходимось по вибраним тегам
        foreach ($request->tags as $tag_id)
        {
            //додаємо зв'язки багато до багатьох в табличку post_tag_map
            DB::table('post_tag_map')->insert([
                'post_id'=>$request->id,
                'tag_id'=>$tag_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        //редірект на головну сторінку
        return redirect()->route('post.list');
    }
}
