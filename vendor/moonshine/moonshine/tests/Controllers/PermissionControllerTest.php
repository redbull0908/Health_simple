<?php

declare(strict_types=1);

namespace MoonShine\Tests\Controllers;

use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Tests\TestCase;

final class PermissionControllerTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function it_success_saved(): void
    {
        $this->authorized()
            ->post(
                $this->testResource()->route('permissions', $this->adminUser()->getKey()),
                [
                    'permissions' => [
                        MoonShineUserResource::class => [
                            'viewAny' => 1,
                        ],
                    ],
                ]
            )
            ->assertRedirect();

        $permissions = $this->adminUser()->moonshineUserPermission()->first();

        $this->assertTrue(
            (
                $permissions
                && $permissions->permissions->has(MoonShineUserResource::class)
                && isset($permissions->permissions[MoonShineUserResource::class]['viewAny'])
            )
        );
    }
}
