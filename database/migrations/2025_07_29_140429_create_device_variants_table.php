<?php

use App\Models\Color;
use App\Models\Device;
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
        Schema::create('device_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Device::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Color::class)->constrained()->cascadeOnDelete();
            $table->string('ram');
            $table->string('storage');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(null);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_variants');
    }
};
