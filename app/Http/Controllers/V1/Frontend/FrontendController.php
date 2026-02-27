<?php

namespace App\Http\Controllers\V1\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Resources\TenantResource;
use App\Models\Tenant;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function storeTenant(StoreTenantRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $baseSlug = Str::slug($validated['slug'] ?? $validated['name']);
        $validated['slug'] = $this->resolveTenantSlug($baseSlug !== '' ? $baseSlug : 'tenant');

        $tenant = Tenant::create($validated)->load('owner');

        return (new TenantResource($tenant))
            ->additional(['message' => 'Tenant created successfully.'])
            ->response()
            ->setStatusCode(201);
    }

    private function resolveTenantSlug(string $baseSlug): string
    {
        $slug = $baseSlug;
        $counter = 1;

        while (Tenant::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
