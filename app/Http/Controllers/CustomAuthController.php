<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Psy\debug;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('auth.create', ['villes' => $villes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'adresse' => 'required',
            'phone' => 'required',
            'date_de_naissance' => 'required|date',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $etudiant = Etudiant::create([
            'nom' => $request->name,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        // exit;
        $user->etudiant()->save($etudiant);
        // echo ($user);
        // echo ($etudiant);
        // exit;
        return redirect(route('login'))->withSuccess('User enregistré');
    }

    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }



    /*     $request->validate([
        'name' => 'required',
        'email'=> 'required|email|unique:users',
        'password' => 'required|min:6|max:20'
    ]);
    
    $user = new User;
    $user->fill($request->all());
    $user->password = Hash::make($request->password);
    $user->save();
     return redirect(route('login'))->withSuccess('User enregistré');

} */

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::validate($credentials)) :
            return redirect(route('login'))
                ->withErrors(trans('auth.failed'))
                ->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard')->withSuccess('Signed in');
    }

    public function dashboard()
    {


        if (Auth::check()) {
            $name = Auth::user()->name;
            return view('dashboard', ['name' => $name]);
        }
        return redirect(route('login'))->withErrors('Vous n\'êtes pas autorisé à accéder');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
