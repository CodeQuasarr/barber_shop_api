<?php

use App\Models\Haircuts\HairCutCategory;
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
        Schema::create('hair_cuts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HairCutCategory::class);
            $table->string('stripe_product_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('imageSrc')->nullable();
            $table->string('imageAlt')->nullable();
            $table->string('date');
            $table->integer('sales')->nullable();
            $table->boolean('isOnSale')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hair_cuts');
    }
};
