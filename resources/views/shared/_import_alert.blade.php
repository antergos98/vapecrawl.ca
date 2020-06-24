@if (file_exists(storage_path('import.txt')))
    <div class="bg-gray-700 text-center text-white text-sm font-bold py-3" role="alert">
        <div class="max-w-6xl mx-auto px-6 xl:px-0">
            <p>We are currently refreshing our database. You might experience issues on the site during the update. We recommend to wait until this alert is gone.</p>
        </div>
    </div>
@endif
