<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->string('title');
            $table->mediumText('excerpt');
            $table->text('content');
            $table->string('state');
            $table->boolean('visibility');
            $table->double('total_score')->default(0);

            $table->foreign('article_id')
                ->references('id')
                ->on('articles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
