<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ec2_estimates', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('instance_type');

            $table->string('region');

            $table->string('operating_system');

            $table->integer('instances');

            $table->integer('hours');

            $table->integer('storage');

            $table->decimal('monthly_cost',10,2);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ec2_estimates');
    }
};