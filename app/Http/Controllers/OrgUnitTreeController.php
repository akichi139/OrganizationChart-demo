<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationUnit;

class OrgUnitTreeController extends Controller
{
    public function showTreeView()
    {
        $orgUnits = OrganizationUnit::all();
        $treeView = $this->buildTree($orgUnits);
        $orgUnit = OrganizationUnit::root()->first();
        
        return view('orgUnits.treeview', compact('treeView','orgUnit'));
    }

    private function buildTree($orgUnits, $parentId = null)
    {
        $tree = [];

        foreach ($orgUnits as $orgUnit) {
            if ($orgUnit->parent_id === $parentId) {
                $orgUnit->children = $this->buildTree($orgUnits, $orgUnit->id);
                $tree[] = $orgUnit;
            }
        }

        return collect($tree);
    }
}
