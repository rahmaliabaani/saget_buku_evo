<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Rahmalia Nuursyabaani',
            'username' => 'rahmalia',
            'email' => '203040084@mail.unpas.ac.id',
            'password' => bcrypt('12345'),
            'gambar' => 'rahma.png'
        ]);

        User::create([
            'name' => 'Surya Putra Pratama',
            'username' => 'surya',
            'email' => '203040065@mail.unpas.ac.id',
            'password' => bcrypt('1234567890'),
            'gambar' => 'surya.png'
        ]);

        User::create([
            'name' => 'Farhan Alfauzi',
            'username' => 'farhan',
            'email' => '203040085@mail.unpas.ac.id',
            'password' => bcrypt('123451234567890'),
            'gambar' => 'farhan.jpg'
        ]);

        User::create([
            'name' => 'Hamzah Hadi Permana',
            'username' => 'hamzah',
            'email' => '203040087@mail.unpas.ac.id',
            'password' => bcrypt('1234567890'),
            'gambar' => 'hamzah.png'
        ]);

        Kategori::create([
            'nama' => 'Novel',
            'slug' => 'novel'
        ]);

        Kategori::create([
            'nama' => 'Cerita Pendek',
            'slug' => 'cerita-pendek'
        ]);

        Kategori::create([
            'nama' => 'Tutorial',
            'slug' => 'tutorial'
        ]);

        Buku::factory(10)->create();

        // Buku::create([
        //     'judul' => 'Koala Kumal',
        //     'slug' => 'koala-kumal',
        //     'kutipan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ut eaque odit mollitia iusto quasi, commodi repudiandae, unde ratione velit odio nam corporis laborum et.',
        //     'isi' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ut eaque odit mollitia iusto quasi, commodi repudiandae, unde ratione velit odio nam corporis laborum et. Fugit, ea. Odio facere architecto, tempora, fugiat explicabo libero in praesentium perferendis laudantium consectetur dolorum mollitia labore a aliquam error commodi culpa quod cum ipsum fugit aspernatur ut.</p><p>Vero blanditiis iure natus quibusdam enim cupiditate omnis temporibus qui doloremque dolore rerum similique accusantium ipsa quidem molestias, repellat exercitationem ad. Expedita consequuntur enim accusamus libero eaque, facilis maxime neque aliquam. Consequatur aspernatur, error illum assumenda voluptates culpa nostrum autem magnam perspiciatis quas porro enim cupiditate dignissimos.</p>',
        //     'kategori_id' => 1,
        //     'user_id' => 1
        // ]);

        // Buku::create([
        //     'judul' => 'Bumi Manusia',
        //     'slug' => 'bumi-manusia',
        //     'kutipan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ut eaque odit mollitia iusto quasi, commodi repudiandae, unde ratione velit odio nam corporis laborum et.',
        //     'isi' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ut eaque odit mollitia iusto quasi, commodi repudiandae, unde ratione velit odio nam corporis laborum et. Fugit, ea. Odio facere architecto, tempora, fugiat explicabo libero in praesentium perferendis laudantium consectetur dolorum mollitia labore a aliquam error commodi culpa quod cum ipsum fugit aspernatur ut.</p><p>Vero blanditiis iure natus quibusdam enim cupiditate omnis temporibus qui doloremque dolore rerum similique accusantium ipsa quidem molestias, repellat exercitationem ad. Expedita consequuntur enim accusamus libero eaque, facilis maxime neque aliquam. Consequatur aspernatur, error illum assumenda voluptates culpa nostrum autem magnam perspiciatis quas porro enim cupiditate dignissimos.</p>',
        //     'kategori_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}
