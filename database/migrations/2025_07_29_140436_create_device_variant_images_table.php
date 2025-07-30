<?php

use App\Models\DeviceVariant;
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
        Schema::create('device_variant_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DeviceVariant::class)->constrained()->cascadeOnDelete();
            $table->string('image_path');
            $table->boolean('is_main');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_variant_images');
    }
};
