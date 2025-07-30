<?php

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class);
            $table->string('name');
            $table->text('description');
            $table->string('network');
            $table->date('release_date');
            $table->string('dimensions');
            $table->string('weight');
            $table->string('build');
            $table->string('sim');
            $table->string('screen_type');
            $table->string('screen_size');
            $table->string('resolution');
            $table->string('os');
            $table->string('chipset');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('card_slot');
            $table->string('main_camera');
            $table->string('selfie_camera');
            $table->enum('jack', ['Yes', 'No']);
            $table->string('wlan');
            $table->string('bluetooth');
            $table->string('positioning');
            $table->enum('nfc', ['Yes', 'No']);
            $table->string('radio');
            $table->string('usb');
            $table->string('sensors');
            $table->string('battery');
            $table->string('charging');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
