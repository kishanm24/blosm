<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('user_name')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->enum('role', ['admin','user', 'vendor','super_admin']);

            $table->string('vendor_type')->nullable();
            $table->string('description')->nullable();

            $table->boolean('is_approved')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_verify')->default(0);

            // $table->string('address')->nullable(); // Add an address field
            // $table->string('city')->nullable(); // Add a city field
            // $table->string('state')->nullable(); // Add a state field
            // $table->string('zip_code')->nullable(); // Add a zip code field
            // $table->string('country')->nullable(); // Add a country field

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        User::create(['name' => 'admin','email' => 'admin@themesbrand.com',"mobile_number"=> "9876543210",'password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'avatar-1.jpg',"role" => "super_admin",'created_at' => now()]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
