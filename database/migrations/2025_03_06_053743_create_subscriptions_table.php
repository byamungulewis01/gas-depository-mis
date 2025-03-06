<?php

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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tailor_id')->constrained()->onDelete('restrict');
            $table->foreignId('subscription_plan_id')->constrained()->onDelete('restrict');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->enum('status', ['active', 'inactive']);
            $table->boolean('is_trial')->default(0);
            // payment details
            $table->string('payment_method')->nullable();
            $table->string('payment_reference')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->enum('payment_status', ['pending', 'successful', 'failed'])->default('pending');
            $table->decimal('amount', 10, 2)->nullable();
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
