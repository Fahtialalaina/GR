<?php

namespace App\Http\Controllers;

use App\Candidature;
use App\User;
use Gate;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CandidaturesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    $this->middleware('auth'/*, ['except'=> ['index','show']]*/);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('manage-all-candidature')){
            return redirect(route('home'));
        }
        $candidatures = Candidature::orderBy('created_at', 'desc')->get();
        return view('candidatures.index')->with('candidatures', $candidatures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom' => 'required',
            'Prénoms' => 'required',
            'DateNaissance' => 'required',
            'Adresse' => 'required',
            'cin' => 'required',
            'resumeCV' => 'required',
            'experience' => 'required',
            'lm' => 'required',
        ]);
        $candidature = new Candidature();
        $candidature->nom = $request->input('nom');
        $candidature->Prénoms = $request->input('Prénoms');
        $candidature->DateNaissance = $request->input('DateNaissance');
        $candidature->Adresse = $request->input('Adresse');
        $candidature->cin = $request->input('cin');
        $candidature->resumeCV = $request->input('resumeCV');
        $candidature->experience = $request->input('experience');
        $candidature->lm = $request->input('lm');
        $candidature->user_id = auth()->user()->id;
        $candidature->save();
        
        return redirect('/candidatures')->with('success', 'Candidature envoyé.');
    }

    /**
     * Store a reponse resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeTest(Request $request, $id)
    {
        $this->validate($request,[
            'Réponses' => 'required',
        ]);
        $candidature = Candidature::find($id);
        $candidature->Réponses = $request->input('Réponses');
        $candidature->isTested = true;
        $candidature->isSelectedToTest = false;
        $candidature->save();
    }

    /**
     * Store a reponse resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeQuest(Request $request, $id)
    {
        $this->validate($request,[
            'Questions' => 'required',
        ]);
        $candidature = Candidature::find($id);
        $candidature->Questions = $request->input('Questions');
        $candidature->isTested = false;
        $candidature->isSelectedToTest = true;
        $candidature->save();
    }

    /**
     * Store a reponse resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Nominer(Request $request, $id)
    {
        $candidature = Candidature::find($id);
        $candidature->isNominer = true;
        $candidature->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidature = Candidature::find($id);
        return view('candidatures.show')->with('candidature', $candidature);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidature = Candidature::find($id);
        return view('candidatures.edit')->with('candidature', $candidature);
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
        $candidature = Candidature::find($id);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if($user->hasRole('Admin')){
            if (!$candidature->isTested){
                $this->storeQuest($request, $id);
                return redirect('/candidatures')->with('success', 'Question envoyé.');
            }else{
                $this->Nominer($request, $id);
                return redirect('/candidatures')->with('success', 'Nominé.');
            }
        }else{
            if ($candidature->isSelectedToTest){
                $this->storeTest($request, $id);
                return redirect('/candidatures')->with('success', 'Réponse envoyé.');
            }else{
                $this->update2($request, $id);
                return redirect('/candidatures')->with('success', 'Candidature edité.');
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        $this->validate($request,[
            'nom' => 'required',
            'Prénoms' => 'required',
            'DateNaissance' => 'required',
            'Adresse' => 'required',
            'cin' => 'required',
            'resumeCV' => 'required',
            'experience' => 'required',
            'lm' => 'required',
        ]);
        $candidature = Candidature::find($id);
        $candidature->nom = $request->input('nom');
        $candidature->Prénoms = $request->input('Prénoms');
        $candidature->DateNaissance = $request->input('DateNaissance');
        $candidature->Adresse = $request->input('Adresse');
        $candidature->cin = $request->input('cin');
        $candidature->resumeCV = $request->input('resumeCV');
        $candidature->experience = $request->input('experience');
        $candidature->lm = $request->input('lm');
        $candidature->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidature = Candidature::find($id);
        $candidature->delete();
        return redirect('/candidatures')->with('succes', 'Candidature supprimé.');
    }
}
