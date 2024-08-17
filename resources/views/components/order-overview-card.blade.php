<div class="flex flex-wrap mb-2">

    <div class="flex-auto bg-white overflow-hidden shadow-md rounded-lg text-left p-6 m-1 lg:mr-2">
        <p class="text-gray-600 text-sm">Sales Today</p>
        <span class="text-4xl text-gray-800">{{ $card['sumOrderTotalToday'] }}</span>
        <span class="{{ $card['percentageOrderTotal'] >= 0 ? 'text-green-500' : 'text-red-600' }} text-sm">{{
            $card['percentageOrderTotal'] }}%
        </span>
    </div>

    <div class="flex-auto bg-white overflow-hidden shadow-md rounded-lg text-left p-6 m-1 lg:ml-2">
        <p class="text-gray-600 text-sm">Order Today</p>
        <span class="text-4xl text-gray-800">{{ $card['countOrderToday'] }}</span>
        <span class="{{ $card['percentageOrder'] >= 0 ? 'text-green-500' : 'text-red-600' }} text-sm">{{
            $card['percentageOrder'] }}%
        </span>
    </div>

</div>