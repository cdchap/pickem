<?php

namespace App\Http\Middleware;

use App\Models\Invitation;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HasInvitation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->isMethod('get')) {
            if (!$request->has('invitation_token')) {
                return redirect(route('register.request'));
            }

            $invitation_token = $request->get('invitation_token');

            try {
                $invitation = Invitation::where('invitation_token', $invitation_token)->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return redirect(route('register.request'))
                    ->with('error', 'Wrong invitation token! Please check your URL.');
            }

            if (!is_null($invitation->registered_at)) {
                return redirect(route('login'))->with('error', 'The invitation link has already been used.');
            }
        }
        return $next($request);
    }
}
