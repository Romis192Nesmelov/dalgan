<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Setting;
use Illuminate\View\View;

class BaseController extends Controller
{
    use HelperTrait;

    protected array $data = [];
    protected string $activeMainMenu = '';

    public function home(string $slug=null): View
    {
        $this->data['scroll'] = $slug;
        $this->activeMainMenu = 'home';
        $this->data['content'] = Content::select('head','short_text','slug')->get();
        $this->data['settings'] = Setting::where('content_id',null)->first();
        return $this->showView('home');
    }

    public function content(string $slug): View
    {
        $this->data['scroll'] = null;
        $this->activeMainMenu = $slug;
        if (!$this->data['content'] = Content::where('slug',$slug)->select('id','head','long_text')->first()) abort(404);
        $this->data['settings'] = Setting::where('content_id',$this->data['content']->id)->first();
        return $this->showView('content');
    }

    protected function showView($view) :View
    {
        $mainMenu = [['slug' => 'home', 'name' => trans('menu.home'), 'href' => false]];
        $contents = Content::select('slug','head')->get();
        foreach ($contents as $content) {
            $mainMenu[] = ['slug' => $content->slug, 'name' => $content->head, 'href' => true];
        }
        $mainMenu[] = ['slug' => 'contacts', 'name' => trans('menu.contacts'), 'href' => false];

        return view($view, array_merge(
            $this->data,
            [
                'mainMenu' => $mainMenu,
                'contacts' => Contact::all(),
                'metas' => $this->metas,
                'activeMainMenu' => $this->activeMainMenu
            ]
        ));
    }
}
