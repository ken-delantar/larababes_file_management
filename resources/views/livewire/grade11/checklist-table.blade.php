<x-app-layout>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Grade 11 Students</h2>
        </div>
    
        {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Strand</label>
                <form method="get" class="flex">
                    <select name="strand" class="w-full border rounded p-2" onchange="this.form.submit()">
                        <option value="">All Strands</option>
                        <?php foreach ($strands as $row): ?>
                            <option value="<?= htmlspecialchars($row['strand']) ?>" <?= isset($_GET['strand']) && $_GET['strand'] == $row['strand'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['strand']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
    
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                <form method="get" class="flex">
                    <select name="section" class="w-full border rounded p-2" onchange="this.form.submit()">
                        <option value="">All Sections</option>
                        <?php foreach ($sections as $row): ?>
                            <option value="<?= htmlspecialchars($row['section_name']) ?>" <?= isset($_GET['section']) && $_GET['section'] == $row['section_name'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['section_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
    
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Year</label>
                <form method="get" class="flex">
                    <select name="school_year" class="w-full border rounded p-2" onchange="this.form.submit()">
                        <option value="">All Years</option>
                        <?php foreach ($school_years as $row): ?>
                            <option value="<?= htmlspecialchars($row['year_start']) . ' - ' . htmlspecialchars($row['year_end']) ?>" <?= isset($_GET['school_year']) && $_GET['school_year'] == $row['year_start'] . ' - ' . $row['year_end'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['year_start']) . ' - ' . htmlspecialchars($row['year_end']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
    
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <form method="get" class="flex">
                    <input type="text" name="search" placeholder="Search students..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" class="flex-1 border rounded-l p-2" onchange="this.form.submit()">
                    <button type="submit" class="bg-blue-600 text-white px-4 rounded-r hover:bg-blue-700 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div> --}}
    
        <h2 class="text-xl font-semibold mb-4">Student Checklist</h2>
        <form method="POST" action="">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Student ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Form 137</th>
                    <th class="px-4 py-2 border">Form 138</th>
                    <th class="px-4 py-2 border">Good Moral</th>
                    <th class="px-4 py-2 border">PSA</th>
                    <th class="px-4 py-2 border">2x2 Picture</th>
                    <th class="px-4 py-2 border">ESC Certificate</th>
                    <th class="px-4 py-2 border">Diploma</th>
                    <th class="px-4 py-2 border">Barangay Clearance</th>
                    <th class="px-4 py-2 border">NCAE</th>
                    <th class="px-4 py-2 border">AF-5</th>
                </tr>
            </thead>
            {{-- <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td class="px-4 py-2 border"><?= $student['id'] ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($student['name']) ?></td>
                        <?php
                            $docs = ['Form 137', 'Form 138', 'Good Moral Certificate', 'PSA', '2x2 Picture', 'ESC Certificate', 'Diploma', 'Barangay Clearance', 'NCAE', 'AF-5'];
                            foreach ($docs as $doc):
                        ?>
                            <td class="px-4 py-2 border">
                                <input type="checkbox" name="documents[<?= $student['id'] ?>][]" value="<?= $doc ?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody> --}}
        </table>
        <br>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Submit</button>
        </form>
    
    </div>
</x-layout-app>