<?php

namespace Kobiyim\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Kobiyim\Models\User;

class UploadBackup extends Command
{
    protected $signature = 'kobiyim-install';

    protected $description = 'Veritabanının yedeğini alın';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Kobiyim kurulumuna hosgeldiniz.');

        $this->info('Veritabanı yükleniyor.');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password', 64);
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('check_id')->default(0);
            $table->string('remember_token')->nullable();
            $table->timestamp('remember_expiries_at')->nullable();
            $table->timestamps();
        });

        $this->info('Kullanıcılar tablosu oluşturuldu.');

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('key', 64);
            $table->timestamps();
        });

        Schema::create('user_permission', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('permission_id');
        });

        $this->info('Kullanıcı izinleri tablosu oluşturuldu.');

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        $this->info('Oturum tablosu oluşturuldu.');

        Schema::create('query_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type', 16);
            $table->integer('causer_id');
            $table->string('subject_type', 128);
            $table->bigInteger('subject_id');
            $table->text('subject_detail');
            $table->timestamps();
        });

        $this->info('Sorgu kayıt tablosu oluşturuldu.');

        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->longtext('exception');
            $table->string('file', 4048);
            $table->string('line', 128);
            $table->longtext('trace');
            $table->longtext('request');
            $table->timestamps();
        });

        $this->info('Hata kayıt tablosu oluşturuldu.');

        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('log_name', 64);
            $table->integer('causer_id');
            $table->string('subject_type', 128);
            $table->bigInteger('subject_id');
            $table->text('description');
            $table->json('properties');
            $table->timestamps();
        });

        $this->info('Hareket takibi tablosu oluşturuldu.');

        $name = $this->ask('Adınız');

        $phone = $this->ask('Telefon numaranız 0 (000) 000 0000');

        $password = $this->secret('Şifreniz');

        User::create([
            'name' => $name,
            'phone' => $phone,
            'password' => Hash::make($password),
            'is_active' => 1,
        ]);

        $this->info('Kurulum işlemi tamamlandı.');
        $this->info('İyi Çalışmalar');
    }
}
