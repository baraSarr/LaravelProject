<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Epreuve;
use App\Models\Correction;
use App\Providers\RouteServiceProvider;
use App\Mail\Newsletter;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view("users.index",[
            "users"=>$users
        ]);
    }

    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view("users.show",[
            "user"=>$user,
        ]);
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->profil = "utilisateur";
        $user->password = Hash::make($request->password);
        $user->esmt = $request->esmt;
        $user->newsletter = $request->newsletter;
        if($user->newsletter != null){
            Mail::to($user->email)->send(new Newsletter());
        }
        $user->save();
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->profil = "administrateur";
        $user->password = Hash::make($request->password);
        $user->esmt = $request->esmt;
        $user->newsletter = $request->newsletter;
        $user->save();
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('users.edit',[
            "user"=>$user,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($id);
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->esmt = $request->esmt;
        $user->newsletter = $request->newsletter;
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function dashboard($id)
    {
        $user = User::findOrFail($id);
        $users = User::paginate(15);
        $epreuves = $user->epreuves;
        $corrections = $user->corrections;
        return view("dashboard_user",[
            "user"=>$user,
            "users"=>$users,
            "epreuves"=>$epreuves,
            "corrections"=>$corrections
        ]);
    }

    public function newsletter(Request $request)
    {
        $email = $request->email;
        Mail::to($email)->send(new Newsletter());

        return redirect()->back();
    }
}
