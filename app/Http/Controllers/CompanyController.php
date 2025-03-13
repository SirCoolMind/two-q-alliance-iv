<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(\request()->ajax()){
            $data = Company::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name_with_logo', function($row) {
                    $text = '<div class="d-flex align-items-center">';
                    if($row->logo_path) {
                        $text .= '<img src="'.asset('storage/'.$row->logo_path).'" alt="Logo" width="40" height="40" class="rounded-circle me-2">';
                    }
                    $text .= '<span>'.$row->name.'</span></div>';
                    return $text;
                })
                ->addColumn('website_url', function($row) {
                    if($row->website_url)
                     return "<a href='".(strpos($row->website_url, 'http') === 0 ? $row->website_url : 'http://'.$row->website_url)."' target='_blank'>$row->website_url</a>";
                    return '';
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('companies.edit', ['company' => $row->id]).'" class="edit btn btn-success btn-sm">Edit</a>
                        <form action="'.route('companies.destroy', ['company' => $row->id]).'" method="POST" style="display:inline;" 
                            onsubmit="return confirm(\'Are you sure you want to delete this?\');">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['name_with_logo', 'website_url','action'])
                ->make(true);
        }
        return view('companies.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('companies', 'name')],
            'email' => ['nullable', 'email', Rule::unique('companies', 'email')],
            'website_url' => ['nullable', Rule::unique('companies', 'website_url')],
            'logo_upload' => 'nullable|image|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $data = $request->except('logo_upload');

        if ($request->hasFile('logo_upload')) {
            $path = $request->file('logo_upload')->store('logos', 'public');
            $data['logo_path'] = $path; 
        }

        Company::create($data);

        return redirect()->route('companies.index')
        ->with('success','Company created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('companies', 'name')->ignore($id)],
            'email' => ['nullable', 'email', Rule::unique('companies', 'email')->ignore($id)],
            'website_url' => ['nullable', Rule::unique('companies', 'website_url')->ignore($id)],
            'logo_upload' => 'nullable|image|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $data = $request->except('logo_upload');

        $company = Company::findOrFail($id);

        if (!empty($data['logo_path'])) {
            Storage::delete('public/' . $company->logo_path);
            $data['logo_path'] = ''; 
        }
      
        if ($request->hasFile('logo_upload')) {
            $path = $request->file('logo_upload')->store('logos', 'public');
            $data['logo_path'] = $path; 
        }

        $company->update($data);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }

    public function create()
    {
        return view('companies.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('companies.edit', compact('company'));
    }
}
