<?php
$page_title = "Content Management";
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="max-w-7xl mx-auto space-y-6 fade-in">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Website Content CMS</h2>
            <p class="text-sm text-gray-500 font-medium">Manage static pages and dynamic content blocks</p>
        </div>
        <button
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-blue-100 flex items-center gap-2 transition-all">
            <i class="fa-solid fa-plus-circle"></i>
            New Content Block
        </button>
    </div>

    <!-- Content Blocks List -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Live Pages -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                    <h3 class="font-black text-gray-800 uppercase tracking-widest text-xs">Standard Pages</h3>
                </div>
                <div class="divide-y divide-gray-50">
                    <?php
                    $pages = [
                        ['name' => 'Home Page Header', 'slug' => 'home-hero', 'status' => 'Published', 'date' => 'Oct 24, 2024'],
                        ['name' => 'About Us Section', 'slug' => 'about-us', 'status' => 'Published', 'date' => 'Oct 22, 2024'],
                        ['name' => 'Services Overview', 'slug' => 'services', 'status' => 'Draft', 'date' => 'Oct 25, 2024'],
                        ['name' => 'Patient Guidelines', 'slug' => 'guidelines', 'status' => 'Published', 'date' => 'Oct 15, 2024'],
                    ];
                    foreach ($pages as $p):
                        ?>
                        <div class="p-6 flex items-center justify-between hover:bg-slate-50/50 transition-all group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 shadow-inner">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-800">
                                        <?php echo $p['name']; ?>
                                    </h4>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-0.5">/
                                        <?php echo $p['slug']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-8">
                                <span class="text-[10px] font-black text-gray-400 uppercase">
                                    <?php echo $p['date']; ?>
                                </span>
                                <span
                                    class="px-3 py-1 bg-<?php echo $p['status'] === 'Published' ? 'green' : 'gray'; ?>-50 text-<?php echo $p['status'] === 'Published' ? 'green' : 'gray'; ?>-600 rounded-full text-[10px] font-bold uppercase ring-1 ring-inset ring-<?php echo $p['status'] === 'Published' ? 'green' : 'gray'; ?>-500/20">
                                    <?php echo $p['status']; ?>
                                </span>
                                <button
                                    class="w-8 h-8 rounded-lg text-gray-300 group-hover:text-blue-600 transition-colors"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Content Categories / Media -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h3 class="font-black text-gray-800 uppercase tracking-widest text-xs mb-6">Media Library</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div
                        class="aspect-square bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-400 hover:bg-slate-100 hover:border-slate-300 transition-all cursor-pointer">
                        <i class="fa-solid fa-cloud-arrow-up text-2xl mb-2"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Upload</span>
                    </div>
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <div class="aspect-square bg-slate-100 rounded-2xl overflow-hidden group relative">
                            <img src="https://picsum.photos/200/200?random=<?php echo $i; ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                <button class="text-white"><i class="fa-solid fa-eye"></i></button>
                                <button class="text-rose-400"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <button
                    class="w-full mt-6 py-3 bg-indigo-50 text-indigo-600 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-indigo-600 hover:text-white transition-all">View
                    All Media</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>