<?php

namespace App\Http\Controllers;

use App\Events\NotificationSent;
use App\Http\Requests\NotificationRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View
    {
        return view('notifications');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request): JsonResponse
    {
        event(new NotificationSent($request->message, $request->user ?? 'Sistema'));

        return response()->json([
            'status' => 'success',
            'message' => 'Notificación enviada correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
