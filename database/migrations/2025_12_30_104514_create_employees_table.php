<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/xxxx_xx_xx_create_employees_table.php
// database/migrations/xxxx_xx_xx_create_employees_table.php

public function up(): void
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->date('birth_date')->nullable();
        $table->string('birth_place')->nullable();
        $table->string('position'); // حقل المنصب الجديد
        $table->string('specialty')->nullable(); // يظهر فقط عند Enseignant
        $table->string('photo')->nullable();
        $table->string('cv')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
