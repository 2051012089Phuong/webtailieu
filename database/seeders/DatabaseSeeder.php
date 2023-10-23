<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       
        DB::table('document_type')->insert([
            'fileType' => 'DOCX'
        ]);
        DB::table('document_type')->insert([
            'fileType' => 'DOC'
        ]);
        
        DB::table('document_type')->insert([
            'fileType' => 'PDF'
        ]);
        
        DB::table('document_type')->insert([
            'fileType' => 'XLSX'
        ]);
        
        DB::table('document_type')->insert([
            'fileType' => 'XLS'
        ]);
        
        DB::table('document_type')->insert([
            'fileType' => 'PPTX'
        ]);
        DB::table('document_type')->insert([
            'fileType' => 'PPT'
        ]);
        DB::table('document_type')->insert([
            'fileType' => 'TXT'
        ]);
    }
}