<?php
$page_title = "Promotions";
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="max-w-7xl mx-auto space-y-6 fade-in">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Promotions & Offers</h2>
            <p class="text-sm text-gray-500 font-medium">Manage marketing campaigns and clinic discounts</p>
        </div>
        <button
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-blue-100 flex items-center gap-2 transition-all">
            <i class="fa-solid fa-bullhorn rotate-[-15deg]"></i>
            Create Campaign
        </button>
    </div>

    <!-- Promotions Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $promos = [
            ['title' => 'Family Wellness Package', 'discount' => '25% OFF', 'expiry' => 'Dec 31, 2024', 'status' => 'Active', 'color' => 'blue', 'icon' => 'fa-people-group'],
            ['title' => 'Cardio Screening Special', 'discount' => '$50 OFF', 'expiry' => 'Nov 15, 2024', 'status' => 'Active', 'color' => 'rose', 'icon' => 'fa-heart-pulse'],
            ['title' => 'Dental Whitening Deal', 'discount' => 'Buy 1 Get 1', 'expiry' => 'Nov 30, 2024', 'status' => 'Paused', 'color' => 'slate', 'icon' => 'fa-tooth'],
            ['title' => 'New Patient Welcome', 'discount' => 'FREE Consultation', 'expiry' => 'Indefinite', 'status' => 'Active', 'color' => 'emerald', 'icon' => 'fa-handshake'],
            ['title' => 'Senior Citizen Care', 'discount' => '15% OFF', 'expiry' => 'Dec 15, 2024', 'status' => 'Draft', 'color' => 'amber', 'icon' => 'fa-person-cane'],
        ];
        foreach ($promos as $p):
            ?>
            <div
                class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                <div class="h-40 bg-<?php echo $p['color']; ?>-600 relative p-8 flex flex-col justify-end overflow-hidden">
                    <!-- Background pattern -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl -mr-16 -mt-16">
                    </div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-10 rounded-full blur-xl -ml-12 -mb-12">
                    </div>

                    <div class="relative z-10 flex items-center justify-between">
                        <div
                            class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-white text-2xl">
                            <i class="fa-solid <?php echo $p['icon']; ?>"></i>
                        </div>
                        <span
                            class="px-4 py-1.5 bg-white/30 backdrop-blur-md text-white rounded-full text-[10px] font-black uppercase tracking-widest ring-1 ring-white/50">
                            <?php echo $p['status']; ?>
                        </span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-black text-gray-800 mb-2">
                        <?php echo $p['title']; ?>
                    </h3>
                    <p
                        class="text-3xl font-black text-<?php echo $p['color'] === 'slate' ? 'gray' : $p['color']; ?>-600 mb-6 italic">
                        <?php echo $p['discount']; ?>
                    </p>

                    <div class="flex items-center justify-between border-t border-gray-50 pt-6">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Valid Thru</p>
                            <p class="text-sm font-black text-gray-700">
                                <?php echo $p['expiry']; ?>
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="w-10 h-10 rounded-xl border border-gray-100 text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition-all flex items-center justify-center"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button
                                class="w-10 h-10 rounded-xl border border-gray-100 text-gray-400 hover:text-red-600 hover:bg-red-50 transition-all flex items-center justify-center"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Progress simulated -->
                <div class="h-1.5 w-full bg-gray-50 overflow-hidden">
                    <div
                        class="h-full bg-<?php echo $p['color'] === 'slate' ? 'gray' : $p['color']; ?>-500 w-[65%] rounded-r-lg">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>