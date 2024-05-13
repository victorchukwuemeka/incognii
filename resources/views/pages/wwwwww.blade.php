<body class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="container mx-auto px-4 py-8">
        <!-- Dark Mode Toggle -->
        <div class="flex justify-end mb-4">
            <label for="darkMode" class="inline-flex items-center cursor-pointer">
                <span class="mr-2">Dark Mode</span>
                <input type="checkbox" id="darkMode" class="form-checkbox h-5 w-5 text-gray-600 dark:text-gray-400" />
            </label>
        </div>

        <!-- Question -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-4">What is your favorite programming language and why?</h1>
            <p class="text-lg leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida
                velit vitae nibh elementum, vel auctor justo ullamcorper.</p>
        </div>

        <!-- Answers -->
        <div>
            <h2 class="text-xl font-bold mb-4">Answers</h2>
            <!-- Individual Answer -->
            <div class="bg-gray-100 dark:bg-gray-700 p-4 mb-4 rounded-lg">
                <p class="text-lg leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida
                    velit vitae nibh elementum, vel auctor justo ullamcorper.</p>
                <div class="mt-2 flex items-center">
                    <span class="text-gray-600 dark:text-gray-400">- John Doe</span>
                </div>
            </div>
            <!-- Another Answer -->
            <div class="bg-gray-100 dark:bg-gray-700 p-4 mb-4 rounded-lg">
                <p class="text-lg leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida
                    velit vitae nibh elementum, vel auctor justo ullamcorper.</p>
                <div class="mt-2 flex items-center">
                    <span class="text-gray-600 dark:text-gray-400">- Jane Smith</span>
                </div>
            </div>
            <!-- Add your own Answer -->
            <div class="mt-8">
                <h3 class="text-lg font-bold mb-2">Your Answer</h3>
                <textarea class="w-full h-24 bg-gray-100 dark:bg-gray-700 rounded-lg p-4 resize-none"></textarea>
                <button
                    class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit Answer
                </button>
            </div>
        </div>
    </div>

    <script>
        const darkModeToggle = document.getElementById('darkMode');

        darkModeToggle.addEventListener('change', function () {
            const isDarkMode = this.checked;
            document.body.classList.toggle('dark', isDarkMode);
        });
    </script>
</body>
