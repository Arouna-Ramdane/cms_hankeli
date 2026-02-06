<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Personne;
use App\Models\Client;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view-user', only: ['index', 'show']),
            new Middleware('permission:add-user', only: ['create', 'store']),
            new Middleware('permission:edit-user', only: ['edit', 'update']),
            new Middleware('permission:delete-user', only: ['destroy']),
        ];
    }

    public function index()
    {
        $all=DB::table('personnes')->join('users', 'personnes.personne_id', 'users.personne_id')->select('personnes.*','users.*')->get();
        return view('users.index',[
            'users' => $all,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation pour la table personnes
$validatedData = $request->validate([
    'first_name' => 'required|max:255',
    'name'       => 'required|max:255',
    'contact'    => 'required|unique:personnes,contact',
    'adresse'    => 'nullable|max:255',
    
    'email'    => 'nullable|email|unique:users,email',
    'username'    => 'required|unique:users,username',
    'password' => 'required|min:4',
    'profile'  => 'nullable|image|max:2048',
], [
    'first_name.required' => 'Le nom est obligatoire.',
    'name.required'       => 'Le prenom est obligatoire.',
    'contact.required'    => 'Veuillez entrer un contact.',
    'username.required'    => "Veuillez entrer un nom d'utilisateur.",
    
    'contact.unique'      => 'Un employé a déjà un contact identique dans le système.',
    'username.unique'      => "Un employé a déjà un nom d'utilisateur identique dans le système.",

    'email.email'    => 'Veuillez saisir un email valide.',
    'email.unique'   => 'Un employé a déjà un email identique dans le système.',
    'password.required' => 'Le mot de passe est obligatoire.',
    'password.min'      => 'Le mot de passe doit contenir au moins 4 caractères.',
    'profile.image'     => 'Le fichier doit être une image.',
    'profile.max'       => 'L’image ne doit pas dépasser 2 Mo.',
]);


$validat_data_personne = collect($validatedData)->only(['first_name','name','contact','adresse'])->toArray();
$validat_data_user     = collect($validatedData)->only(['email', 'username', 'password','profile'])->toArray();

//dd($validat_data_personne, $validat_data_user );


    DB::transaction(function () use ($request, $validat_data_personne, $validat_data_user) {

        if ($request->file('profile')) {
            $name = trim(strtolower($validat_data_personne['first_name'] . $validat_data_personne['name']));
            $name = str_replace(' ', '', $name);

            $img = $request->file('profile');
            $extension = $img->getClientOriginalExtension();
            $file_name = $name . '.' . $extension;
            $path = $img->storeAs('imagePersonne', $file_name, 'public');

            $validat_data_user['profile'] = $path;

            $personne = Personne::create($validat_data_personne);

            $user = User::create([
            'username' => $validat_data_user['username'],
            'email' => $validat_data_user['email'],
            'password' => Hash::make($validat_data_user['password']),
            'personne_id' => $personne->personne_id,
            'profile' => $validat_data_user['profile'],
        ]);

        $user->assignRole('user');

        }else {
                $personne = Personne::create($validat_data_personne);

            if ($validat_data_user['email']) {

            $user = User::create([
                'email' => $validat_data_user['email'],
                'username' => $validat_data_user['username'],
                'password' => Hash::make($validat_data_user['password']),
                'personne_id' => $personne->personne_id,
            ]);
        } else {
                $user = User::create([
                'username' => $validat_data_user['username'],
                'password' => Hash::make($validat_data_user['password']),
                'personne_id' => $personne->personne_id,
            ]);
            }

            $user->assignRole('user');

            Client::create([
            'personne_id' => $personne->personne_id,
        ]);
        }

    });

    return redirect()->route('users.index');
}



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $image_personnes = User::where('user_id', $user->user_id)->first();
        return view('users.show',[
            'personne' => $image_personnes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $all=DB::table('personnes')->join('users', 'personnes.personne_id', 'users.personne_id')->select('personnes.*','users.*')->where('users.user_id',$user->user_id)->first();
        return view('users.edit',[

            'personne' => $all,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, User $user)
{
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|max:255',
        'name'       => 'required|max:255',
        'contact'    => 'required|unique:personnes,contact,'. $user->personne_id . ',personne_id',
        'adresse'    => 'nullable|max:255',
        
        'email'    => 'nullable|email|unique:users,email,'. $user->user_id . ',user_id',
        'username'    => 'required|unique:users,username,'. $user->user_id . ',user_id',
        'password' => 'nullable|min:4',
        'profile'  => 'nullable|image|max:2048',
    ], [
        'first_name.required' => 'Le nom est obligatoire.',
        'name.required'       => 'Le prenom est obligatoire.',
        'contact.required'    => 'Veuillez entrer un contact.',
        'username.required'    => "Veuillez entrer un nom d'utilisateur.",
        
        'contact.unique'      => 'Un employé a déjà un contact identique dans le système.',
        'username.unique'      => "Un employé a déjà un nom d'utilisateur identique dans le système.",

        'email.email'    => 'Veuillez saisir un email valide.',
        'email.unique'   => 'Un employé a déjà un email identique dans le système.',
        
        'password.min'      => 'Le mot de passe doit contenir au moins 4 caractères.',
        'profile.image'     => 'Le fichier doit être une image.',
        'profile.max'       => 'L’image ne doit pas dépasser 2 Mo.',
    ]);

    $validator->validate();

    $validat_data_personne = collect($validator->validated())->only(['first_name','name','contact','adresse'])->toArray();
    $validat_data_user     = collect($validator->validated())->only(['email','password','username','profile'])->toArray();




    $name = trim(strtolower(str_replace(" ", "", $validat_data_personne['first_name'] . $validat_data_personne['name'])));

    $data_personne = [
        'first_name' => $validat_data_personne['first_name'],
        'name' => $validat_data_personne['name'],
        'contact' => $validat_data_personne['contact'],
        'adresse' => $validat_data_personne['adresse'],
    ];

    if ($request->hasFile('profile')) {
        $img = $request->file('profile');
        $extension = $img->getClientOriginalExtension();
        $file_name = $name . '.' . $extension;
        $path = $img->storeAs('imagePersonne', $file_name, 'public');
        $validat_data_user['profile'] = $path;


        if ($validat_data_user['email']) {
                $data_user = [
                'email' => $validat_data_user['email'],
                'username' => $validat_data_user['username'],
                'profile' => $validat_data_user['profile'],
            ];
        } else {
            $data_user = [
                
                'username' => $validat_data_user['username'],
                'profile' => $validat_data_user['profile'],
            ];
        } 

    } else {
        if ($validat_data_user['email']) {
                $data_user = [
                'email' => $validat_data_user['email'],
                'username' => $validat_data_user['username'],
                
            ];
        } else {
            $data_user = [
                'username' => $validat_data_user['username'],
            ];
        }
    }
    $user->personne->update($data_personne);

    if (!empty($validat_data_user['password'])) {
        $data_user['password'] = Hash::make($validat_data_user['password']);
    }

    $user->update($data_user);

    return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $delete_personnes =DB::table('personnes')->where('personne_id', $user->personne_id);
        $delete_personnes->delete();
        $user->delete();
        return redirect()->route('users.index');
    }

    public function userImage(User $user)
    {
        //
    }
}
