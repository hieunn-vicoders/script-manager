<?php 

namespace VCComponent\Laravel\Script\Test\Feature\Api\AdminWithoutMiddlewareConfig;

use Illuminate\Foundation\Testing\RefreshDatabase;
use VCComponent\Laravel\Script\Entities\Script;

class ScriptControllerTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function should_not_config_null_admin_middleware_in_admin_route() {
        $scripts = factory(Script::class, 5)->create();

        $response = $this->call('GET', 'api/admin/scripts/list');

        $response->assertStatus(500);
        $response->assertJson(['message' => 'Admin middleware configuration is required']);
    }

}