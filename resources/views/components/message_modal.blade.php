<div
    x-data="{ show: @entangle('showNotification') }"
    x-show="show"
    x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    style="display: none;"
    @keydown.escape.window="show = false"
>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-2" x-text="$wire.notificationTitle"></h2>
        <p class="text-sm text-gray-700" x-html="$wire.notificationMessage"></p>
        <button
            class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg"
            @click="show = false"
        >
            Close
        </button>
    </div>
</div>
