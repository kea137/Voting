<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null, $filter = null)
    {
        return Inertia::render('Ideas', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'ideas'=>Idea::withCount('vote')->when($category != null, function($query) use($category, $filter){
                if($filter == '0'){
                    return $query->where('category_id', $category)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '2'){
                    return $query->where('category_id', $category)->where('user_id', auth()->check() ? auth()->user()->id : '0')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '1'){
                    return $query->where('category_id', ($category == '0') ? ['1','2','3','4'] : $category)->orderByDesc('vote_count')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                }
            })->when(($category == null) && ($filter == null), function($query){
                return $query->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
            })->load('user', 'category', 'status', 'vote'),
            'considering'=>Idea::where('status_id', 4)->get()->count(),
            'all'=>Idea::where('status_id', 5)->get()->count(),
            'inprogress'=>Idea::where('status_id', 2)->get()->count(),
            'implemented'=>Idea::where('status_id', 3)->get()->count(),
            'selected_category'=>(($category == null) ? '0' : $category),
            'selected_filter'=>(($filter == null) ? '0' : $filter),
            'closed'=>Idea::where('status_id', 1)->get()->count(),
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_considering($category = null, $filter = null)
    {
        if(auth()->check()){
            $voted_idea = Vote::where('user_id', auth()->user()->id)->get('idea_id')->toArray();
            $votes = Vote::where('user_id', auth()->user()->id)->get('idea_id')->count();
            $voted = array();
            for($i = 0; $i < $votes; $i++){
                array_push($voted, strval($voted_idea[$i]['idea_id']));
            }
        }

        $nul = array('idea_id' => 0);
        return Inertia::render('Ideas', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'considering'=>Idea::where('status_id', 4)->get()->count(),
            'all'=>Idea::where('status_id', 5)->get()->count(),
            'inprogress'=>Idea::where('status_id', 2)->get()->count(),
            'implemented'=>Idea::where('status_id', 3)->get()->count(),
            'selected_category'=>(($category == null) ? '0' : $category),
            'selected_filter'=>(($filter == null) ? '0' : $filter),
            'closed'=>Idea::where('status_id', 1)->get()->count(),
            'ideas'=>Idea::withCount('vote')->when($category != null, function($query) use($category, $filter){
                if($filter == '0'){
                    return $query->where('category_id', $category)->where('status_id', 4)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '2'){
                    return $query->where('category_id', $category)->where('status_id', 4)->where('user_id', auth()->check() ? auth()->user()->id : '0')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '1'){
                    return $query->where('category_id', ($category == '0') ? ['1','2','3','4'] : $category)->where('status_id', 4)->orderByDesc('vote_count')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                }
            })->when(($category == null) && ($filter == null), function($query){
                return $query->where('status_id', 4)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
            })->load('user', 'category', 'status', 'vote'),
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_inprogress($category = null, $filter = null)
    {
        $nul = array('idea_id' => 0);
        return Inertia::render('Ideas', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'considering'=>Idea::where('status_id', 4)->get()->count(),
            'all'=>Idea::where('status_id', 5)->get()->count(),
            'inprogress'=>Idea::where('status_id', 2)->get()->count(),
            'implemented'=>Idea::where('status_id', 3)->get()->count(),
            'closed'=>Idea::where('status_id', 1)->get()->count(),
            'selected_category'=>(($category == null) ? '0' : $category),
            'selected_filter'=>(($filter == null) ? '0' : $filter),
            'ideas'=>Idea::withCount('vote')->when($category != null, function($query) use($category, $filter){
                if($filter == '0'){
                    return $query->where('category_id', $category)->where('status_id', 2)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '2'){
                    return $query->where('category_id', $category)->where('status_id', 2)->where('user_id', auth()->check() ? auth()->user()->id : '0')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '1'){
                    return $query->where('category_id', ($category == '0') ? ['1','2','3','4'] : $category)->where('status_id', 2)->orderByDesc('vote_count')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                }
            })->when(($category == null) && ($filter == null), function($query){
                return $query->where('status_id', 2)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
            })->load('user', 'category', 'status', 'vote'),
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_implemented($category = null, $filter = null)
    {
        $nul = array('idea_id' => 0);
        return Inertia::render('Ideas', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'considering'=>Idea::where('status_id', 4)->get()->count(),
            'all'=>Idea::where('status_id', 5)->get()->count(),
            'inprogress'=>Idea::where('status_id', 2)->get()->count(),
            'implemented'=>Idea::where('status_id', 3)->get()->count(),
            'closed'=>Idea::where('status_id', 1)->get()->count(),
            'selected_category'=>(($category == null) ? '0' : $category),
            'selected_filter'=>(($filter == null) ? '0' : $filter),
            'ideas'=>Idea::withCount('vote')->when($category != null, function($query) use($category, $filter){
                if($filter == '0'){
                    return $query->where('category_id', $category)->where('status_id', 3)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '2'){
                    return $query->where('category_id', $category)->where('status_id', 3)->where('user_id', auth()->check() ? auth()->user()->id : '0')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '1'){
                    return $query->where('category_id', ($category == '0') ? ['1','2','3','4'] : $category)->where('status_id', 3)->orderByDesc('vote_count')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                }
            })->when(($category == null) && ($filter == null), function($query){
                return $query->where('status_id', 3)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
            })->load('user', 'category', 'status', 'vote'),
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_closed($category = null, $filter = null)
    {
        $nul = array('idea_id' => 0);
        return Inertia::render('Ideas', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'considering'=>Idea::where('status_id', 4)->get()->count(),
            'all'=>Idea::where('status_id', 5)->get()->count(),
            'selected_category'=>(($category == null) ? '0' : $category),
            'selected_filter'=>(($filter == null) ? '0' : $filter),
            'inprogress'=>Idea::where('status_id', 2)->get()->count(),
            'implemented'=>Idea::where('status_id', 3)->get()->count(),
            'selected_category'=>'0',
            'closed'=>Idea::where('status_id', 1)->get()->count(),
            'ideas'=>Idea::withCount('vote')->when($category != null, function($query) use($category, $filter){
                if($filter == '0'){
                    return $query->where('category_id', $category)->where('status_id', 1)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '2'){
                    return $query->where('category_id', $category)->where('status_id', 1)->where('user_id', auth()->check() ? auth()->user()->id : '0')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                } else if($filter == '1'){
                    return $query->where('category_id', ($category == '0') ? ['1','2','3','4'] : $category)->where('status_id', 1)->orderByDesc('vote_count')->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
                }
            })->when(($category == null) && ($filter == null), function($query){
                return $query->where('status_id', 1)->addSelect(['userVoted'=>Vote::select('id')->where('user_id', auth()->check() ? auth()->user()->id : 0)->whereColumn('idea_id', 'ideas.id')])->get();
            })->load('user', 'category', 'status', 'vote'),
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|String|min:4',
            'category'=>'required|integer',
            'description'=>'required|String|min:4'
        ]);

        if(auth()->check()){
            Idea::create([
                'user_id'=>auth()->user()->id,
                'status_id'=>5,
                'title'=>$validated['title'],
                'category_id'=>$validated['category'],
                'description'=>$validated['description'],
            ]);

            session()->flash('message','The Idea was Created');

            return redirect()->to('ideas');
        }   else{
            return abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Idea $idea)
    {
        if(auth()->check()){
            if(Vote::where('user_id', auth()->user()->id)->where('idea_id', $idea->id)->exists()){
                Vote::where('user_id', auth()->user()->id)->where('idea_id', $idea->id)->delete();
                return redirect()->back();
            } else{
                Vote::create([
                    'user_id'=>auth()->user()->id,
                    'idea_id'=>$idea->id
                ]);
                return redirect()->back();
            }
        }

        return redirect()->to(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        return Inertia::render('Show', [
            'idea' => $idea->load('user', 'category', 'status', 'vote'),
            'categories' => Category::all(),
            'all'=>Idea::where('status_id', 5)->get()->count(),
            'considering'=>Idea::where('status_id', 4)->get()->count(),
            'inprogress'=>Idea::where('status_id', 2)->get()->count(),
            'implemented'=>Idea::where('status_id', 3)->get()->count(),
            'closed'=>Idea::where('status_id', 1)->get()->count(),
            'voted' => $idea->voted(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function index_ideas()
    {
        return Inertia::render('Show', [
            'idea' => Idea::paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->check()){
            $validated = $request->validate([
                'status_radio'=>'required|integer',
                'idea_id'=>'required|integer'
            ]);

            Idea::where('id', $validated['idea_id'])->update([
                'status_id'=>$validated['status_radio']
            ]);

            return redirect()->back();
        } else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
