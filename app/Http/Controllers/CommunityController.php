<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Community;

class CommunityController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::all()->where('department', '=' ,Auth::user()->department);
        return view('community.index', compact('communities'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('community.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'matricsno' => 'required|unique:communities',
            'role' => 'required',
            'gender' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'status' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'description' => 'required'

        ]);

        $data = $request->all();

        $path = $request->file('image')->getRealPath();
        $logo = file_get_contents($path);
        $data['image'] = "$logo";
        //$request->file('images')->move('image',$request->name.'_'.$request->name.'.'.'jpg')
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $data['image'] = "$profileImage";
        // }
    
        Community::create($data);
     
        return redirect()->route('community.index')
                        ->with('success','Record created successfully.');
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        return view('community.delete', compact('community'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        return view('community.edit', compact('community'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {   
      $request->validate([
            'name' => 'required',
            'matricsno' => 'required', 
            'role' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();

        if ($image = $request->file('image')) {
            $path = $request->file('image')->getRealPath();
            $logo = file_get_contents($path);
            $data['image'] = "$logo";
        }
        else{
            unset($data['image']);
        }
          
        $community->update($data);

        return redirect()->route('community.index')->with('message',  'Record ' . $community->name . ' information updated successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->back()->with('message', 'Record ' . $community->community . ' was deleted!');
    }

}
