<?php

use App\Models\Haircuts\HairCut;
use App\Models\User;
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
        Schema::create('hair_cut_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HairCut::class);
            $table->foreignIdFor(User::class);
            $table->date('start_date');
            $table->time('start_time');
            $table->integer('status')->default(0);  // 0 - pending, 1 - confirmed, 2 - cancelled
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hair_cut_reservations');
    }
};
