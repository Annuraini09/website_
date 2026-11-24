<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicInfoTest extends TestCase
{
    use RefreshDatabase;

    public function test_information_page_displays_members_by_generation_and_activities(): void
    {
        Activity::create([
            'judul' => 'Perayaan Deutsch Club',
            'deskripsi' => 'Belajar bahasa dan budaya Jerman bersama.',
            'date' => '2026-11-20',
        ]);
        Member::create([
            'name' => 'Anindya',
            'jabatan' => 'Ketua',
            'angkatan' => 'Angkatan 8',
            'kelas' => 'XI',
            'jurusan' => 'RPL',
            'phone' => '081234567890',
        ]);

        $this->get(route('info'))
            ->assertOk()
            ->assertSee('Angkatan 8')
            ->assertSee('Anindya')
            ->assertSee('Perayaan Deutsch Club')
            ->assertDontSee('Data anggota belum tersedia.');
    }

    public function test_information_page_shows_empty_states_when_there_are_no_records(): void
    {
        $this->get(route('info'))
            ->assertOk()
            ->assertSee('Data anggota belum tersedia.')
            ->assertSee('Belum ada kegiatan yang dipublikasikan.');
    }
}
