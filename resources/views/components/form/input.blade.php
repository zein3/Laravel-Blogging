@props(['id', 'name', 'type'])

<div class="mb-2">
    <label for="{{ $id }}" class="form-label fs-4">
        {{ $slot }}
    </label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}" value="{{ old($name) }}">
</div>
