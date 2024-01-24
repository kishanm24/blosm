<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BearerTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return $this->response(401,['error' => 'token is required'], "unauthorized");
        }

        // You can perform additional validation or checks if needed

        return $next($request);
    }

    protected function response($status = 0, $data = [], $message = "")
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ],$status);
    }
}
