<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visitor = new Visitor();
        $visitor->ip_address = $request->ip();
        $visitor->user_agent = $request->userAgent();
        $visitor->visited_at = now();
        $visitor->save();

        return $next($request);
    }
}
