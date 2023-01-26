<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //if any data before mgration you can coulmn nullable or set default value
         //$table->unsignedBigInteger('user_id')->after('id')->nullable();
         //cascade, restrict, set null
         //$table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
         $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //$table->dropForeign('tasks_user_id_foreign');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
