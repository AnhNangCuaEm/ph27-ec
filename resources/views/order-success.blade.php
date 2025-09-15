@extends('layouts.base')

@section('content')
    <div class="container max-w-4xl mx-auto px-4">
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-green-800">注文が完了しました！</h3>
                    <p class="text-green-700">ご注文ありがとうございました。</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md border p-6 mb-6">
            <h4 class="text-xl font-bold text-gray-800 mb-4">注文詳細</h4>
            <div class="mb-4">
                <p class="text-gray-600"><strong>注文番号:</strong> #{{ $order->id }}</p>
                <p class="text-gray-600"><strong>注文日時:</strong> {{ $order->created_at->format('Y年m月d日 H:i') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md border p-6 mb-6">
            <h4 class="text-xl font-bold text-gray-800 mb-4">注文商品</h4>
            <div class="space-y-4">
                @foreach ($orderDetails as $detail)
                    <div class="flex items-center justify-between border-b pb-4">
                        <div class="flex items-center">
                            <img src="{{ $detail->product->image }}" alt="{{ $detail->product->name }}"
                                class="w-16 h-16 object-cover rounded-lg shadow-md mr-4">
                            <div>
                                <h5 class="font-semibold text-gray-800">{{ $detail->product->name }}</h5>
                                <p class="text-gray-600">単価: {{ number_format($detail->price) }}円</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600">数量: {{ $detail->quantity }}個</p>
                            <p class="font-semibold text-gray-800">小計:
                                {{ number_format($detail->price * $detail->quantity) }}円</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
            <div class="flex justify-between items-center">
                <span class="text-xl font-bold text-blue-800">合計金額:</span>
                <span class="text-2xl font-bold text-blue-800">{{ number_format($order->total_price) }}円</span>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('products') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium transition-colors inline-block">
                商品一覧に戻る
            </a>
        </div>
    </div>
@endsection
