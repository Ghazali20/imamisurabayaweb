<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SyncInstagramPosts extends Command
{
    protected $signature = 'instagram:sync';
    protected $description = 'Seeding data postingan kegiatan unggulan IMAMI Surabaya';

    public function handle()
    {
        $this->info('Memperbarui data kegiatan unggulan IMAMI...');

        $posts = [
            [
                'title' => 'Mubes & Musyawarah Besar IMAMI Surabaya 2026',
                'content' => 'Musyawarah Besar Ikatan Mahasiswa Minang Surabaya dalam rangka pemilihan kepengurusan baru.',
                'instagram_post_url' => 'https://www.instagram.com/p/Dd5aOq9ClWf/',
                'thumbnail' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Gathering & Silaturahmi Mahasiswa Minang di Rantau',
                'content' => 'Acara keakraban untuk mempererat tali silaturahmi seluruh mahasiswa asal Sumatera Barat di Surabaya.',
                'instagram_post_url' => 'https://www.instagram.com/p/DdgKWYDRFWz/',
                'thumbnail' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Open Recruitment Pengurus IMAMI Periode 2026/2027',
                'content' => 'Pendaftaran terbuka bagi mahasiswa Minang di Surabaya yang ingin berkontribusi dalam organisasi.',
                'instagram_post_url' => 'https://www.instagram.com/p/DeTWymTxWnn/',
                'thumbnail' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Kajian & Pelestarian Kebudayaan Minangkabau',
                'content' => 'Diskusi interaktif seputar adat dan seni budaya Minangkabau bersama senior dan alumni.',
                'instagram_post_url' => 'https://www.instagram.com/p/Db_EGxmmX2T/',
                'thumbnail' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Aksi Sosial & Bakti Masyarakat IMAMI Peduli',
                'content' => 'Kegiatan pengabdian masyarakat dan penyaluran bantuan sosial di area Surabaya dan sekitarnya.',
                'instagram_post_url' => 'https://www.instagram.com/p/DdEn_OCmdk5/',
                'thumbnail' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=800&auto=format&fit=crop',
            ],
        ];

        foreach ($posts as $index => $p) {
            Post::updateOrCreate(
                ['instagram_post_url' => $p['instagram_post_url']],
                [
                    'title' => $p['title'],
                    'slug' => Str::slug($p['title']),
                    'content' => $p['content'],
                    'thumbnail' => $p['thumbnail'],
                    'created_at' => now()->subDays($index),
                ]
            );
        }

        $this->info('Data kegiatan unggulan berhasil diperbarui!');
        return Command::SUCCESS;
    }
}