<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyMobileRequest
{
    public function handle(Request $request, Closure $next): Response
    {
        $userAgent = strtolower($request->userAgent());

        // Reject empty or suspicious user-agents
        if (
            !$userAgent ||
            // str_contains($userAgent, 'postman') ||
            str_contains($userAgent, 'insomnia') ||
            str_contains($userAgent, 'mozilla') ||
            str_contains($userAgent, 'chrome') ||
            str_contains($userAgent, 'safari') ||
            str_contains($userAgent, 'edge')
        ) {
            abort(403);
        }

        // Allow only known mobile UA keywords
        $allowedAgents = ['okhttp', 'android', 'postman','cfnetwork', 'iphone', 'ios', 'flutter', 'reactnative', 'mobile'];

        $isMobile = false;
        foreach ($allowedAgents as $keyword) {
            if (str_contains($userAgent, $keyword)) {
                $isMobile = true;
                break;
            }
        }

        if (!$isMobile) {
            abort(403);
        }

        return $next($request);
    }
}
