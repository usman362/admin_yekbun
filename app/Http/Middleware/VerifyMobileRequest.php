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
            str_contains($userAgent, 'postman') ||
            str_contains($userAgent, 'insomnia') ||
            str_contains($userAgent, 'mozilla') ||
            str_contains($userAgent, 'chrome') ||
            str_contains($userAgent, 'safari') ||
            str_contains($userAgent, 'edge')
        ) {
            return ResponseHelper::sendResponse([], 'Access allowed only from mobile apps.', false, 403);
        }

        // Allow only known mobile UA keywords
        $allowedAgents = ['okhttp', 'android', 'cfnetwork', 'iphone', 'ios', 'flutter', 'reactnative', 'mobile'];

        $isMobile = false;
        foreach ($allowedAgents as $keyword) {
            if (str_contains($userAgent, $keyword)) {
                $isMobile = true;
                break;
            }
        }

        if (!$isMobile) {
            return ResponseHelper::sendResponse([], 'Mobile access only', false, 403);
        }

        return $next($request);
    }
}
