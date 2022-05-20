@props([
    'id',
    'name',
])

<div class="form-check">
    <input class="form-check-input" type="checkbox" id="{{ $id }}" name="{{ $name }}">
    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
