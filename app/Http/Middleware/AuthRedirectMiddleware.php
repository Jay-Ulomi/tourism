<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class AuthRedirectMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Get the URL of the current request
            $currentUrl = $request->url();

            // Get the previous URLs from the session
            $previousUrls = Session::get('url.previous', []);

            // Add the current URL to the list of previous URLs
            array_unshift($previousUrls, $currentUrl);

            // Keep only the last two previous URLs
            $previousUrls = array_slice($previousUrls, 0, 2);

            // Store the previous URLs in the session
            Session::put('url.previous', $previousUrls);
        }

        return $next($request);
    }
}
