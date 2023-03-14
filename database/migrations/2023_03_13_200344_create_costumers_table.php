<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Traits\Human;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('costumers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 75);
            $table->string('surname', 75);
            $table->string('birthday', 10);
            $table->string('phone', 50)->nullable();
            $table->enum('gender', $this->getGenders())->nullable();

            $table->foreignId('car_id')->nullable()->constrained('cars')->nullOnDelete()->cascadeOnUpdate();
            $table->string('color', 75);
            $table->string('year', 4);

            $table->boolean('isDelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumers');
    }
};
