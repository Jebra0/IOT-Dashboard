<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="header">
                <h1 class="  p-6" style="font-size: 30px; font-weight: bold">
                    <gas-notify />
                </h1>
            </div>
            <div class="p-6 text-gray-900">
                <dashboard-view :user="{{Auth::user()}}" title="Dashboard" />
            </div>
        </div>
    </div>
</x-app-layout>
