<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Content;
use Illuminate\View\View;

class BaseController extends Controller
{
    use HelperTrait;

    protected array $data = [];
    protected string $activeMainMenu = '';

    public function home(string $slug=null): View
    {
        $this->activeMainMenu = 'home';
        $this->data['scroll'] = $slug;
        $this->data['content'] = Content::with('settings')->find(1);
        return $this->showView('home');
    }

    public function content(string $slug): View
    {
        $this->activeMainMenu = $slug;
        if (!$this->data['content'] = Content::where('slug',$slug)->with('settings')->select('id','head','text')->first()) abort(404);
        return $this->showView('content');
    }

    protected function showView($view) :View
    {
        $contents = Content::select('slug','head')->get();
        foreach ($contents as $k => $content) {
            if ($k) $mainMenu[] = ['name' => $content->head, 'route' => $content->slug, 'scroll' => false];
        }
        $mainMenu[] = ['name' => trans('menu.contacts'), 'route' => 'contacts', 'scroll' => true];

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
