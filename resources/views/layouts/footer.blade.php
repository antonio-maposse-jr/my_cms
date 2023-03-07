<footer class="border-top w-100 pt-4 mt-7">
    <div class="d-flex fs-6 text-gray-600 justify-content-between mb-4">
        <div>
            {{$settings['copy_right_text']}}
            <a href="#" class="text-decoration-none">
                {{$settings['application_name']}}</a>
        </div>
        @if(config('app.footer_version_show'))
            <div>
                <span class="ms-2 ms-auto">v{{ getCurrentVersion() }}</span>
            </div>    
        @endif
    </div>
</footer>
