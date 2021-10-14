<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Option;
use App\Models\Quiz\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //->orderBy('answers')
        //->leftJoin('answers', 'answers.question_id', '=', 'questions.id')
        //->orderBy('answers.created_at')
        //->select('questions.*, answers.question_id')

        // $questions = Question::with(['options' => function($query) {
        //     $query->select('id','text');
        // }])
                    //->with('answers')
                    // ->get();
                    //->sortByDesc('answers.created_at');


        $questionsList = Question::with([
            'options' => function($q){
                $q->get(['text']);
            } ,
            'answers' => function($q){
                $q->where('user_id', Auth::user()->id);
            }
            ])
        //->orderBy()
        ->get();

        $questions = [];

        foreach($questionsList as $question){

            $opts = [];

            if($question->options()->count() > 0)
            {
                foreach($question->options()->get() as $opt)
                {
                    $opts[] = [ "id" => $opt->id, "text" => $opt->text ];
                }
            }

            $questions[] = [
                "id" => $question->id,
                "question" => $question->question,
                "options" => $opts,
                "answered" => $question->answers()->get()->count() > 0 || false
            ];

        }















        //dd($questions, $questions[0]->getAttributes(), $questions[0]->options()->first()->getAttributes());

        return Inertia::render('Quiz/Index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $option = Option::find($request->answer);

        $user = Auth::user()->id;

        Answer::create([
            'question_id' => $request->question,
            'user_id' => $user,
            'option_id' => !empty($option) ? $option->id : null,
            'is_correct' =>  !empty($option) ? $option->is_correct : false,
            'description' => !empty($request->log ) ? $request->log  : null
        ]);

        return back()->with("message",  "Salvo com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete(Request $request)
    {
        //dump($request);

        Answer::truncate();

        return back()->with("message",  "Respostas deletadas com sucesso!");
    }
}
