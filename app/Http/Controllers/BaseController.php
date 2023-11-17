<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Slide;
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
        $this->data['content'] = Content::where('href',0)->select('head','short_text','slug')->get();
        return $this->showView('home');
    }

    public function content(string $slug): View
    {
        dd($slug);
//        $this->activeMainMenu = 'structure';
//        return $this->showView('home');
    }

    protected function showView($view) :View
    {
        $mainMenu = [['slug' => 'home', 'name' => trans('menu.home'), 'href' => false]];
        $contents = Content::select('slug','head','href')->get();
        foreach ($contents as $content) {
            $mainMenu[] = ['slug' => $content->slug, 'name' => $content->head, 'href' => $content->href];
        }
        $mainMenu[] = ['slug' => 'contacts', 'name' => trans('menu.contacts'), 'href' => false];

        return view($view, array_merge(
            $this->data,
            [
                'slider' => Slide::all(),
                'mainMenu' => $mainMenu,
                'contacts' => Contact::all(),
                'metas' => $this->metas,
                'settings' => Setting::first(),
                'activeMainMenu' => $this->activeMainMenu
            ]
        ));
    }
}
