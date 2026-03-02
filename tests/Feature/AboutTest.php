<?php

it('returns the about page text', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
    $response->assertSee('About Page');
});
