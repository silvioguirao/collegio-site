<?php

it('stores a valid contact message and returns success', function () {
    // Arrange
    $payload = [
        'name' => 'Teste Usuário',
        'email' => 'teste@example.com',
        'phone' => '11999990000',
        'subject' => 'Dúvida sobre matrícula',
        'message' => 'Quero informações sobre matrículas.',
        'hp' => '' // honeypot must be empty
    ];

    // Act
    $response = $this->post(route('contact.store'), $payload);

    // Assert
    $response->assertRedirect(route('contact.show'));
    $response->assertSessionHas('status');
    $this->assertDatabaseHas('contact_messages', [
        'email' => 'teste@example.com',
        'subject' => 'Dúvida sobre matrícula',
    ]);
});

it('rejects invalid contact submission and shows validation errors', function () {
    $response = $this->post(route('contact.store'), ['hp' => '']);
    $response->assertSessionHasErrors(['name','email','subject','message']);
});
