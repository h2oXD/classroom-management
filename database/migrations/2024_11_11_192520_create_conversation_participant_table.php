<?php

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conversation_participant', function (Blueprint $table) {
            $table->foreignIdFor(Conversation::class)->constrained()->onDelete('cascade'); // liên kết đến cuộc trò chuyện
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // người tham gia
            
            $table->primary(['conversation_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_participant');
    }
};
