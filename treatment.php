<?php
$page_title = "Treatment";
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="max-w-7xl mx-auto space-y-6 fade-in">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Treatment Protocols</h2>
            <p class="text-sm text-gray-500 font-medium">Standardized procedures and patient treatment logs</p>
        </div>
        <button
            class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-emerald-100 flex items-center gap-2 transition-all">
            <i class="fa-solid fa-file-waveform"></i>
            Create New Plan
        </button>
    </div>

    <!-- Treatment Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $treatments = [
            ['name' => 'Cardiac Surgery', 'desc' => 'Standard bypass surgery procedure including post-op care.', 'cost' => '$15,000', 'duration' => '4-6 Hours', 'icon' => 'fa-heart-pulse', 'bg' => 'blue'],
            ['name' => 'Dental Cleaning', 'desc' => 'Professional scaling, polishing and fluoride treatment.', 'cost' => '$150', 'duration' => '45 Mins', 'icon' => 'fa-tooth', 'bg' => 'teal'],
            ['name' => 'Physical Therapy', 'desc' => 'Rehabilitation session for muscle and joint recovery.', 'cost' => '$80', 'duration' => '60 Mins', 'icon' => 'fa-person-walking', 'bg' => 'purple'],
            ['name' => 'MRI Scanning', 'desc' => 'High-resolution diagnostic imaging of internal structures.', 'cost' => '$450', 'duration' => '30 Mins', 'icon' => 'fa-radiation', 'bg' => 'indigo'],
            ['name' => 'Vaccination', 'desc' => 'Standard immunization and booster management.', 'cost' => '$25', 'duration' => '15 Mins', 'icon' => 'fa-syringe', 'bg' => 'emerald'],
        ];
        foreach ($treatments as $t):
            ?>
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                <div class="flex items-center gap-4 mb-6">
                    <div
                        class="w-14 h-14 bg-<?php echo $t['bg']; ?>-50 rounded-2xl flex items-center justify-center text-<?php echo $t['bg']; ?>-600 text-2xl shadow-inner group-hover:bg-<?php echo $t['bg']; ?>-600 group-hover:text-white transition-all">
                        <i class="fa-solid <?php echo $t['icon']; ?>"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-800">
                            <?php echo $t['name']; ?>
                        </h3>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            <?php echo $t['duration']; ?>
                        </p>
                    </div>
                </div>
                <p class="text-sm text-gray-500 leading-relaxed mb-6 italic">
                    <?php echo $t['desc']; ?>
                </p>
                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Base Cost</div>
                    <div class="text-xl font-black text-gray-800">
                        <?php echo $t['cost']; ?>
                    </div>
                </div>
                <button
                    class="w-full mt-6 py-3 border border-gray-100 rounded-xl text-xs font-bold text-gray-500 group-hover:bg-gray-50 group-hover:text-gray-800 transition-all uppercase tracking-widest">Assign
                    to Patient</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>