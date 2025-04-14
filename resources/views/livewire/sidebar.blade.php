<aside class="w-full bg-rose-800 dark:bg-gray-800 shadow-md h-full min-h-screen p-6">
    <h2 class="text-xl text-white dark:text-gray-200 mb-4 flex items-center gap-2">
        <!-- Graduation Cap Icon -->
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M22 12l-10-6L2 12l10 6 10-6z" />
            <path d="M2 12v6a2 2 0 0 0 2 2h2m16-8v6a2 2 0 0 1-2 2h-2" />
        </svg>
        Senior High School
    </h2>
    <hr class="border-gray-300 dark:border-gray-700 mb-4">

    <nav>
        <ul>
            <li class="mb-4">
                <h4 class="text-white dark:text-gray-300 flex items-center gap-2">
                    <!-- Dashboard Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12l2-2 4 4 8-8 4 4v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4z" />
                    </svg>
                    Dashboard
                </h4>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">
                    <!-- Overview Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 20h9" />
                        <path d="M12 4h9" />
                        <path d="M4 9h16" />
                        <path d="M4 15h16" />
                    </svg>
                    Overview
                </a>
            </li>

            <hr class="border-gray-300 dark:border-gray-700 mb-4">

            <li class="mb-4">
                <h4 class="text-white dark:text-gray-300 flex items-center gap-2">
                    <!-- Navigation Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                    </svg>
                    Navigation
                </h4>
                <a href="{{ route('index_grade_11', 'data') }}"
                   class="flex items-center gap-2 px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">
                    <!-- Book Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20" />
                        <path d="M6.5 7v10" />
                    </svg>
                    Grade 11
                </a>
                <a href="{{ route('index_grade_12', 'data') }}"
                   class="flex items-center gap-2 px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">
                    <!-- Book Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20" />
                        <path d="M6.5 7v10" />
                    </svg>
                    Grade 12
                </a>
            </li>

            <hr class="border-gray-300 dark:border-gray-700 mb-4">

            <li>
                <h4 class="text-white dark:text-gray-300 flex items-center gap-2">
                    <!-- Settings Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3" />
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09c.7 0 1.32-.38 1.51-1a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09c0 .7.38 1.32 1 1.51a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .7.38 1.32 1 1.51H21a2 2 0 1 1 0 4h-.09c-.7 0-1.32.38-1.51 1z" />
                    </svg>
                    Management
                </h4>
                <a href="{{ route('document_checklist') }}"
                   class="flex items-center gap-2 px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">
                    <!-- Folder Check Icon -->
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v2" />
                        <path d="M3 13v4a2 2 0 0 0 2 2h6" />
                        <path d="M16 21l2 2 4-4" />
                    </svg>
                    Document Checklist
                </a>
            </li>
        </ul>
    </nav>
</aside>

{{-- <aside class="w-full bg-rose-800 dark:bg-gray-800 shadow-md h-full min-h-screen p-6">
    <h2 class="text-xl text-white dark:text-gray-200 mb-4">Senior High School</h2>
    <hr class="border-gray-300 dark:border-gray-700 mb-4">
    <nav>
        <ul>
            <li class="mb-4">
                <h4 class="text-white dark:text-gray-300">Dashboard</h4>
                <a href="#" class="block px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">Overview</a>
            </li>
            <hr class="border-gray-300 dark:border-gray-700 mb-4">
            <li class="mb-4">
                <h4 class="text-white dark:text-gray-300">Navigation</h4>
                <a href="{{ route("index_grade_11", 'data') }}" class="block px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">Grade 11</a>
                <a href="#" class="block px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">Grade 12</a>
            </li>
            <hr class="border-gray-300 dark:border-gray-700 mb-4">
            <li>
                <h4 class="text-white dark:text-gray-300">Management</h4>
                <a href="" class="block px-4 py-2 text-white dark:text-gray-300 hover:bg-rose-500 dark:hover:bg-blue-700 rounded transition duration-200">Document Checklist</a>
            </li>
        </ul>
    </nav>
</aside> --}}