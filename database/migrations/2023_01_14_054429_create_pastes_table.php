<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PasteStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->text('body')->nullable();
            $table->integer('status')->default(PasteStatusEnum::STATUS_PUBLIC->value);
            $table->string('language',32)->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
};
