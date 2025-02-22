<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="header">
                <h1 class="p-6" style="font-size: 40px; font-weight: bold">
                    <gas-notify />
                </h1>
            </div>
            <div class="p-6 text-gray-900">
                <analytics-view :user="{{Auth::user()}}" title="Analytics"/>
            </div>
        </div>
    </div>
</x-app-layout>
