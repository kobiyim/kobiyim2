<?php

namespace Kobiyim\Http\Controllers;

use Illuminate\Http\Request;
use Kobiyim\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.activities');
    }

    public function json(Request $request)
    {
        $model = ActivityLog::query();

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d.m.Y H:i');
            })
            ->editColumn('causer_id', function ($model) {
                return $model->getUser->name;
            })
            ->toJson();
    }
}
