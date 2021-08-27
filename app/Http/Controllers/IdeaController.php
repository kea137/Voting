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
    public function index()
    {
        $nul = array('idea_id' => 0);
        return Inertia::render('Ideas', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'ideas'=>Idea::all()->load('user', 'category', 'status', 'vote')->sortBy([['id', 'desc']]),
            'voted'=>auth()->check() ? (json_encode(array_values(Vote::where('user_id', auth()->user()->id)->get('idea_id')->toArray()))) : json_encode($nul),
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
            'voted' => $idea->votedByUser(),
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
    public function update(Request $request, Idea $idea)
    {
        //
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
