<?php

namespace App\Http\Controllers;

use App\Models\OrganizationUnit;
use App\Http\Requests\StoreOrganizationUnitRequest;
use App\Http\Requests\UpdateOrganizationUnitRequest;
use Illuminate\Http\Request;

class OrganizationUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationUnitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationUnit $organizationChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganizationUnit $organizationChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationUnitRequest $request, OrganizationUnit $organizationChart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationUnit $organizationChart)
    {
        $organizationChart->delete();

        return redirect()->route('unit.liveshow');
    }
    
    /**
     * Add children to the specified resource.
     */
    public function addChildren(OrganizationUnit $orgUnit)
    {
        $parentUnit = $orgUnit;

        return view('organization-units.add-children', compact('parentUnit'));
    }

    public function addChildrenOrganizaion(Request $request){
        $organization = new OrganizationUnit;
        $organization->name = $request->name;
        $organization->short_name = $request->short_name;
        $organization->is_company = 0;
        $organization->parent_id = $request->parent_id;
        $organization->save();

        return view('');
    }
}
