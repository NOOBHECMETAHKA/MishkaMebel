<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainRoutesCheckTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_the_application_returns_a_form_authorization(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    public function test_the_application_returns_a_form_register(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    public function test_the_application_returns_a_fail_access_to_admin_chart_redirect_code(): void
    {
        $response = $this->get('/admin/panel/charts');
        $response->assertStatus(302);
    }
    public function test_the_application_returns_a_fail_access_to_content_manager_redirect_code(): void
    {
        $response = $this->get('/admin/bed');
        $response->assertStatus(302);
    }
}
