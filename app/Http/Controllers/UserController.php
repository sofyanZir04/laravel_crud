<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Nette\Utils\FileSystem;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //katjib all data mn Model User
        $users = User::all();
        
        //user kat3ni ism dossie lf view o no9ta hiya slach bach dkhol 
        //compact kat3ni data lghadawaz ll page bach t loop 3liha
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //hna kansyftoh lpage ta3 create lkatkon fiha lform bach idakhal data
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {//dawr ta3o howa ikhazan lik data lisayfti man 'create'
        $request->validate([
            //hna kadir ach lidarori okifach khaso idakhal
            'img' => 'required',
            'name' => 'required',
        ]);
        $user = $request->all();
        if ($request->hasFile('img')) {
            $des ='public/imgs/';//lblasa fin kay stoki
            $file = $request->file('img')->getClientOriginalName();//smiyat original img
            $request->file('img')->storeAs($des,$file);
            $user['img']=$file;


            // $image=$request->file('img')->store('images')
            // other metohd for stock
            // $user['img']=$ImageName;
            // FileSystem <=config
       }

        //hna kaysajal data
        User::create($user);
        //hna kayraj3ak l index
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    //hna bach ijib chi wahd bdabt
    {
        // $item = User::findOrFail($id);
        // return view('user.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    //kat specifie dak libaghi tbadl fih
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User=User::findOrFail($id);//hada howa person
        $request->validate([
            'name' => 'required',
            'img' => 'required',
        ]);
    
        $user = $request->all();//hada howa request bach tkhdam 3la data
        if ($request->hasFile('img')) {
            $des ='public/imgs/';//lblasa fin kay stoki
            $file = $request->file('img');
            $ImageName =$file->getClientOriginalName();//smiyat original img
            $request->file('img')->storeAs($des,$ImageName);
            $user['img']=$ImageName;
       }
        
        
        $User->update($user);//hna bach dir updated
    
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}

// Create  (POST METHOD)
// Show (GET METHOD)
// Update (PUT METHOD)
// Delete (DELETE METHOD)