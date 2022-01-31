@extends('layouts.app')

@section('content')
    @include('partials.header')
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Имя</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Чек</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ваш код</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Тип</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Время добавления</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($checks as $check)
                                <tr>
                                    @if($check->image)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $check->user->name }}</div>
                                        </td>
                                        <td>
                                            <img src="/storage/checks{{ $check->image }}" class="h-64 w-64" alt="">
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
{{--                                            @if($check->type % 2 == 0)--}}
                                                <div class="text-sm leading-5 text-gray-900">{{ $check->code }}</div>
{{--                                            @endif--}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            @if($check->type % 2 == 0)
                                                <div class="text-sm leading-5 text-gray-900">Обычный</div>
                                            @else
                                                <div class="text-sm leading-5 text-gray-900">Призовой</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $check->created_at->format('d.m.Y') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            @if($check->status == 1)
                                                <div class="text-sm leading-5 text-gray-900">Принят</div>
                                            @else
                                                <div class="text-sm leading-5 text-gray-900">Отклонен</div>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

