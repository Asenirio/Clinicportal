<?php
$page_title = "Email Templates";
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="max-w-7xl mx-auto space-y-6 fade-in">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Email Communication</h2>
            <p class="text-sm text-gray-500 font-medium">Design and manage automated clinic emails</p>
        </div>
        <button
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-indigo-100 flex items-center gap-2 transition-all">
            <i class="fa-solid fa-paintbrush"></i>
            Design Template
        </button>
    </div>

    <!-- Templates Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $templates = [
            ['name' => 'Appointment Confirmation', 'subject' => 'Your appointment is confirmed!', 'type' => 'Transactional', 'last_used' => '2 hrs ago', 'icon' => 'fa-calendar-check', 'color' => 'blue'],
            ['name' => 'Registration Welcome', 'subject' => 'Welcome to Northstar Clinic', 'type' => 'Onboarding', 'last_used' => 'Yesterday', 'icon' => 'fa-face-smile', 'color' => 'indigo'],
            ['name' => 'Medication Reminder', 'subject' => 'Time for your prescription', 'type' => 'Health Alert', 'last_used' => '1 day ago', 'icon' => 'fa-pills', 'color' => 'emerald'],
            ['name' => 'Billing Receipt', 'subject' => 'Your payment was successful', 'type' => 'Finance', 'last_used' => '3 days ago', 'icon' => 'fa-receipt', 'color' => 'amber'],
            ['name' => 'Follow-up Survey', 'subject' => 'How was your experience?', 'type' => 'Feedback', 'last_used' => 'Oct 20', 'icon' => 'fa-star', 'color' => 'rose'],
        ];
        foreach ($templates as $t):
            ?>
            <div
                class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                <div class="flex items-center justify-between mb-8">
                    <div
                        class="w-14 h-14 bg-<?php echo $t['color']; ?>-50 rounded-2xl flex items-center justify-center text-<?php echo $t['color']; ?>-600 text-2xl shadow-inner group-hover:bg-<?php echo $t['color']; ?>-600 group-hover:text-white transition-all">
                        <i class="fa-solid <?php echo $t['icon']; ?>"></i>
                    </div>
                    <span
                        class="px-3 py-1 bg-gray-50 text-gray-400 group-hover:text-gray-800 rounded-lg text-[10px] font-black uppercase tracking-widest transition-colors">
                        <?php echo $t['type']; ?>
                    </span>
                </div>

                <h3 class="text-xl font-black text-gray-800 mb-2">
                    <?php echo $t['name']; ?>
                </h3>
                <p class="text-sm text-gray-500 mb-8 italic line-clamp-1">Subject:
                    <?php echo $t['subject']; ?>
                </p>

                <div class="flex items-center justify-between border-t border-gray-50 pt-6">
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Sent</p>
                        <p class="text-xs font-black text-gray-700">
                            <?php echo $t['last_used']; ?>
                        </p>
                    </div>
                    <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button
                            class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:text-indigo-600 hover:bg-slate-100 transition-all flex items-center justify-center"><i
                                class="fa-solid fa-code"></i></button>
                        <button
                            class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:text-blue-600 hover:bg-slate-100 transition-all flex items-center justify-center"><i
                                class="fa-solid fa-eye"></i></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>