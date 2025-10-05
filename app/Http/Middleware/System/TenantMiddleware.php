<?php
// app/Http/Middleware/System/TenantMiddleware.php

namespace App\Http\Middleware\System;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Tenant;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $domain = $request->getHost();

         $tenant = Cache::remember("tenant_{$domain}", 60, function() use ($domain) {
            return Tenant::on('system')->where('domain', $domain)->first();
        });


        if (!$tenant) {
            abort(404, 'Tenant not found.');
        }

                DB::purge('system');

         config([
            'database.connections.tenant.database' => $tenant->db_name,
            'database.connections.tenant.username' => $tenant->db_username,
            'database.connections.tenant.password' => $tenant->db_password,
        ]);

        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');

         $request->merge(['tenant' => $tenant]);

         $blogs=Blog::all();
        dd($blogs);

        return $next($request);
    }
}
