<?php

it('returns 200 on home page', function () {
    $this->get('/')->assertStatus(200);
});
