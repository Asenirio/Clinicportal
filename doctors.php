<?php
require_once 'auth.php';
require_role('admin');

$page_title = "Doctors";
require_once 'header.php';
require_once 'sidebar.php';

try {
    // Fetch all doctors with their user info and specialty
    $doctors_stmt = $pdo->query("
        SELECT d.*, u.full_name, u.email, u.avatar, s.name as specialty_name, s.icon as specialty_icon
        FROM doctors d
        JOIN users u ON d.user_id = u.id
        LEFT JOIN specialties s ON d.specialty_id = s.id
    ");
    $doctors_list = $doctors_stmt->fetchAll();
    $total_doctors = count($doctors_list);

    // Fetch specialties for the Add Doctor modal
    $specialties_list = $pdo->query("SELECT id, name FROM specialties ORDER BY name ASC")->fetchAll();
} catch (PDOException $e) {
    $doctors_list = [];
    $specialties_list = [];
    $total_doctors = 0;
    $error = "Error: " . $e->getMessage();
}
?>

<div class="max-w-7xl mx-auto space-y-6 fade-in">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Medical Staff Management</h2>
            <p class="text-sm text-gray-500 font-medium">Coordinate doctors and department specialists</p>
        </div>
        <div class="flex gap-3">
            <button
                class="bg-white border border-gray-200 text-gray-700 font-bold py-3 px-6 rounded-2xl shadow-sm hover:bg-gray-50 transition-all">Managing
                Departments</button>
            <a href="add_doctor.php"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-blue-100 flex items-center gap-2 transition-all">
                <i class="fa-solid fa-user-md"></i>
                Add New Doctor
            </a>
        </div>
    </div>

    <!-- Staff List -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button class="text-sm font-bold text-blue-600 border-b-2 border-blue-600 pb-1">All Staff (
                    <?php echo $total_doctors; ?>)
                </button>
                <button class="text-sm font-medium text-gray-400 hover:text-gray-600 transition-colors">On
                    Leave</button>
                <button class="text-sm font-medium text-gray-400 hover:text-gray-600 transition-colors">By
                    Department</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50/50 text-gray-500 text-[10px] font-bold uppercase tracking-widest">
                    <tr>
                        <th class="px-8 py-5">Doctor Profile</th>
                        <th class="px-6 py-5">Department</th>
                        <th class="px-6 py-5">Contact Info</th>
                        <th class="px-6 py-5">Availability</th>
                        <th class="px-8 py-5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if (empty($doctors_list)): ?>
                        <tr>
                            <td colspan="5" class="px-8 py-10 text-center text-gray-400 font-medium">No doctors registered
                                in the system yet.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($doctors_list as $d): ?>
                            <tr class="hover:bg-blue-50/10 transition-all">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-slate-100 rounded-2xl overflow-hidden shadow-sm">
                                            <img src="<?php echo htmlspecialchars($d['avatar'] ?? 'img/default-avatar.png'); ?>"
                                                alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800 text-base">
                                                <?php echo htmlspecialchars($d['full_name']); ?>
                                            </h4>
                                            <p class="text-xs text-gray-500 font-medium italic">
                                                ID: DR-<?php echo str_pad($d['id'], 3, '0', STR_PAD_LEFT); ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <span
                                        class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold border border-blue-100 flex items-center gap-2 w-fit">
                                        <i
                                            class="fa-solid <?php echo htmlspecialchars($d['specialty_icon'] ?? 'fa-stethoscope'); ?> text-[10px]"></i>
                                        <?php echo htmlspecialchars($d['specialty_name'] ?? 'General'); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-6">
                                    <p class="text-sm font-medium text-gray-700">
                                        <?php echo htmlspecialchars($d['email']); ?>
                                    </p>
                                    <p class="text-xs text-gray-400 mt-0.5">Fees:
                                        $<?php echo number_format($d['fees'] ?? 0, 2); ?></p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></div>
                                        <span class="text-sm font-bold text-green-600">
                                            <?php echo htmlspecialchars($d['availability'] ?? 'Available'); ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <button onclick="deleteDoctor(<?php echo $d['id']; ?>)" class="p-2 text-gray-300 hover:text-red-500 transition-colors" title="Delete Doctor">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-6 bg-gray-50/50 flex justify-between items-center">
            <p class="text-xs text-gray-500 font-medium tracking-wide">Showing 4 of 10 staff members</p>
            <div class="flex gap-2">
                <button
                    class="px-3 py-1 bg-white border border-gray-200 rounded text-xs font-bold text-gray-600 hover:bg-gray-50">Previous</button>
                <button
                    class="px-3 py-1 bg-blue-600 border border-blue-600 rounded text-xs font-bold text-white shadow-md shadow-blue-100">1</button>
                <button
                    class="px-3 py-1 bg-white border border-gray-200 rounded text-xs font-bold text-gray-600 hover:bg-gray-50">2</button>
                <button
                    class="px-3 py-1 bg-white border border-gray-200 rounded text-xs font-bold text-gray-600 hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function deleteDoctor(id) {
        if (!confirm('Permanently remove this doctor from the system?')) return;
        const fd = new FormData();
        fd.append('action', 'delete');
        fd.append('id', id);
        fd.append('csrf_token', '<?php echo $_SESSION["csrf_token"]; ?>');
        try {
            const res = await fetch('doctor_handler.php', { method: 'POST', body: fd });
            const data = await res.json();
            if (data.success) { showToast(data.message); location.reload(); }
            else { showToast(data.message, 'error'); }
        } catch (err) { showToast('Delete failed', 'error'); }
    }
</script>

<?php require_once 'footer.php'; ?>