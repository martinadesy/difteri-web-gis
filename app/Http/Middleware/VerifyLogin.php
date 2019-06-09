<?php
/**
 * Created by PhpStorm.
 * User: mfarid
 * Date: 06/04/18
 * Time: 21.39
 */
namespace App\Http\Middleware;
class VerifyLogin
{
    public function handle(\Illuminate\Http\Request $request, \Closure $next)
    {
        if (empty(session('activeUser'))) {
            return redirect('/login');
        } else {
            return $next($request);
        }
    }
}