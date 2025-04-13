<div
    x-data="{ show: false, message: '', type: 'success' }"
    x-show="show"
    x-init="
        window.addEventListener('notify', event => {
            type = event.detail.type;
            message = event.detail.message;
            show = true;
            setTimeout(() => show = false, 3000);
        });
    "
    x-transition
    class="fixed bottom-5 right-5 px-4 py-2 rounded shadow-lg text-white"
    :class="{
        'bg-green-500': type === 'success',
        'bg-red-500': type === 'error',
        'bg-yellow-500': type === 'warning'
    }"
    style="display: none;"
>
    <span x-text="message"></span>
</div>