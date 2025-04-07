<?php

namespace App\Http\Middleware;

use App\Enums\DProjectEnum\DProjectState;
use Closure;

class CheckProject
{
    public function handle($request, Closure $next)
    {
        $project = $request->route('project');

        if ($project->process_ended && $project->state == DProjectState::COMPLETED->value) {
            return response()->json(['message' => 'Ce projet est terminé.'], 405);
        }
        if ($project->process_ended) {
            return response()->json(['message' => 'Ce projet est suspendu.'], 405);
        }
        return $next($request);
    }
}
