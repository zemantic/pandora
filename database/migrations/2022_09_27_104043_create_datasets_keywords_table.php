<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Keyword;
use App\Models\Dataset;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("dataset_keyword", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dataset::class);
            $table->foreignIdFor(Keyword::class);
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
        Schema::dropIfExists("dataset_keyword");
    }
};
