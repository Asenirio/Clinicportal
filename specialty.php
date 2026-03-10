<?php
$page_title = "Specialty";
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="max-w-7xl mx-auto space-y-6 fade-in">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Specialty Departments</h2>
            <p class="text-sm text-gray-500 font-medium">Healthcare units and specialized divisions</p>
        </div>
        <button
            class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-amber-100 flex items-center gap-2 transition-all">
            <i class="fa-solid fa-layer-group"></i>
            Manage Units
        </button>
    </div>

    <!-- Departments Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
        $specialties = [
            ['name' => 'Cardiology', 'head' => 'Dr. Malone', 'staff' => 4, 'icon' => 'fa-heart-pulse', 'color' => 'red'],
            ['name' => 'Neurology', 'head' => 'Dr. Grey', 'staff' => 3, 'icon' => 'fa-brain', 'color' => 'indigo'],
            ['name' => 'Pediatrics', 'head' => 'Dr. James', 'staff' => 5, 'icon' => 'fa-child', 'color' => 'blue'],
            ['name' => 'Dermatology', 'head' => 'Dr. Connor', 'staff' => 2, 'icon' => 'fa-hand-dots', 'color' => 'orange'],
            ['name' => 'Oncology', 'head' => 'Dr. Stark', 'staff' => 6, 'icon' => 'fa-dna', 'color' => 'emerald'],
            ['name' => 'Orthopedics', 'head' => 'Dr. Banner', 'staff' => 4, 'icon' => 'fa-bone', 'color' => 'amber'],
        ];
        foreach ($specialties as $s):
            ?>
            <div
                class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 hover:shadow-2xl transition-all cursor-pointer group text-center">
                <div
                    class="w-20 h-20 bg-<?php echo $s['color']; ?>-50 rounded-full flex items-center justify-center text-<?php echo $s['color']; ?>-600 text-3xl mx-auto mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <i class="fa-solid <?php echo $s['icon']; ?>"></i>
                </div>
                <h3 class="text-xl font-black text-gray-800 mb-1">
                    <?php echo $s['name']; ?>
                </h3>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-6">Department</p>
                <div class="grid grid-cols-2 gap-4 border-t border-gray-50 pt-6">
                    <div class="text-left">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Head</p>
                        <p class="text-xs font-bold text-gray-700">
                            <?php echo $s['head']; ?>
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Staff</p>
                        <p class="text-xs font-bold text-gray-700">
                            <?php echo $s['staff']; ?> Members
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>