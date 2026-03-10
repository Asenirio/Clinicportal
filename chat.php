<?php
$page_title = "Chat";
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="max-w-7xl mx-auto h-[calc(100vh-12rem)] flex gap-6 fade-in">
    <!-- Chat Sidebar (Contacts) -->
    <div
        class="w-80 bg-white/70 backdrop-blur-xl rounded-[40px] shadow-2xl border border-white/20 flex flex-col overflow-hidden">
        <div class="p-8 border-b border-gray-100/50">
            <h3 class="text-2xl font-black text-gray-800 mb-6 tracking-tight">Messages</h3>
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search chats..."
                    class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-transparent rounded-2xl outline-none focus:ring-2 focus:ring-primary transition-all text-sm">
            </div>
        </div>
        <div class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar">
            <?php
            $contacts = [
                ['name' => 'Sarah Johnson', 'msg' => 'When is my next appointment?', 'time' => '10:30 AM', 'unread' => true, 'avatar' => 'SJ', 'status' => 'online'],
                ['name' => 'Dr. Malone', 'msg' => 'Patient records updated.', 'time' => 'Yesterday', 'unread' => false, 'avatar' => 'PM', 'status' => 'offline'],
                ['name' => 'Michael Chen', 'msg' => 'Thank you for the help!', 'time' => 'Yesterday', 'unread' => false, 'avatar' => 'MC', 'status' => 'online'],
            ];
            foreach ($contacts as $c):
                ?>
                <div
                    class="flex items-center gap-4 p-4 rounded-[28px] hover:bg-white/80 transition-all cursor-pointer group <?php echo $c['unread'] ? 'bg-white shadow-sm ring-1 ring-black/5' : ''; ?>">
                    <div class="relative">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-bold shadow-inner relative z-10"
                            style="background-color: var(--brand-bg); color: var(--brand-primary)">
                            <?php echo $c['avatar']; ?>
                        </div>
                        <div
                            class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full border-4 border-white z-20 <?php echo $c['status'] === 'online' ? 'bg-green-500' : 'bg-gray-300'; ?>">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-start">
                            <h4 class="text-sm font-bold text-gray-800 truncate">
                                <?php echo $c['name']; ?>
                            </h4>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">
                                <?php echo $c['time']; ?>
                            </span>
                        </div>
                        <p
                            class="text-xs <?php echo $c['unread'] ? 'text-primary font-bold' : 'text-gray-500'; ?> truncate mt-0.5">
                            <?php echo $c['msg']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Main Chat Window -->
    <div
        class="flex-1 bg-white/70 backdrop-blur-xl rounded-[40px] shadow-2xl border border-white/20 flex flex-col overflow-hidden relative">
        <!-- Chat Header -->
        <div class="p-8 border-b border-gray-100/50 flex items-center justify-between bg-white/30">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-bold shadow-inner text-xl"
                    style="background-color: var(--brand-bg); color: var(--brand-primary)">
                    SJ</div>
                <div>
                    <h3 class="text-lg font-black text-gray-800">Sarah Johnson</h3>
                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        <p class="text-[10px] font-bold text-green-600 uppercase tracking-widest">Online Now</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-3">
                <button
                    class="w-12 h-12 rounded-2xl bg-white shadow-sm text-gray-400 hover:text-primary transition-all flex items-center justify-center border border-gray-100"><i
                        class="fa-solid fa-phone"></i></button>
                <button
                    class="w-12 h-12 rounded-2xl bg-white shadow-sm text-gray-400 hover:text-primary transition-all flex items-center justify-center border border-gray-100"><i
                        class="fa-solid fa-video"></i></button>
            </div>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-10 space-y-8 bg-slate-50/10 custom-scrollbar">
            <div class="flex justify-center"><span
                    class="bg-white/80 backdrop-blur px-6 py-2 rounded-full text-[10px] font-black text-gray-400 uppercase tracking-widest shadow-sm ring-1 ring-black/5">Today</span>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-8 border-t border-gray-100/50 bg-white/30">
            <form id="chat-form" class="flex items-center gap-5">
                <button type="button"
                    class="w-12 h-12 rounded-2xl bg-white shadow-sm text-gray-400 hover:text-primary transition-all flex items-center justify-center border border-gray-100">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <div class="flex-1 relative">
                    <input type="text" id="chat-input" name="message" placeholder="Type a message..."
                        class="w-full px-8 py-4 bg-white/80 border border-transparent rounded-[24px] outline-none focus:ring-2 focus:ring-primary transition-all text-sm shadow-inner">
                </div>
                <input type="hidden" name="receiver_id" id="receiver_id" value="1">
                <input type="hidden" name="action" value="send">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <button type="submit"
                    class="text-white w-14 h-14 rounded-2xl shadow-xl flex items-center justify-center hover:scale-110 active:scale-90 transition-all"
                    style="background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary))">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const chatId = 1; // Sarah Johnson for demo
    const myId = <?php echo $_SESSION['user_id'] ?? 0; ?>;

    async function fetchMessages() {
        try {
            const response = await fetch(`chat_handler.php?action=fetch&user_id=${chatId}`);
            const result = await response.json();
            if (result.success) {
                const container = document.getElementById('chat-messages');
                container.innerHTML = '<div class="flex justify-center"><span class="bg-white/80 backdrop-blur px-6 py-2 rounded-full text-[10px] font-black text-gray-400 uppercase tracking-widest shadow-sm ring-1 ring-black/5">Encrypted Connection Active</span></div>';
                result.messages.forEach(msg => {
                    const isSent = msg.sender_id == myId;
                    const time = new Date(msg.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    const bubble = isSent ? `
                    <div class="flex items-start gap-4 max-w-[85%] ml-auto flex-row-reverse fade-in">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-xs shadow-lg" style="background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary))">AD</div>
                        <div class="flex flex-col items-end gap-1.5">
                            <div class="p-4 rounded-[24px] rounded-tr-none shadow-xl text-sm text-white leading-relaxed font-medium" style="background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary))">
                                ${msg.message}
                            </div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">${time}</p>
                        </div>
                    </div>` : `
                    <div class="flex items-start gap-4 max-w-[85%] fade-in">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-xs shadow-md" style="background-color: var(--brand-bg); color: var(--brand-primary)">SJ</div>
                        <div class="flex flex-col items-start gap-1.5">
                            <div class="bg-white/80 backdrop-blur p-4 rounded-[24px] rounded-tl-none shadow-xl border border-white/50 text-sm text-gray-700 leading-relaxed font-medium">
                                ${msg.message}
                            </div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">${time}</p>
                        </div>
                    </div>`;
                    container.innerHTML += bubble;
                });
                container.scrollTop = container.scrollHeight;
            }
        } catch (e) { }
    }

    document.getElementById('chat-form')?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const input = document.getElementById('chat-input');
        if (!input.value.trim()) return;

        const formData = new FormData(e.target);
        input.value = '';

        try {
            const response = await fetch('chat_handler.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.success) {
                fetchMessages();
            }
        } catch (e) { }
    });

    setInterval(fetchMessages, 3000);
    fetchMessages();
</script>

<?php require_once 'footer.php'; ?>