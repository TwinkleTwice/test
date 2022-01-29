@extends('layouts.app')

@section('title', 'Загрузка чека')

@include('partials.header')
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Загрузка чека</h1>

        <form action="{{ route('check_upload_process') }}" enctype="multipart/form-data" method="POST" class="space-y-5 mt-5">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif
            <div>
                <input name="image" type="file" class="w-full h-12" placeholder="Картинка" />
                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Добавить</button>
        </form>

    </div>
</div>
