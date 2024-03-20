<?php

it('should get a list of books', function () {
    $book = \App\Models\Book::factory()->create();
    $response = $this->get('/api/books');
    $response->assertStatus(200)
        ->assertJson([
            'data' => [
                [
                    'id' => $book->id,
                    'name' => $book->name,
                    'author' => $book->author,
                    'description' => $book->description
                ]
            ]

        ]);
});

it('should get a book', function (){
    $book = \App\Models\Book::factory()->create();
    $response = $this->get('/api/books/'.$book->id);
    $response->assertStatus(200)
        ->assertJson([
            'data' => [
                'id' => $book->id,
                'name' => $book->name,
                'author' => $book->author,
                'description' => $book->description

            ]
        ]);
});

it('should create a book', function (){
   $data = \App\Models\Book::factory()->raw();
   $this->postJson("/api/books", $data)
       ->assertStatus(201);
   $this->assertDatabaseCount('books', 1);
   $this->assertDatabaseHas('books', $data);
});

it('should update a book', function (){
    //create a book
    $book = \App\Models\Book::factory()->create();

    //create update data
    $data = \App\Models\Book::factory()->raw();

    $this->putJson("/api/books/".$book->id, $data);

    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'name' => $data['name'],
        'author' => $data['author'],
        'description' => $data['description']
    ]);

});

it('should delete a book', function (){
    //create a book
    $book = \App\Models\Book::factory()->create();

    $this->deleteJson("/api/books/".$book->id)
        ->assertStatus(200);
    $this->assertDatabaseCount('books', 0);


});



